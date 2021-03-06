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

Route::get('cache',function()
{
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('config:cache');
    //$exitCode = Artisan::call('optimize:clear');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin','middleware'=>'admin'], function () {
    Route::get('category/create', 'CategoryController@create')->name('category.create');
    Route::get('category/edit/{category}', 'CategoryController@edit')->name('category.edit');
    Route::post('category/store', 'CategoryController@store')->name('category.store');
    Route::put('category/update/{category}', 'CategoryController@update')->name('category.update');
    Route::get('categories', 'CategoryController@index')->name('categories');
    Route::get('category/delete/{category}', 'CategoryController@destroy')->name('category.destroy');

    Route::get('country/create', 'CountryController@create')->name('country.create');
    Route::get('country/edit/{category}', 'CountryController@edit')->name('country.edit');
    Route::post('country/store', 'CountryController@store')->name('country.store');
    Route::put('country/update/{category}', 'CountryController@update')->name('country.update');
    Route::get('countries', 'CountryController@index')->name('countries');
    Route::get('country/delete/{category}', 'CountryController@destroy')->name('country.destroy');
    ///products
    Route::get('product/create/{category_id}', 'ProductController@create')->name('product.create');
    Route::get('product/edit/{product}', 'ProductController@edit')->name('product.edit');
    Route::post('product/store', 'ProductController@store')->name('product.store');
    Route::put('product/update', 'ProductController@update')->name('product.update');
    Route::get('products/{category_id}', 'ProductController@index')->name('products');
    Route::get('product/delete/{category}', 'ProductController@destroy')->name('product.destroy');

    Route::post('/products/upload_image/{id}', 'ProductController@uploadMainImage')->name('products.upload');
    Route::post('/products/upload_others/{id}', 'ProductController@uploadOtherImage')->name('products.upload_others');

    Route::get('shippment/create', 'ShippController@create')->name('shippment.create');
    Route::get('shippment/edit/{shippment}', 'ShippController@edit')->name('shippment.edit');
    Route::post('shippment/store', 'ShippController@store')->name('shippment.store');
    Route::put('shippment/update/{shippment}', 'ShippController@update')->name('shippment.update');
    Route::get('shippments', 'ShippController@index')->name('shippments');
    Route::get('shippment/delete/{shippment}', 'ShippController@destroy')->name('shippment.destroy');

    Route::get('address/create', 'AddressController@create')->name('address.create');
    Route::get('address/edit/{address}', 'AddressController@edit')->name('address.edit');
    Route::post('address/store', 'AddressController@store')->name('address.store');
    Route::post('address/update/{address}', 'AddressController@update')->name('address.update');
    Route::get('addresses', 'AddressController@index')->name('addresses');
    Route::get('address/delete/{address}', 'AddressController@destroy')->name('address.destroy');


});
Route::get('orders', 'App\Http\Controllers\OrderController@index')->name('orders');
Route::get('reported_orders', 'App\Http\Controllers\OrderController@reported_orders')->name('reported_orders');
