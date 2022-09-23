<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesantrenController;
use Illuminate\Support\Facades\Route;

// Index
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Login
Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'authenticate'])->name('login')->middleware('guest');

// Dashboard

// Pesantren
Route::get('/pesantrens', [PesantrenController::class, 'index'])->name('pesantrens');
Route::get('/pesantren/create', [PesantrenController::class, 'create'])->name('pesantren.create');
Route::post('/pesantren/store', [PesantrenController::class, 'store'])->name('pesantren.store');
Route::post('/pesantren/update', [PesantrenController::class, 'update'])->name('pesantren.update');
Route::post('/pesantren/delete', [PesantrenController::class, 'delete'])->name('pesantren.delete');
Route::get('/pesantren/edit/{pesantren}', [PesantrenController::class, 'edit']);