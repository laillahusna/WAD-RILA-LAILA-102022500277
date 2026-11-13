<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KamarController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/kamar');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('kamar', KamarController::class)->except(['destroy']);

    Route::delete('kamar/{kamar}', [KamarController::class, 'destroy'])
        ->middleware('role:admin')
        ->name('kamar.destroy');
});
