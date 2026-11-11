<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\AuthController;

// Route Auth (Login & Logout)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route yang WAJIB LOGIN (Admin & Petugas)
Route::middleware(['auth', 'role:admin,petugas'])->group(function () {
    Route::get('/', [TiketController::class, 'index'])->name('home');
    Route::get('/kelola-tiket', [TiketController::class, 'kelolaTiket'])->name('tiket.kelola');
    Route::post('/simpan-tiket', [TiketController::class, 'store'])->name('tiket.store');
});

// Route Khusus Admin (Hanya Admin yang bisa Hapus)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('/hapus-tiket/{id}', [TiketController::class, 'destroy'])->name('tiket.destroy');
});