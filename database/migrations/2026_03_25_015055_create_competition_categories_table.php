<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('competition_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        // Seed default categories
        \DB::table('competition_categories')->insert([
            ['name' => 'Sains & Matematika', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Seni & Sastra',       'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Olahraga',             'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Teknologi & Robotik',  'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('competition_categories');
    }
};
