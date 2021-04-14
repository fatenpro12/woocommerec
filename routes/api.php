<?php

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
Route::group([ 'namespace' => 'App\Http\Controllers\Api'], function () {
    Route::get('getCitiesApi', 'ProductController@getCitiesApi')->name('getCitiesApi');
    Route::get('getCategoriesApi', 'ProductController@getCategoriesApi')->name('getCategoriesApi');
    Route::get('getAllAddress', 'ProductController@getAllAddress')->name('getAllAddress');
//user
    Route::post('/register', 'AuthController@register');
    Route::post('/login', 'AuthController@login');
    Route::post('/update', 'AuthController@update');
    Route::get('/user', 'AuthController@user');
    Route::post('/logout', 'AuthController@logout');

    Route::apiResource('/products','ProductController');
});
