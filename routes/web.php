<?php

use App\Http\Controllers\RuangController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        "title" => "Dashboard",
        "dashboard_active" => "active"
    ]);
})->name('dashboard');

Route::get('/sample', function () {
    return view('sample', ["title" => "Sample"]);
})->name('sample');

Route::middleware(['guest'])->group(function () {
    Route::resource('/ruang', RuangController::class);
});
