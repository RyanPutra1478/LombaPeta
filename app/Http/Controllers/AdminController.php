<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\CompetitionCategory;
use App\Models\User;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalApproved = Competition::where('status', 'approved')->count();
        $totalPending = Competition::where('status', 'pending')->count();
        $totalUsers = User::where('role', '!=', 'admin')->count();

        // Popular Categories
        $popularCategories = Competition::select('category', \Illuminate\Support\Facades\DB::raw('count(*) as count'))
            ->whereNotNull('category')
            ->groupBy('category')
            ->orderBy('count', 'desc')
            ->take(4)
            ->get();

        // Recent Activities (Competition Submissions)
        $recentActivities = Competition::with('user')
            ->latest()
            ->take(4)
            ->get();

        // 30-day Trend Data
        $startDate = now()->subDays(29)->startOfDay();
        
        $competitionTrend = Competition::where('created_at', '>=', $startDate)
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->get()
            ->pluck('count', 'date');
            
        $registrationTrend = \App\Models\Registration::where('created_at', '>=', $startDate)
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->get()
            ->pluck('count', 'date');

        $labels = [];
        $compData = [];
        $regData = [];
        for ($i = 0; $i < 30; $i++) {
            $currentDate = $startDate->copy()->addDays($i);
            $dateString = $currentDate->format('Y-m-d');
            $labels[] = $currentDate->format('d M');
            $compData[] = $competitionTrend[$dateString] ?? 0;
            $regData[] = $registrationTrend[$dateString] ?? 0;
        }

        return view('admin.dashboard', compact(
            'totalApproved', 'totalPending', 'totalUsers',
            'popularCategories', 'recentActivities', 'labels', 'compData', 'regData'
        ));
    }


    public function verifikasi()
    {
        $competitions = Competition::with('user')->latest()->get();
        $categories = CompetitionCategory::orderBy('name')->get();
        return view('admin.verifikasi', compact('competitions', 'categories'));
    }

    public function showCompetition($id)
    {
        $competition = Competition::with('user')->findOrFail($id);
        $logs = ActivityLog::with('user')
            ->where('model_type', 'Competition')
            ->where('model_id', $id)
            ->latest()
            ->get();
            
        return response()->json([
            'competition' => $competition,
            'logs' => $logs
        ]);
    }

    public function updateCompetition(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'nullable|exists:competition_categories,id',
            'level' => 'nullable|string',
            'credibility_score' => 'nullable|integer|min:0|max:100',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $competition = Competition::findOrFail($id);
        
        $competition->title = $request->title;
        $competition->category_id = $request->category_id;
        $catModel = \App\Models\CompetitionCategory::find($request->category_id);
        $competition->category = $catModel ? $catModel->name : $competition->category;
        $competition->level = $request->level ?? $competition->level;
        if ($request->filled('credibility_score')) {
            $competition->credibility_score = $request->credibility_score;
        } else if ($competition->credibility_score === null) {
            $competition->credibility_score = 0;
        }
        $competition->status = $request->status;
        
        // Log before saving to capture differences
        ActivityLog::logModelChange($competition, 'update', "Admin memperbarui kompetisi '{$competition->title}'");
        
        $competition->save();

        return redirect()->back()->with('success', 'Data kompetisi berhasil diperbarui oleh admin.');
    }

    public function deleteCompetition($id)
    {
        $competition = Competition::findOrFail($id);
        $title = $competition->title;
        $competition->delete();

        ActivityLog::log('delete', 'Competition', $id, "Admin menghapus kompetisi '{$title}'");

        return redirect()->back()->with('success', 'Kompetisi berhasil dihapus.');
    }

    public function pengaturan()
    {
        $organizers  = User::with('profile')->where('role', 'penyelenggara')->latest()->get();
        $participants = User::with('profile')->where('role', 'peserta')->latest()->get();
        $deletedUsers = User::with('profile')->onlyTrashed()->latest()->get();
        $categories  = CompetitionCategory::orderBy('name')->get();
        
        // Comprehensive Activities from ActivityLog table
        $recentLogs = ActivityLog::with('user')->latest()->take(10)->get();
        
        $recentCompetitions = Competition::with('user')->latest()->take(5)->get();
        $recentRegistrations = \App\Models\Registration::with(['user', 'competition'])->latest()->take(5)->get();

        return view('admin.pengaturan', compact(
            'organizers', 'participants', 'deletedUsers', 'categories', 
            'recentCompetitions', 'recentRegistrations', 'recentLogs'
        ));
    }

    public function showUser($id)
    {
        $user = User::withTrashed()->with('profile')->findOrFail($id);
        return response()->json($user);
    }

    public function approveUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->status = 'approved';
        
        ActivityLog::logModelChange($user, 'approve', "Admin menyetujui akun penyelenggara '{$user->name}'");
        
        $user->save();

        return redirect()->back()->with('success', 'Akun berhasil disetujui.');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $name = $user->name;
        $user->delete();

        ActivityLog::log('delete', 'User', $id, "Admin menghapus akun '{$name}'");

        return redirect()->back()->with('success', 'Akun berhasil dihapus.');
    }

    public function restoreUser($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();

        ActivityLog::log('restore', 'User', $id, "Admin memulihkan akun '{$user->name}'");

        return redirect()->back()->with('success', 'Akun berhasil dipulihkan.');
    }

    public function storeCategory(Request $request)
    {
        $request->validate(['name' => 'required|string|max:100|unique:competition_categories,name']);
        $category = CompetitionCategory::create(['name' => $request->name]);
        
        ActivityLog::log('create', 'Category', $category->id, "Admin menambah kategori baru '{$category->name}'");

        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function deleteCategory($id)
    {
        $category = CompetitionCategory::findOrFail($id);
        $name = $category->name;
        $category->delete();

        ActivityLog::log('delete', 'Category', $id, "Admin menghapus kategori '{$name}'");

        return redirect()->back()->with('success', 'Kategori berhasil dihapus.');
    }
}
