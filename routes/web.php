<?php

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

Route::get('/', 'HomeController@index')->name('home');
// Product routes
// Routus su kintamaisiais deti i apacia
Route::get('/product/create', 'ProductController@create')->name('products.create')->middleware('auth');
Route::post('/products', 'ProductController@store')->name('products.store')->middleware('auth');
Route::get('/products/{id}', 'ProductController@show')->name('products.show');
Route::get('/products/{id}/edit', 'ProductController@edit')->name('products.edit')->middleware('auth');
Route::put('/products/{id}', 'ProductController@update')->name('products.update')->middleware('auth');
Route::delete('/products/{id}', 'ProductController@destroy')->name('products.destroy')->middleware('auth');

// sukuria 7 routus, kuriuos galime panaudoti kuriant CRUD'a
Route::resource('categories', 'CategoryController');

// sukuria 7 routus, kuriuos galime panaudoti kuriant CRUD'a
Route::resource('manufacturers', 'ManufacturerController');

// Route::get('about/', function() {
//     echo "about, woop woop :";
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
