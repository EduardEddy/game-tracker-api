<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\GuestAttractions\GuestAttractionController;
use App\Http\Controllers\API\GuestAttractions\GuestAttractionsActiveController;

Route::controller(GuestAttractionController::class)
    ->middleware(['auth:sanctum'])
    ->prefix('/guest-attractions')
    ->group(function() {
        Route::post('/{attraction}', 'store')->name('guest-attraction.create');
        Route::post('/{attraction}/new-assign', 'newAssign');
        Route::delete('/finished-time/{guestAttraction}', 'finishedTime')->name('guest-attraction.finishedTime');
        Route::get('/{attraction}', 'index');
    }
);

Route::middleware(['auth:sanctum'])->get('/guest-attractions/{attraction}/guest/{guest}',GuestAttractionsActiveController::class);