<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Login;

Route::get('/', [ChirpController::class, 'index']);

// Protected routes
Route::middleware('auth')->group(function () {
    Route::post('/chirps', [ChirpController::class, 'store']);
    Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit']);
    Route::put('/chirps/{chirp}', [ChirpController::class, 'update']);
    Route::delete('/chirps/{chirp}', [ChirpController::class, 'destroy']);

    //logout route
    Route::post('/logout', Logout::class)->name('logout');
});

// Auth routes (login, register, etc.)
Route::middleware('guest')->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', Login::class);
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', Register::class);
});