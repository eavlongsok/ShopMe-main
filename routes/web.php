<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AuthController::class, 'home'])->middleware('homepage');
Route::get('/search', [SearchController::class, 'searchPage'])->middleware('homepage');

Route::get('/signup', function() {
    return view('signup');
})->middleware('restrictLogin');

Route::post('/sign-up', [AuthController::class, 'signUp'])->middleware('restrictLogin');

Route::get('/login', function() {
    return view('login');
})->middleware('restrictLogin')->name('login');

Route::post('log-in', [AuthController::class, 'logIn'])->middleware('restrictLogin');

Route::post('/logout', [AuthController::class, 'logOut']);

