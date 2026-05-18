<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('registration.index');
});

// Displays a list of all registered participants. Uses the index() method.
Route::get('/registrations', [RegisterController::class, 'index'])->name('registration.index');

// Displays the form for creating a new participant registration. Uses the create() method.
Route::get('/registrations/create', [RegisterController::class, 'create'])->name('registration.create');

// Handles the search functionality for participants. Uses the search_result() method.
Route::get('/registrations/search', [RegisterController::class, 'search_result'])->name('registration.search');

// Displays the edit form for a specific participant. Uses the edit() method.
Route::get('/registrations/{participant}', [RegisterController::class, 'edit'])->name('registration.edit');

// Saves a new participant registration into the database. Uses the store() method.
Route::post('/registrations', [RegisterController::class, 'store'])->name('registration.store');

// Updates an existing participant's information. Uses the update() method.
Route::put('/registrations/{participant}', [RegisterController::class, 'update'])->name('registration.update');

// Deletes a participant's registration from the database. Uses the destroy() method.
Route::delete('/registrations/{participant}', [RegisterController::class, 'destroy'])->name('registration.destroy');