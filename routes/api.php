<?php

use App\Http\Controllers\SellerAPIController;
use App\Http\Middleware\Cors;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::post('/registerProduct', [SellerAPIController::class, 'registerProduct']);

    Route::post('/test', [SellerAPIController::class, 'test']);
});

Route::get('/categories', [SellerAPIController::class, 'getCategories'])->middleware('auth:sanctum');

