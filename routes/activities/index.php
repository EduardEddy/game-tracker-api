<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GuestAttractions\GuestAttractionController;

Route::middleware('auth')->controller(GuestAttractionController::class)->group(function() {
    Route::get('/activities', 'index');
    Route::get('/activities/total', 'total');
});