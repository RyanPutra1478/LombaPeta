<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\BookmarkController;

Route::get('/', function () {
    $competitions = \App\Models\Competition::with('organizer')
        ->where('status', 'approved')
        ->where('deadline', '>=', now())
        ->latest()
        ->take(8)
        ->get();
    return view('welcome', compact('competitions'));
})->name('home');
Route::get('/auth', function () { return view('auth.login'); })->name('login');
Route::post('/auth/process', [AuthController::class, 'process'])->name('auth.process');
Route::post('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/verifikasi', [AdminController::class, 'verifikasi'])->name('verifikasi');
    Route::get('/verifikasi/{id}', [AdminController::class, 'showCompetition'])->name('verifikasi.show');
    Route::post('/verifikasi/{id}', [AdminController::class, 'approveCompetition'])->name('verifikasi.approve');
    Route::delete('/verifikasi/{id}', [AdminController::class, 'deleteCompetition'])->name('verifikasi.delete');
    Route::get('/pengaturan', [AdminController::class, 'pengaturan'])->name('pengaturan');
    Route::get('/user/{id}', [AdminController::class, 'showUser'])->name('user.show');
    Route::post('/pengaturan/{id}/approve', [AdminController::class, 'approveUser'])->name('user.approve');
    Route::delete('/pengaturan/{id}', [AdminController::class, 'deleteUser'])->name('user.delete');
    Route::post('/pengaturan/{id}/restore', [AdminController::class, 'restoreUser'])->name('user.restore');
});

Route::middleware(['auth', 'role:penyelenggara'])->prefix('penyelenggara')->name('penyelenggara.')->group(function () {
    Route::middleware(['status'])->group(function () {
        Route::get('/dashboard', [CompetitionController::class, 'dashboard'])->name('dashboard');
        Route::get('/create', [CompetitionController::class, 'create'])->name('create');
        Route::post('/store', [CompetitionController::class, 'store'])->name('store');
        Route::get('/index', [CompetitionController::class, 'index'])->name('index'); 
        Route::get('/edit/{id}', [CompetitionController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [CompetitionController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [CompetitionController::class, 'destroy'])->name('destroy');
        Route::get('/competition/{id}/registrations', [RegistrationController::class, 'registrants'])->name('competition.registrants');
        Route::get('/registrations/all', [RegistrationController::class, 'allRegistrants'])->name('registrations.all');
        Route::get('/registrations/{id}', [RegistrationController::class, 'organizerShow'])->name('registrations.show');
        Route::post('/registrations/{id}/status', [RegistrationController::class, 'updateStatus'])->name('registrations.updateStatus');
    });
});

Route::middleware(['auth', 'role:peserta'])->prefix('peserta')->name('peserta.')->group(function () {
    Route::get('/dashboard', [CompetitionController::class, 'filter'])->name('dashboard');
    Route::get('/detail-lomba/{id}', [CompetitionController::class, 'show'])->name('detail');
    Route::get('/pendaftaran/{id}', [RegistrationController::class, 'create'])->name('pendaftaran');
    Route::post('/daftar/{id}', [RegistrationController::class, 'store'])->name('pendaftaran.store');
    
    Route::get('/kalender', [RegistrationController::class, 'calendar'])->name('kalender');
    
    Route::get('/profil', [RegistrationController::class, 'index'])->name('profil');
    
    Route::post('/bookmark/{id}', [BookmarkController::class, 'toggle'])->name('bookmark.toggle');
});
