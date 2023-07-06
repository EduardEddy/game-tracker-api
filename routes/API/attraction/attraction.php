<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\Attraction\AttractionController;

Route::controller(AttractionController::class)
->prefix('/attractions')
->group(function() {
    Route::get('/', 'index')->name('api.attractions');
    Route::get('/{attraction}', 'show')->name('api.attractions');
});//->middleware('auth:sanctum');
//Route::get('attractions', AttractionController::class)->name('api.attractions')->middleware('auth:sanctum');
