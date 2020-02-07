<?php

use Illuminate\Http\Request;

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

Route::get('items', 'ItemController@index');

/**
 * Routes for carts actions 
 * */ 
Route::get('cart', 'CartController@index');
Route::post('add-to-cart/{id}', 'CartController@store');
Route::delete('remove-from-cart/{id}', 'CartController@destroy');
Route::delete('clear-cart', 'CartController@clear_cart');