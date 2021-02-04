<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('user-profile', [AuthController::class, 'userProfile']);
});



Route::get('all', [ProductController::class, 'allProdutos'])->middleware('auth.role:1,2');
Route::get('allProdutos', ProductController::class, 'allProdutos')->middleware('auth.role:1,2');
Route::get('allProdutos', ExampleController::class, 'allProdutos')->middleware('auth.role:1,2');