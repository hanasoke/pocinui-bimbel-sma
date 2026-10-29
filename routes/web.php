<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    // Rute untuk Admin
    Route::middleware(['role:admin'])->prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::resource('users', UserController::class);
        Route::resource('subjects', SubjectController::class);
    });

    // Rute untuk Guru
    Route::middleware(['role:teacher'])->prefix('teacher')->group(function () {
        Route::get('/attendance', [AttendanceController::class, 'index']);
        Route::post('/attendance/store', [AttendanceController::class, 'store']);
    });

    // Rute untuk Siswa
    Route::middleware(['role:student'])->prefix('student')->group(function () {
        Route::get('/my-classes', [ClassController::class, 'index']);
    });
});

require __DIR__.'/auth.php';
