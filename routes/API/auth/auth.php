<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\Auth\AuthController;

Route::post('/login',[AuthController::class, 'login'])->name('api.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('api.logout')->middleware('auth:sanctum');