<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GuestAttractions\GuestAttractionController;

Route::controller(GuestAttractionController::class)->group(function() {
    Route::get('/activities', 'index');
    Route::get('/activities/total', 'total');
})->middleware('auth');