<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Attractions\AttractionController;

Route::controller(AttractionController::class)->group(function() {
    Route::get('/attractions', 'index')->name('attractions');
    Route::post('/attractions','store');
    Route::put('/attractions/{attraction}', 'update');
    Route::get('/attractions/{attraction}', 'show');
    Route::delete('/attractions/{attraction}', 'destroy')->name('attractions.destroy');
})->middleware('auth');