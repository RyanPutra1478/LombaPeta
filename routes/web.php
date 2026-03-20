<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// 1. Route ke Halaman Utama & Form Auth
Route::get('/', function () { return view('welcome'); })->name('home');
Route::get('/auth', function () { return view('auth.login'); })->name('auth');

// 2. Route untuk Memproses Data Login/Register (POST)
Route::post('/auth/process', [AuthController::class, 'process'])->name('auth.process');

// 3. Route Halaman Dashboard
// Arahkan ke file dashboard admin yang baru saja Anda buat
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard'); // KODE BARU (menghapus awalan 'admin.')
})->name('admin.dashboard');

Route::get('/admin/verifikasi', function () {
    return view('admin.verifikasi');
})->name('admin.verifikasi');



Route::get('/peserta/dashboard', function () {
    return view('peserta.rekomendasi');
})->name('peserta.dashboard');

Route::get('/peserta/detail-lomba', function () {
    return view('peserta.detail'); // Sesuaikan jika Anda menamai filenya berbeda
})->name('peserta.detail');

Route::get('/peserta/kalender', function () {
    return view('peserta.kalender'); // Sesuai dengan nama file yang Anda simpan
})->name('peserta.kalender');

Route::get('/peserta/profil', function () {
    return view('peserta.profil');
})->name('peserta.profil');

// Rute Formulir Penyelenggara
Route::get('/penyelenggara/create', function () {
    return view('penyelenggara.create');
})->name('penyelenggara.create');

Route::get('/penyelenggara/index', function () {
    return view('penyelenggara.index');
})->name('penyelenggara.index');

Route::get('/penyelenggara/dashboard', function () {
    return view('penyelenggara.dashboard');
})->name('penyelenggara.dashboard');

// Rute Tabel List Penyelenggara
Route::get('/penyelenggara/lomba-saya', function () {
    return view('penyelenggara.index'); // Menyasar file index.blade.php
})->name('penyelenggara.index');
