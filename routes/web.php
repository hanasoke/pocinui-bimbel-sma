<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// 1. Rute Publik
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 2. Rute Profile (Bawaan Breeze, wajib login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 3. Rute Khusus Admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function(){
    // Sementara kita buat view dummy dulu untuk testing 
    Route::get('/dashboard', function(){
        return view('admin.dashboard');
    })->name('dashboard');

    // Nanti rute CRUD Mapel, Userm dll ditaruh di sini 
});

// 4. Rute Khusus Guru
Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/dashboard', function () {
        return view('teacher.dashboard');
    })->name('dashboard');
    
    // Nanti rute absensi, materi, dll ditaruh di sini
});

// 5. Rute Khusus Siswa
Route::middleware(['auth', 'role:student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', function () {
        return view('student.dashboard');
    })->name('dashboard');
    
    // Nanti rute lihat materi, jadwal, dll ditaruh di sini
});

require __DIR__.'/auth.php';
