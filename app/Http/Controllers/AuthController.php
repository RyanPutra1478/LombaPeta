<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function process(Request $request)
    {
        // 1. Ambil data 'role' dari input form yang tersembunyi (hidden input)
        $role = $request->input('role');

        // 2. Arahkan pengguna ke rute yang sesuai berdasarkan role mereka
        if ($role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($role === 'penyelenggara') {
            return redirect()->route('penyelenggara.index');
        } else {
            // Default: Peserta
            return redirect()->route('peserta.dashboard');
        }
    }
}
