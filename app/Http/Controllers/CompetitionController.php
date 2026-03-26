<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Competition;
use App\Models\Registration;
use App\Models\ActivityLog;
use App\Models\User;
use App\Notifications\NewCompetitionNotification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;

class CompetitionController extends Controller
{
    public function dashboard()
    {
        $organizer = auth()->user();
        $competitions = Competition::where('user_id', $organizer->id)
            ->withCount(['registrations as pending_registrations_count' => function($q) {
                $q->where('status', 'pending');
            }])
            ->get();
        
        $totalRegistrants = $competitions->sum('pending_registrations_count');
        $totalViews = $competitions->sum('views');
        
        $recentRegistrations = Registration::whereHas('competition', function($q) use ($organizer) {
                $q->where('user_id', $organizer->id);
            })
            ->with(['user', 'competition'])
            ->latest()
            ->take(4)
            ->get();
        
        // Registration Trend (Last 30 Days)
        $startDate = now()->subDays(29)->startOfDay();
        $trendData = Registration::whereHas('competition', function($q) use ($organizer) {
                $q->where('user_id', $organizer->id);
            })
            ->where('created_at', '>=', $startDate)
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->get()
            ->pluck('count', 'date');

        $chartLabels = [];
        $chartData = [];
        for ($i = 0; $i < 30; $i++) {
            $currentDate = $startDate->copy()->addDays($i);
            $dateString = $currentDate->format('Y-m-d');
            $chartLabels[] = $currentDate->format('d M');
            $chartData[] = $trendData[$dateString] ?? 0;
        }
            
        return view('penyelenggara.dashboard', compact(
            'totalRegistrants', 
            'totalViews', 
            'competitions', 
            'recentRegistrations',
            'chartLabels',
            'chartData'
        ));
    }


    public function index()
    {
        $competitions = Competition::where('user_id', auth()->id())
            ->withCount(['registrations as pending_registrations_count' => function($q) {
                $q->where('status', 'pending');
            }])
            ->get();
        return view('penyelenggara.index', compact('competitions'));
    }

    public function create()
    {
        $categories = \App\Models\CompetitionCategory::orderBy('name')->get();
        return view('penyelenggara.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'competition_model' => 'required|in:individu,tim,individu_tim',
            'guidebook_link' => 'nullable|url',
            'category_id' => 'required|exists:competition_categories,id',
            'level' => 'nullable|string',
            'location' => 'nullable|string',
            'deadline' => 'required|date',
            'contact_info' => 'nullable|string',
            'registration_fee' => ['required', 'numeric', 'min:0', function($attr, $val, $fail) {
                if ($val > 0 && $val < 10000) $fail('Biaya pendaftaran minimal Rp 10.000 jika tidak gratis (0).');
            }],
            'payment_qr_code' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'payment_bank_info' => 'nullable|string',
            'credibility_score' => 'required|integer',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'additional_fields' => 'nullable|array',
        ]);

        if ($request->has('additional_fields')) {
            $validated['additional_fields'] = array_filter($request->input('additional_fields'));
        }

        $catModel = \App\Models\CompetitionCategory::find($request->category_id);
        $validated['category'] = $catModel ? $catModel->name : null;

        $validated['user_id'] = auth()->id();
        $validated['status'] = 'pending';

        if ($request->hasFile('poster')) {
            $validated['poster'] = $request->file('poster')->store('posters', 'public');
        }

        if ($request->hasFile('payment_qr_code')) {
            $validated['payment_qr_code'] = $request->file('payment_qr_code')->store('qrcodes', 'public');
        }

        $competition = Competition::create($validated);

        // Notify Admins
        $admins = User::where('role', 'admin')->get();
        Notification::send($admins, new NewCompetitionNotification($competition));

        ActivityLog::log('create', 'Competition', $competition->id, "Penyelenggara '" . auth()->user()->name . "' mendaftarkan kompetisi baru: '{$competition->title}'");

        return redirect()->route('penyelenggara.index')->with('success', 'Kompetisi berhasil didaftarkan dan sedang menunggu verifikasi admin.');
    }

    public function show($id)
    {
        $competition = Competition::with('user')->findOrFail($id);
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

    public function showJson($id)
    {
        $competition = Competition::where('user_id', auth()->id())->with('category_relation')->findOrFail($id);
        $data = $competition->toArray();
        $data['category_name'] = $competition->category_relation ? $competition->category_relation->name : $competition->category;
        return response()->json($data);
    }

    public function edit($id)
    {
        $competition = Competition::where('user_id', auth()->id())->findOrFail($id);
        $categories = \App\Models\CompetitionCategory::orderBy('name')->get();
        return view('penyelenggara.edit', compact('competition', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $competition = Competition::where('user_id', auth()->id())->findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'competition_model' => 'required|in:individu,tim,individu_tim',
            'guidebook_link' => 'nullable|url',
            'category_id' => 'required|exists:competition_categories,id',
            'level' => 'nullable|string',
            'location' => 'nullable|string',
            'deadline' => 'required|date',
            'contact_info' => 'nullable|string',
            'registration_fee' => ['required', 'numeric', 'min:0', function($attr, $val, $fail) {
                if ($val > 0 && $val < 10000) $fail('Biaya pendaftaran minimal Rp 10.000 jika tidak gratis (0).');
            }],
            'payment_qr_code' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'payment_bank_info' => 'nullable|string',
            'credibility_score' => 'required|integer',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'additional_fields' => 'nullable|array',
        ]);

        if ($request->has('additional_fields')) {
            $validated['additional_fields'] = array_filter($request->input('additional_fields'));
        }

        $catModel = \App\Models\CompetitionCategory::find($request->category_id);
        $validated['category'] = $catModel ? $catModel->name : null;

        if ($request->hasFile('poster')) {
            if ($competition->poster) Storage::disk('public')->delete($competition->poster);
            $validated['poster'] = $request->file('poster')->store('posters', 'public');
        }

        if ($request->hasFile('payment_qr_code')) {
            if ($competition->payment_qr_code) Storage::disk('public')->delete($competition->payment_qr_code);
            $validated['payment_qr_code'] = $request->file('payment_qr_code')->store('qrcodes', 'public');
        }

        $competition->fill($validated);
        
        ActivityLog::logModelChange($competition, 'update', "Penyelenggara memperbarui informasi kompetisi '{$competition->title}'");
        
        $competition->save();

        return redirect()->route('penyelenggara.index')->with('success', 'Kompetisi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $competition = Competition::where('user_id', auth()->id())->findOrFail($id);
        $title = $competition->title;
        
        if ($competition->poster) Storage::disk('public')->delete($competition->poster);
        if ($competition->payment_qr_code) Storage::disk('public')->delete($competition->payment_qr_code);
        
        $competition->delete();

        ActivityLog::log('delete', 'Competition', $id, "Penyelenggara menghapus kompetisi '{$title}'");

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

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('level')) {
            $query->where('level', $request->level);
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        $competitions = $query->get();
        $categories = \App\Models\CompetitionCategory::orderBy('name')->get();

        return view('peserta.rekomendasi', compact('competitions', 'categories'));
    }
}
