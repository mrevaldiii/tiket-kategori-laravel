<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\AuthController;

Route::get('/', [TiketController::class, 'index'])->name('home');

// Route untuk Guest (Belum Login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Route Logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Route yang dilindungi Middleware Auth & Role
Route::middleware(['auth', 'role:admin,petugas'])->group(function () {
    Route::get('/kelola-tiket', [TiketController::class, 'kelola'])->name('tiket.kelola');
    Route::post('/simpan-tiket', [TiketController::class, 'store'])->name('tiket.store');
});

// Route Khusus Admin
Route::delete('/hapus-tiket/{id}', [TiketController::class, 'destroy'])
    ->middleware(['auth', 'role:admin'])
    ->name('tiket.destroy');