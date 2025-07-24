<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BacaSensorController;
use App\Http\Controllers\AuthController;

// Route untuk menampilkan halaman login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Route untuk memproses login
Route::post('/login', [AuthController::class, 'login']);

// Grup route yang memerlukan login
Route::middleware('auth')->group(function () {
    // Route dashboard utama
    Route::get('/', [BacaSensorController::class, 'index']);

    // Route untuk logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});