<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin','middleware'=>'admin'], function () {
    Route::get('category/create', 'CategoryController@create')->name('category.create');
    Route::get('category/edit/{category}', 'CategoryController@edit')->name('category.edit');
    Route::post('category/store', 'CategoryController@store')->name('category.store');
    Route::put('category/update/{category}', 'CategoryController@update')->name('category.update');
    Route::get('categories', 'CategoryController@index')->name('categories');
    Route::get('category/delete/{category}', 'CategoryController@destroy')->name('category.destroy');
});
