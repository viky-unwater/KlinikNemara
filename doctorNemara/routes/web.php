<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;

Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware('doctor')->group(function () {
    Route::get('/dashboard', [DoctorController::class, 'index']);
    Route::get('/patient/{id}', [DoctorController::class, 'show']);
});
