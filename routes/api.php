<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
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
    Route::resource('users', UserController::class)->only(['index','store','show','update','destroy']);
    Route::resource('categories', CategoryController::class)->only(['index','store','show','update','destroy']);
    Route::resource('products', ProductController::class)->only(['index','store','show','update','destroy']);
    Route::resource('blogs', BlogController::class)->only(['index','store','show','update','destroy']);
    Route::resource('transactions', TransactionController::class)->only(['index','store','show','update','destroy']);

    Route::get('get-all-categories', [CategoryController::class, 'getAllCategories']);
    Route::get('get-all-products', [ProductController::class, 'getAllProducts']);
});