<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;

Route::get('/', [AuthController::class, 'index']);

// Pengguna yang sudah login (login) tidak dapat mengakses route ini
Route::middleware('auth.state:login')->group(function () {
    Route::get('backend/login', [AuthController::class, 'index'])->name('backend.login');
    Route::get('backend/registrasi', [AuthController::class, 'showRegistrasi'])->name('backend.registrasi');
});

// Pengguna yang belum login (not_login) tidak dapat mengakses route ini
Route::middleware('auth.state:not_login')->group(function () {
    Route::get('backend/dashboard', [DashboardController::class, 'index'])->name('backend.dashboard');
    Route::resource('backend/user', UserController::class)->names('backend.user');
    Route::resource('backend/kategori', KategoriController::class)->names('backend.kategori');
    Route::resource('backend/produk', ProdukController::class)->names('backend.produk');
});

Route::post('backend/registrasi', [AuthController::class, 'storeRegistrasi'])->name('backend.storeregistrasi');
Route::post('backend/login', [AuthController::class, 'authenticate'])->name('backend.login');
Route::post('backend/logout', [AuthController::class, 'logout'])->name('backend.logout');

