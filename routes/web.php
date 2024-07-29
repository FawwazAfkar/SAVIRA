<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//route with auth middleware
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::prefix('daftar-arsip')->group(function () {
        Route::get('/', [HomeController::class, 'daftarAV'])->name('daftar-arsip');
        Route::post('/daftar-arsip', [ArsipController::class, 'store'])->name('arsip.store');
        Route::put('/daftar-arsip/edit/{id}', [ArsipController::class, 'update'])->name('arsip.update');
        Route::post('/daftar-arsip/delete/{id}', [ArsipController::class, 'destroy'])->name('arsip.destroy');
    });
    Route::prefix('daftar-instansi')->group(function () {
        Route::get('/', [HomeController::class, 'daftarInstansi'])->name('daftar-instansi');
        Route::post('/daftar-instansi', [InstansiController::class, 'store'])->name('instansi.store');
        Route::put('/daftar-instansi/edit/{id}', [InstansiController::class, 'update'])->name('instansi.update');
        Route::post('/daftar-instansi/delete/{id}', [InstansiController::class, 'destroy'])->name('instansi.destroy');
    });
    Route::prefix('daftar-user')->group(function () {
        Route::get('/', [HomeController::class, 'daftarUser'])->name('daftar-user');
        Route::post('/daftar-user', [UserController::class, 'store'])->name('user.store');
        Route::put('/daftar-user/edit/{id}', [UserController::class, 'update'])->name('user.update');
        Route::post('/daftar-user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });
});

