<?php

use App\Http\Controllers\AuthLoginController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/{driver}',[AuthLoginController::class,'google'])->name('google');

Route::get('/auth/{driver}',[AuthLoginController::class,'redirectToGoogle'])->name('auth.redirect');
Route::get('/auth/{driver}/callback',[AuthLoginController::class,'handleGoogleCallback']);
