<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChangePasswordController;
use Illuminate\Support\Facades\Auth; 


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/daftar-user', [HomeController::class, 'daftarUser'])->name('daftar-user');
Route::get('/daftar-arsip', [HomeController::class, 'daftarAV'])->name('daftar-arsip');
Route::get('/daftar-instansi', [HomeController::class, 'daftarInstansi'])->name('daftar-instansi');