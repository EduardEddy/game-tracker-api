<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\GuestAttractions\GuestFreeAttractionController;

Route::middleware('auth:sanctum')->controller(GuestFreeAttractionController::class)->group(function() {
    Route::post('/free-attractions/{attraction}','store');
    Route::post('/free-attractions/{attraction}/new-assign','newAssign');
});