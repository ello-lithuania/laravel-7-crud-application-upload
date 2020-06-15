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
    return view('main');
});

Route::get('products', 'ProductController@index')->name('product.index');
Route::get('create', 'ProductController@create')->name('product.create');

Route::post('store', 'ProductController@store')->name('product.store');

Route::get('edit/product/{id}', 'ProductController@edit');
Route::post('update/product/{id}', 'ProductController@update');
Route::get('delete/product/{id}', 'ProductController@delete');

Route::get('show/product/{id}', 'ProductController@show');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
