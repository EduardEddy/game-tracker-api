<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\GuestAttractions\GuestAttractionController;

Route::controller(GuestAttractionController::class)
    ->middleware(['auth:sanctum'])
    ->prefix('/guest-attractions')
    ->group(function() {
        Route::post('/', 'store')->name('guest-attraction.create');
        Route::delete('/finished-time/{guestAttraction}', 'finishedTime')->name('guest-attraction.finishedTime');
        Route::get('/{attraction}', 'index');
    }
);