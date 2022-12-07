<?php

use Illuminate\Support\Facades\Auth;
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
Auth::routes();
Route::get('/','App\Http\Controllers\MainController@index');
Route::get('login-customer','App\Http\Controllers\CustomerController@getlogin');
Route::post('login-customer','App\Http\Controllers\CustomerController@login');
Route::get('register-customer','App\Http\Controllers\CustomerController@getRegister');
Route::post('register-customer','App\Http\Controllers\CustomerController@postRegister');
Route::get('getlogout','App\Http\Controllers\CustomerController@getlogout');

Route::get('/cart','App\Http\Controllers\CartController@cart');
Route::get('/add-Cart/{id}','App\Http\Controllers\CartController@addToCart');
Route::get('/remove-Cart/{id}','App\Http\Controllers\CartController@removeCart')->name('remove-Cart');
Route::patch('/update-cart','App\Http\Controllers\CartController@updateQuantity');
Route::get('/getDistrict','App\Http\Controllers\AjaxController@getDistrict');
Route::get('/getWard','App\Http\Controllers\AjaxController@getWard');
Route::resource('/checkout', 'App\Http\Controllers\BookingController');

Route::get('/info-customer', 'App\Http\Controllers\CustomerController@index');
Route::get('/orders-customer', 'App\Http\Controllers\CustomerController@orders');
Route::get('/change-password', 'App\Http\Controllers\ChangePasswordController@index');
Route::post('/change-password', 'App\Http\Controllers\ChangePasswordController@store');
Route::get('/edit-info/{$id}', 'App\Http\Controllers\CustomerController@edit');

Route::group(['prefix' => 'admin', 'middleware'=>'auth'], function() {
    Route::get('/','App\Http\Controllers\HomeController@index');
    Route::resource('categories', 'App\Http\Controllers\Admin\CategoryController');
    Route::resource('products', 'App\Http\Controllers\Admin\ProductController');
    Route::resource('approves', 'App\Http\Controllers\Admin\ApproveController');
    Route::resource('orders', 'App\Http\Controllers\Admin\OrderController');
    Route::resource('users', 'App\Http\Controllers\Admin\UsersController');
    Route::resource('roles', 'App\Http\Controllers\Admin\RolesController');
    Route::get('/orders/ajax/getModalStatus/{id}','App\Http\Controllers\AjaxController@getModalStatus');
    Route::put('/orders/ajax/updateModalStatus','App\Http\Controllers\AjaxController@updateModalStatus');
});
