<?php

use App\Http\Controllers\BuyerAPIController;
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
    // buyer
    Route::get('buyer/info', [BuyerAPIController::class, 'getBuyerInfo']);

    Route::get('buyer/product', [BuyerAPIController::class, 'getProduct']);

    Route::post('/buyer/editAccount', [BuyerAPIController::class, 'editAccount']);

    Route::post('/buyer/editLogo', [BuyerAPIController::class, 'editLogo']);

    // seller
    Route::post('/registerProduct', [SellerAPIController::class, 'registerProduct']);

    Route::post('/verify', [SellerAPIController::class, 'verify']);

    Route::post('/test', [SellerAPIController::class, 'test']);

    Route::get('/categories', [SellerAPIController::class, 'getCategories']);

    Route::get('/region', [SellerAPIController::class, 'getRegion']);

    Route::post('/seller/editAccount', [SellerAPIController::class, 'editAccount']);

    Route::post('/seller/editLogo', [SellerAPIController::class, 'editLogo']);

    Route::get('/seller/info', [SellerAPIController::class, 'getSellerInfo']);

    Route::get('/seller/products', [SellerAPIController::class, 'getProducts']);
});
