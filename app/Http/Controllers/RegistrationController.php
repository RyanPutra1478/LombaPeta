<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Registration;
use App\Models\Competition;
use Illuminate\Support\Facades\Storage;

class RegistrationController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $registrations = Registration::where('user_id', $userId)
            ->with('competition.organizer')
            ->latest()
            ->get();
            
        $bookmarks = \App\Models\Bookmark::where('user_id', $userId)
            ->with('competition.organizer')
            ->latest()
            ->get();

        return view('peserta.profil', compact('registrations', 'bookmarks'));
    }

    public function create($competitionId)
    {
        $competition = Competition::findOrFail($competitionId);
        return view('peserta.pendaftaran', compact('competition'));
    }

    public function store(Request $request, $competitionId)
    {
        $competition = Competition::findOrFail($competitionId);
        
        $request->validate([
            'phone_number' => 'required|string|max:20',
            'id_card_file' => 'required|file|mimes:pdf|max:2048',
            'proof_of_payment' => $competition->registration_fee > 0 ? 'required|image|max:2048' : 'nullable',
            'form_data' => 'required|array',
        ]);

        $registration = new Registration();
        $registration->user_id = auth()->id();
        $registration->competition_id = $competitionId;
        $registration->phone_number = $request->input('phone_number');
        $registration->form_data = $request->input('form_data');
        $registration->status = 'pending';

        if ($request->hasFile('id_card_file')) {
            $registration->id_card_file = $request->file('id_card_file')->store('id_cards', 'public');
        }

        if ($request->hasFile('proof_of_payment')) {
            $registration->proof_of_payment = $request->file('proof_of_payment')->store('payments', 'public');
        }

        $registration->save();

        return redirect()->route('peserta.dashboard')->with('success', 'Pendaftaran berhasil dikirim. Menunggu verifikasi tim LombaPeta.');
    }

    public function calendar(Request $request)
    {
        $month = (int)$request->input('month', \Carbon\Carbon::now()->month);
        $year = (int)$request->input('year', \Carbon\Carbon::now()->year);
        
        $startOfMonth = \Carbon\Carbon::createFromDate($year, $month, 1)->startOfMonth();
        
        $registrations = Registration::where('registrations.user_id', auth()->id())
            ->where('registrations.status', 'approved')
            ->with('competition.organizer')
            ->join('competitions', 'registrations.competition_id', '=', 'competitions.id')
            ->orderBy('competitions.deadline', 'asc')
            ->select('registrations.*')
            ->get();

        $deadlinesByDay = [];
        foreach($registrations as $r) {
            $deadline = \Carbon\Carbon::parse($r->competition->deadline);
            if ($deadline->month == $month && $deadline->year == $year) {
                $deadlinesByDay[$deadline->day][] = $r->competition;
            }
        }
            
        return view('peserta.kalender', compact('registrations', 'deadlinesByDay', 'month', 'year', 'startOfMonth'));
    }

    public function registrants($competitionId)
    {
        $competition = Competition::where('user_id', auth()->id())->findOrFail($competitionId);
        $registrations = Registration::where('competition_id', $competitionId)
            ->with('user')
            ->latest()
            ->paginate(50);
            
        return view('penyelenggara.registrant_index', compact('competition', 'registrations'));
    }

    public function organizerShow($registrationId)
    {
        $registration = Registration::with(['user', 'competition'])
            ->whereHas('competition', function($q) {
                $q->where('user_id', auth()->id());
            })
            ->findOrFail($registrationId);
            
        return view('penyelenggara.registrant_show', compact('registration'));
    }

    public function updateStatus(Request $request, $registrationId)
    {
        $registration = Registration::whereHas('competition', function($q) {
                $q->where('user_id', auth()->id());
            })
            ->findOrFail($registrationId);
            
        $request->validate([
            'status' => 'required|in:approved,rejected',
            'group_link' => 'nullable|string|url'
        ]);

        $registration->status = $request->input('status');
        if ($request->input('status') === 'approved') {
            $registration->group_link = $request->input('group_link');
        }
        $registration->save();

        return redirect()->back()->with('success', 'Status pendaftaran berhasil diperbarui.');
    }

    public function allRegistrants()
    {
        $organizer = auth()->user();
        $registrations = Registration::whereHas('competition', function($q) use ($organizer) {
                $q->where('user_id', $organizer->id);
            })
            ->with(['user', 'competition', 'competition.user'])
            ->latest()
            ->paginate(50);
            
        return view('penyelenggara.registrant_index', [
            'competition' => (object)['title' => 'Semua Pendaftar', 'id' => 0], 
            'registrations' => $registrations
        ]);
    }
}
