<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// 1. Rute Publik
Route::get('/', function () {
    return view('welcome');
});