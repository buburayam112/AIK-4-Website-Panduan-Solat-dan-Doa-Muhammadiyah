<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\GerakanController;
use App\Http\Controllers\BacaanController;

Route::get('/', function () {
    return view('welcome');
});

// API-style routes for the prayer guide
Route::prefix('api')->group(function () {
    Route::apiResource('kategori', KategoriController::class);
    Route::apiResource('gerakan', GerakanController::class);
    Route::apiResource('bacaan', BacaanController::class);
});
