<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TransactionController;

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



Route::prefix('auth')->group(function(){
    Route::post('login',[AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('profile', [AuthController::class, 'profile']);
        Route::post('logout', [AuthController::class, 'logout']);
    });
});

Route::group(['middleware' => 'auth:api'], function(){
    Route::apiResource('users', UserController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('blogs', BlogController::class);
    Route::apiResource('transactions', TransactionController::class);
    Route::apiResource('roles', RoleController::class);

    Route::get('get-all-categories', [CategoryController::class, 'getAllCategories']);
    Route::get('get-all-products', [ProductController::class, 'getAllProducts']);
    Route::get('get-all-transactions', [TransactionController::class, 'getAllTransactions']);
    Route::get('get-total-price', [TransactionController::class, 'getTotalPrice']);
    Route::get('get-total-price-last-year', [TransactionController::class, 'getTotalPriceLastYear']);
});