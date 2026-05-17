<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('registration.index');
});

Route::get('/registrations', [RegisterController::class, 'index'])->name('registration.index');
Route::get('/register', [RegisterController::class, 'create'])->name('registration.create');
Route::post('/register', [RegisterController::class, 'store'])->name('registration.store');
