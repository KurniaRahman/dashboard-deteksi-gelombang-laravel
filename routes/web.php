<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BacaSensorController;

Route::get('/', [BacaSensorController::class, 'index']);
