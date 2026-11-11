<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/admin', [AdminController::class, 'index'])
    ->name('admin.dashboard');

Route::get('/cek-koneksi', function() {
    try {
        $result = DB::selectOne(
            'SELECT @@SERVERNAME AS server_name, 
                    DB_NAME() AS database_name'
        );

        return response()->json([
            'status' => 'berhasil',
            'server' => $result->server_name,
            'database' => $result->database_name,
        ]);
    } catch (\Throwable $e) {
        report($e);

        return response()->json([
            'status' => 'gagal',
            'pesan'  => 'Koneksi database gagal.',
        ], 500);
    }
});

// Halaman utama
Route::get('/', function() {
    return redirect()->route('login');
});

// Authentication 
Route::middleware('guest')->group(function () {

    Route::get('/register', [AuthController::class, 'register'])
        ->name('register');

    Route::get('/register', [AuthController::class, 'storeRegister'])
        ->name('register.store');

    Route::get('/login', [AuthController::class, 'login'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'authenticate'])
        ->name('login.authenticate');

});

// Halaman yang membutuhkan login 
Route::middleware('auth')->group(function() {

    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

});