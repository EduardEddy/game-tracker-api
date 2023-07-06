<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Exports\ExportController;

Route::get('/exports', ExportController::class)->name('export');