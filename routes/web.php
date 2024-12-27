<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\SatuanController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('login', function () {
        return view('login');
    })->name('login');
    Route::post('login', [PenggunaController::class, 'authenticate'])->name('pengguna.authenticate');
});

Route::middleware(['auth'])->group(function () {
    Route::post('logout', [PenggunaController::class, 'logout'])->name('pengguna.logout');

    Route::get('/', function () {
        return view('welcome', [
            "title" => "Dashboard",
            "dashboard_active" => "active"
        ]);
    })->name('dashboard');

    Route::get('/sample', function () {
        return view('sample', ["title" => "Sample"]);
    })->name('sample');

    Route::resource('/ruang', RuangController::class);
    Route::resource('/satuan', SatuanController::class);
    Route::resource('/pemasok', PemasokController::class);
    Route::resource('/barang', BarangController::class);
    Route::resource('/pengguna', PenggunaController::class);
});
