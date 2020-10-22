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

Route::get('madmin', function () {
    return view('layouts.backmaster');
});

//Client Routes
Route::get('/','ClientController@index')->name('home');
Route::get('/shop','ClientController@shop')->name('shop');
Route::get('/single_product/{slug}','ClientController@singleProduct')->name('singleProduct');
Route::get('/cart','ClientController@cart')->name('cart');
Route::get('/checkout','ClientController@checkout')->name('checkout');
Route::get('/category.product/{catName}','ClientController@catWiseProduct')->name('category.product');


//Admin Routes
Route::get('admin','backend\AdminController@index')->name('dashboard');

//Category Routes
Route::get('categories','backend\CategoryController@index')->name('categories.index');
Route::post('categories','backend\CategoryController@store')->name('categories.store');
Route::post('categories.update/{id}','backend\CategoryController@update');
Route::get('categories.delete/{id}','backend\CategoryController@destroy');

//Brand Routes
Route::get('brands','backend\BrandController@index')->name('brands.index');
Route::post('brands','backend\BrandController@store')->name('brands.store');
Route::post('brands.update/{id}','backend\BrandController@update');
Route::get('brands.delete/{id}','backend\BrandController@destroy');

//Prodct Routes
Route::resource('products', 'backend\ProductController');
Route::get('statusActive/{id}','backend\ProductController@statusActive');
Route::get('statusInActive/{id}','backend\ProductController@statusInActive');
Route::get('products.delete/{id}','backend\ProductController@destroy');
Route::get('products.edit/{id}','backend\ProductController@edit');
Route::post('products.update/{id}','backend\ProductController@update');