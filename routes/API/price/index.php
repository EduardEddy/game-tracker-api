<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PriceAttraction\PriceAttractionController;


Route::controller(PriceAttractionController::class)
    ->middleware(['auth:sanctum'])
    ->prefix('/price-attractions')
    ->group(function() {
        Route::get('/{attraction}', 'index');
    }
);