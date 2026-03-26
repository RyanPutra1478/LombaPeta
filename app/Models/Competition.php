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
}
