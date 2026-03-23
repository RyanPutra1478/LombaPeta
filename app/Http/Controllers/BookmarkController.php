<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Bookmark;
use App\Models\Competition;

class BookmarkController extends Controller
{
    public function index()
    {
        $bookmarks = Bookmark::where('user_id', auth()->id())->with('competition')->get();
        return view('peserta.profil', compact('bookmarks'));
    }

    public function toggle($competitionId)
    {
        $userId = auth()->id();
        $bookmark = Bookmark::where('user_id', $userId)->where('competition_id', $competitionId)->first();

        if ($bookmark) {
            $bookmark->delete();
            $status = 'unbookmarked';
        } else {
            Bookmark::create([
                'user_id' => $userId,
                'competition_id' => $competitionId,
            ]);
            $status = 'bookmarked';
        }

        return redirect()->back()->with('status', $status);
    }
}
