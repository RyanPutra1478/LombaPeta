<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::updateOrCreate(
            ['username' => 'peserta1'],
            [
                'name'     => 'Peserta Demo',
                'email'    => 'peserta@lombapeta.com',
                'password' => Hash::make('password'),
                'role'     => 'peserta',
                'status'   => 'approved',
            ]
        );
    }
}
