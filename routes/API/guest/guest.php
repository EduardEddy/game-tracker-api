<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Guest\GuestController;

Route::controller(GuestController::class)
    ->prefix('/guests')
    ->group(function() {
        Route::post('/', 'store')->name('guest.create');
        Route::get('/','checkrates');
        Route::get('/{guest}', 'show');
    }
);