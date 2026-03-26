<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;

Route::middleware(['auth'])->group(function () {
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
    Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.markAllAsRead');
    
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});



Route::get('/', function () {
    $competitions = \App\Models\Competition::with('organizer')
        ->where('status', 'approved')
        ->where('deadline', '>=', now())
        ->latest()
        ->take(8)
        ->get();
    $categories = \App\Models\CompetitionCategory::orderBy('name')->get();
    return view('welcome', compact('competitions', 'categories'));
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
    Route::post('/verifikasi/{id}', [AdminController::class, 'updateCompetition'])->name('verifikasi.update');
    Route::delete('/verifikasi/{id}', [AdminController::class, 'deleteCompetition'])->name('verifikasi.delete');
    Route::get('/pengaturan', [AdminController::class, 'pengaturan'])->name('pengaturan');
    Route::get('/user/{id}', [AdminController::class, 'showUser'])->name('user.show');
    Route::post('/pengaturan/{id}/approve', [AdminController::class, 'approveUser'])->name('user.approve');
    Route::delete('/pengaturan/{id}', [AdminController::class, 'deleteUser'])->name('user.delete');
    Route::post('/pengaturan/{id}/restore', [AdminController::class, 'restoreUser'])->name('user.restore');
    // Category CRUD
    Route::post('/kategori', [AdminController::class, 'storeCategory'])->name('kategori.store');
    Route::delete('/kategori/{id}', [AdminController::class, 'deleteCategory'])->name('kategori.destroy');
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
        Route::get('/competition/{id}/registrations/export', [RegistrationController::class, 'export'])->name('competition.registrants.export');
        Route::get('/competition/{id}/json', [CompetitionController::class, 'showJson'])->name('competition.json');

    });
});

Route::middleware(['auth', 'role:peserta'])->prefix('peserta')->name('peserta.')->group(function () {
    Route::get('/dashboard', [CompetitionController::class, 'filter'])->name('dashboard');
    Route::get('/pendaftaran/{id}', [RegistrationController::class, 'create'])->name('pendaftaran');
    Route::post('/daftar/{id}', [RegistrationController::class, 'store'])->name('pendaftaran.store');
    Route::get('/kalender', [RegistrationController::class, 'calendar'])->name('kalender');
    Route::get('/profil', [ProfileController::class, 'show'])->name('profil');

    Route::post('/bookmark/{id}', [BookmarkController::class, 'toggle'])->name('bookmark.toggle');
});

// Public Competition Detail Route
Route::get('/lomba/detail/{id}', [CompetitionController::class, 'show'])->name('peserta.detail');
