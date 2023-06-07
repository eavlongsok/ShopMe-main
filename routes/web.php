<?php

use App\Http\Controllers\AuthController;
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

Route::get('/signup', function() {
    return view('signup');
});

Route::post('/sign-up', [AuthController::class, 'signUp']);

Route::get('/login', function() {
    return view('login');
})->middleware('loginpage');

Route::post('log-in', [AuthController::class, 'logIn'])->middleware('loginpage');

Route::post('/logout', [AuthController::class, 'logOut']);

