<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\ActiveAccount\ActiveAccountController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function() {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/template', function() {
    return view('template');
});

Route::get('/dashboard', function() {
    return view('layouts.dashboard');
})->middleware('auth');


Route::get('/test', function() {
    return view('active_account.index');
});

Route::controller(UserController::class)->group(function() {
    Route::post('/users', 'store')->name('users');
});

Route::controller(ActiveAccountController::class)->group(function(){
    Route::get('/active-account', 'show');
    Route::post('/active-account', 'store')->name('active-account');
});

Route::get('/term-condition', function(){
    return view('TC.term_condition');
});
