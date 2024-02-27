<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\UserCollaboratorController;

Route::middleware(['auth'])->controller(UserCollaboratorController::class)->group(function() {
    Route::get('/collaborators', 'index')->name('collaborators');
    Route::post('/collaborators', 'store')->name('collaborator');
    Route::delete('/collaborators/{collaborator}', 'destroy')->name('collaborator.destroy');
    Route::get('/collaborators/{collaborator}', 'show');
    Route::put('/collaborators/{collaborator}', 'update');
});