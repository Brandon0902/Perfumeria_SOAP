<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShippersController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [UserAuthController::class, 'singup']);
Route::post('/login', [UserAuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('suppliers', SuppliersController::class);
    Route::apiResource('shippers', ShippersController::class);
    Route::apiResource('categories', CategoriesController::class);
    Route::apiResource('products', ProductController::class);
});



