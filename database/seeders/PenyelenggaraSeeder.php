<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PenyelenggaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::updateOrCreate(
            ['username' => 'penyelenggara1'],
            [
                'name'     => 'Penyelenggara Demo',
                'email'    => 'penyelenggara@lombapeta.com',
                'password' => Hash::make('password'),
                'role'     => 'penyelenggara',
                'status'   => 'approved',
            ]
        );
    }
}
