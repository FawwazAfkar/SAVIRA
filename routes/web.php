<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArsipController;

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
    Route::get('/daftar-user', [HomeController::class, 'daftarUser'])->name('daftar-user');
    Route::get('/daftar-instansi', [HomeController::class, 'daftarInstansi'])->name('daftar-instansi');
});

