<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\Attractions\AttractionController;

Route::middleware('auth:sanctum')->controller(AttractionController::class)
->prefix('/attractions')
->group(function() {
    Route::get('/', 'index');
    Route::get('/{attraction}', 'show');
});

/*Route::get('attractions', [AttractionController::class, 'index'])
->name('api.attractions')
->middleware('auth:sanctum');*/
