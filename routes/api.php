<?php

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

Route::apiResource('product', 'App\Http\Controllers\Api\ApiProductController');
Route::apiResource('category', 'App\Http\Controllers\Api\ApiCategoryController');
Route::apiResource('order', 'App\Http\Controllers\Api\ApiOrderController');

