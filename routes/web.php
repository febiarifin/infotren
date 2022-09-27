<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenjangController;
use App\Http\Controllers\KonsentrasiCotroller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesantrenController;
use App\Http\Controllers\SettingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Index
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Login
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('login');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Pesantren
Route::get('/pesantrens', [PesantrenController::class, 'index'])->name('pesantrens');
Route::get('/pesantren/create', [PesantrenController::class, 'create'])->name('pesantren.create');
Route::post('/pesantren/store', [PesantrenController::class, 'store'])->name('pesantren.store');
Route::post('/pesantren/update', [PesantrenController::class, 'update'])->name('pesantren.update');
Route::post('/pesantren/delete', [PesantrenController::class, 'delete'])->name('pesantren.delete');
Route::get('/pesantren/edit/{pesantren}', [PesantrenController::class, 'edit'])->name('pesantren.edit');
Route::get('/pesantren/preview/{pesantren}', [PesantrenController::class, 'preview'])->name('pesantren.preview');
Route::post('/pesantren/galeri/store', [PesantrenController::class, 'galeriStore'])->name('pesantren.galeri.store');
Route::post('/pesantren/galeri/delete', [PesantrenController::class, 'galeriDelete'])->name('pesantren.galeri.delete');

// Konsentrasi
Route::post('/konsentrasi/store', [KonsentrasiCotroller::class, 'store'])->name('konsentrasi.store');
Route::post('/konsentrasi/update', [KonsentrasiCotroller::class, 'update'])->name('konsentrasi.update');
Route::post('/konsentrasi/delete', [KonsentrasiCotroller::class, 'delete'])->name('konsentrasi.delete');

// Jenjang
Route::post('/jenjang/store', [JenjangController::class, 'store'])->name('jenjang.store');
Route::post('/jenjang/update', [JenjangController::class, 'update'])->name('jenjang.update');
Route::post('/jenjang/delete', [JenjangController::class, 'delete'])->name('jenjang.delete');

//Setting
Route::get('settings', [SettingController::class, 'index'])->name('settings');

// Logout
Route::get('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('login');
})->name('logout')->middleware('auth');