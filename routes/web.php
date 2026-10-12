<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::redirect('/', '/students');

Route::controller(StudentController::class)->prefix('students')->name('students.')->group(function () {

    // Read
    Route::get('/', 'index')->name('index');

    // Create
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');

    // Update
    Route::get('/{student}/edit', 'edit')->name('edit');
    Route::put('/{student}', 'update')->name('update');
    Route::patch('/{student}', 'update');

    // Delete
    Route::delete('/{student}', 'destroy')->name('destroy');

});