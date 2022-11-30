<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Google URL
Route::name('google.')->group( function(){
    Route::get('auth/google', [GoogleController::class, 'loginWithGoogle'])->name('login');
    Route::any('auth/google/callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/location', [HomeController::class, 'location'])->name('location');
});
