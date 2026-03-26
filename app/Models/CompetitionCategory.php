<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompetitionCategory extends Model
{
    protected $fillable = ['name'];

    public function competitions()
    {
        return $this->hasMany(Competition::class, 'category_id');
    }
}
