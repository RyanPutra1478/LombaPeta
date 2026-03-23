<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Competition;
use App\Models\Registration;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class CompetitionController extends Controller
{
    public function dashboard()
    {
        $organizer = auth()->user();
        $competitions = Competition::where('user_id', $organizer->id)->withCount('registrations')->get();
        
        $totalRegistrants = $competitions->sum('registrations_count');
        $totalViews = $competitions->sum('views');
        
        $recentRegistrations = Registration::whereHas('competition', function($q) use ($organizer) {
                $q->where('user_id', $organizer->id);
            })
            ->with(['user', 'competition'])
            ->latest()
            ->take(4)
            ->get();
            
        return view('penyelenggara.dashboard', compact('totalRegistrants', 'totalViews', 'competitions', 'recentRegistrations'));
    }

    public function index()
    {
        $competitions = Competition::where('user_id', auth()->id())->withCount('registrations')->get();
        return view('penyelenggara.index', compact('competitions'));
    }

    public function create()
    {
        return view('penyelenggara.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'competition_model' => 'required|in:individu,tim',
            'guidebook_link' => 'nullable|url',
            'category' => 'nullable|string',
            'level' => 'nullable|string',
            'location' => 'nullable|string',
            'deadline' => 'required|date',
            'contact_info' => 'nullable|string',
            'registration_fee' => 'required|numeric|min:0',
            'payment_qr_code' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'payment_bank_info' => 'nullable|string',
            'credibility_score' => 'required|integer',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated['user_id'] = auth()->id();
        $validated['status'] = 'pending';

        if ($request->hasFile('poster')) {
            $validated['poster'] = $request->file('poster')->store('posters', 'public');
        }

        if ($request->hasFile('payment_qr_code')) {
            $validated['payment_qr_code'] = $request->file('payment_qr_code')->store('qrcodes', 'public');
        }

        Competition::create($validated);

        return redirect()->route('penyelenggara.index')->with('success', 'Kompetisi berhasil didaftarkan dan sedang menunggu verifikasi admin.');
    }

    public function show($id)
    {
        $competition = Competition::with('user')->findOrFail($id);
        
        // Increment views in real-time
        $competition->increment('views');
        
        $isBookmarked = false;
        $myRegistration = null;
        if (auth()->check()) {
            $myRegistration = Registration::where('competition_id', $id)
                                        ->where('user_id', auth()->id())
                                        ->first();
            $isBookmarked = \App\Models\Bookmark::where('competition_id', $id)
                                        ->where('user_id', auth()->id())
                                        ->exists();
        }
        
        return view('peserta.detail', compact('competition', 'myRegistration', 'isBookmarked'));
    }

    public function edit($id)
    {
        $competition = Competition::where('user_id', auth()->id())->findOrFail($id);
        return view('penyelenggara.edit', compact('competition'));
    }

    public function update(Request $request, $id)
    {
        $competition = Competition::where('user_id', auth()->id())->findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'competition_model' => 'required|in:individu,tim',
            'guidebook_link' => 'nullable|url',
            'category' => 'nullable|string',
            'level' => 'nullable|string',
            'location' => 'nullable|string',
            'deadline' => 'required|date',
            'contact_info' => 'nullable|string',
            'registration_fee' => 'required|numeric|min:0',
            'payment_qr_code' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'payment_bank_info' => 'nullable|string',
            'credibility_score' => 'required|integer',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('poster')) {
            if ($competition->poster) Storage::disk('public')->delete($competition->poster);
            $validated['poster'] = $request->file('poster')->store('posters', 'public');
        }

        if ($request->hasFile('payment_qr_code')) {
            if ($competition->payment_qr_code) Storage::disk('public')->delete($competition->payment_qr_code);
            $validated['payment_qr_code'] = $request->file('payment_qr_code')->store('qrcodes', 'public');
        }

        $competition->update($validated);

        return redirect()->route('penyelenggara.index')->with('success', 'Kompetisi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $competition = Competition::where('user_id', auth()->id())->findOrFail($id);
        
        if ($competition->poster) Storage::disk('public')->delete($competition->poster);
        if ($competition->payment_qr_code) Storage::disk('public')->delete($competition->payment_qr_code);
        
        $competition->delete();

        return redirect()->route('penyelenggara.index')->with('success', 'Kompetisi berhasil dihapus.');
    }

    public function filter(Request $request)
    {
        $query = Competition::with('organizer')
            ->where('status', 'approved')
            ->where('deadline', '>', \Carbon\Carbon::now());

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('level')) {
            $query->where('level', $request->level);
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        $competitions = $query->get();

        return view('peserta.rekomendasi', compact('competitions'));
    }
}
