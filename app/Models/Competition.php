<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'competition_model',
        'guidebook_link',
        'category',
        'level',
        'location',
        'deadline',
        'contact_info',
        'registration_fee',
        'payment_qr_code',
        'payment_bank_info',
        'credibility_score',
        'poster',
        'views',
        'status',
        'additional_fields',
        'category_id',
    ];

    protected $casts = [
        'deadline' => 'datetime',
        'additional_fields' => 'array',
    ];

    public function category_relation()
    {
        return $this->belongsTo(CompetitionCategory::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function organizer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    /**
     * Get the poster URL with fallback.
     */
    public function getPosterUrlAttribute()
    {
        if ($this->poster && \Illuminate\Support\Facades\Storage::disk('public')->exists($this->poster)) {
            return asset('storage/' . $this->poster);
        }
        return asset('images/lomba.png');
    }

    /**
     * Get the payment QR code URL with fallback.
     */
    public function getPaymentQrUrlAttribute()
    {
        if ($this->payment_qr_code && \Illuminate\Support\Facades\Storage::disk('public')->exists($this->payment_qr_code)) {
            return asset('storage/' . $this->payment_qr_code);
        }
        return null; // For QR, null might be better than a generic image if optional
    }
}
