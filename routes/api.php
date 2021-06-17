<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
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

// Route::resource('products', ProductController::class);

// public routes 
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/products/search/{name}', [ProductController::class, 'search']);
Route::POST('/register', [UserController::class, 'register']);
Route::POST('/login', [UserController::class, 'login']);

// Protected routes 
Route::group(['middleware' => ['auth:sanctum']],function () {
    Route::POST('/products', [ProductController::class, 'store']);
    Route::PUT('/products/{id}', [ProductController::class, 'update']);
    Route::DELETE('/products/{id}', [ProductController::class, 'destroy']);
    Route::GET('/logout', [UserController::class, 'logout']);
});
