<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompetitionCategory;

class CompetitionCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Sains',
            'Seni',
            'Olahraga',
            'Teknologi',
        ];

        foreach ($categories as $name) {
            CompetitionCategory::firstOrCreate(['name' => $name]);
        }
    }
}
