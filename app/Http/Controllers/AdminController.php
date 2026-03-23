<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\User;
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

        return view('admin.dashboard', compact('totalApproved', 'totalPending', 'totalUsers', 'popularCategories', 'recentActivities'));
    }

    public function verifikasi()
    {
        $competitions = Competition::with('user')->latest()->get();
        return view('admin.verifikasi', compact('competitions'));
    }

    public function showCompetition($id)
    {
        $competition = Competition::with('user')->findOrFail($id);
        return response()->json($competition);
    }

    public function approveCompetition(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
            'credibility_score' => 'nullable|integer|min:0|max:100',
        ]);

        $competition = Competition::findOrFail($id);
        $competition->status = $request->input('status');
        if ($request->has('credibility_score')) {
            $competition->credibility_score = $request->input('credibility_score');
        }
        $competition->save();

        return redirect()->back()->with('success', 'Status kompetisi diperbarui.');
    }

    public function deleteCompetition($id)
    {
        $competition = Competition::findOrFail($id);
        $competition->delete();

        return redirect()->back()->with('success', 'Kompetisi berhasil dihapus.');
    }

    public function pengaturan()
    {
        $organizers = User::where('role', 'penyelenggara')->latest()->get();
        $participants = User::where('role', 'peserta')->latest()->get();
        $deletedUsers = User::onlyTrashed()->latest()->get();

        return view('admin.pengaturan', compact('organizers', 'participants', 'deletedUsers'));
    }

    public function showUser($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        return response()->json($user);
    }

    public function approveUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->status = 'approved';
        $user->save();

        return redirect()->back()->with('success', 'Akun berhasil disetujui.');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Akun berhasil dihapus.');
    }

    public function restoreUser($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();

        return redirect()->back()->with('success', 'Akun berhasil dipulihkan.');
    }
}
