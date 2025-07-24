<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BacaSensorController;

// Route GET untuk mengambil data (sudah ada)
Route::get('/baca-sensor/terbaru', [BacaSensorController::class, 'getLatestData']);

// Route POST baru untuk MENYIMPAN data dari ESP8266
Route::post('/baca-sensor', [BacaSensorController::class, 'store']);