<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'user_id',
        'avatar',
        'phone',
        'institution',
        'organization_website',
        'bio',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the avatar URL with fallback.
     */
    public function getAvatarUrlAttribute()
    {
        if ($this->avatar && \Illuminate\Support\Facades\Storage::disk('public')->exists($this->avatar)) {
            return asset('storage/' . $this->avatar);
        }
        return null; // Controller/View can decide to use initials or a generic icon
    }
}

