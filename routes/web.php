<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('registration.index');
});

Route::get('/registrations', function () {
    return view('registration.index');
})->name('registration.index');

Route::get('/register', function () {
    return view('registration.create');
})->name('registration.create');
