<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', ["title" => "Dashboard"])
    ->name('dashboard');
});

Route::get('/sample', function () {
    return view('sample', ["title" => "Sample"])
    ->name('sample');
});
