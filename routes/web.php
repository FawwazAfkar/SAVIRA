<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//route with auth middleware
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
    Route::get('/daftar-user', [HomeController::class, 'daftarUser'])->name('daftar-user');
    Route::get('/daftar-arsip', [HomeController::class, 'daftarAV'])->name('daftar-arsip');
    Route::get('/daftar-instansi', [HomeController::class, 'daftarInstansi'])->name('daftar-instansi');
});
