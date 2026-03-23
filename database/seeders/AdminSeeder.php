<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::updateOrCreate(
            ['username' => 'LombaPeta'],
            [
                'name' => 'Administrator',
                'email' => 'admin@lombapeta.com',
                'password' => \Illuminate\Support\Facades\Hash::make('090307'),
                'role' => 'admin',
                'status' => 'approved',
            ]
        );
    }
}
