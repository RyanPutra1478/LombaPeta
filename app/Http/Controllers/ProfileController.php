<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Storage;
 
class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        $profile = $user->profile ?? UserProfile::create(['user_id' => $user->id]);
        
        $registrations = collect();
        $bookmarks = collect();

        if ($user->role === 'peserta') {
            $registrations = \App\Models\Registration::where('user_id', $user->id)
                ->with('competition.organizer')
                ->latest()
                ->get();
                
            $bookmarks = \App\Models\Bookmark::where('user_id', $user->id)
                ->with('competition.organizer')
                ->latest()
                ->get();
        }

        $view = $user->role === 'penyelenggara' ? 'penyelenggara.profile' : 'peserta.profil';
        if ($user->role === 'admin') return redirect()->route('admin.pengaturan'); 
        
        return view($view, compact('user', 'profile', 'registrations', 'bookmarks'));
    }
 
    public function update(Request $request)
    {
        $user = auth()->user();
        $profile = $user->profile ?? UserProfile::create(['user_id' => $user->id]);
 
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'institution' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
 
        $user->update(['name' => $validated['name']]);
 
        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            if ($profile->avatar) {
                Storage::disk('public')->delete($profile->avatar);
            }
            $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }
 
        $profile->update($validated);
 
        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}
