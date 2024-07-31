<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('auth/login');
})->name('login');

Auth::routes();

// All roles routes
Route::middleware('auth')->group(function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/daftar-arsip', [HomeController::class, 'daftarAV'])->name('daftar-arsip');
});

// Super admin and admin only routes
Route::middleware(['auth', 'role:SuperAdmin|Admin'])->group(function() {
    Route::prefix('daftar-arsip')->group(function () {
        Route::post('/create', [ArsipController::class, 'store'])->name('arsip.store');
        Route::put('/edit/{id}', [ArsipController::class, 'update'])->name('arsip.update');
        Route::post('/delete/{id}', [ArsipController::class, 'destroy'])->name('arsip.destroy');
    });
    Route::prefix('daftar-user')->group(function () {
        Route::get('/', [HomeController::class, 'daftarUser'])->name('daftar-user');
        Route::post('/create', [UserController::class, 'store'])->name('user.store');
        Route::put('/edit/{id}', [UserController::class, 'update'])->name('user.update');
        Route::post('/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });
});

// Super admin only routes
Route::middleware(['auth', 'role:SuperAdmin'])->group(function() {
    Route::prefix('daftar-instansi')->group(function () {
        Route::get('/', [HomeController::class, 'daftarInstansi'])->name('daftar-instansi');
        Route::post('/create', [InstansiController::class, 'store'])->name('instansi.store');
        Route::put('/edit/{id}', [InstansiController::class, 'update'])->name('instansi.update');
        Route::post('/delete/{id}', [InstansiController::class, 'destroy'])->name('instansi.destroy');
    });
});
