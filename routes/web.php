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

//Coupons Routes
Route::get('coupons.index','backend\CouponController@index');
Route::post('coupons','backend\CouponController@store')->name('coupons.store');
Route::post('coupons.update/{id}','backend\CouponController@update');
Route::get('coupons.delete/{id}','backend\CouponController@destroy');
Route::get('couponstatusActive/{id}','backend\CouponController@statusActive');
Route::get('couponstatusInActive/{id}','backend\CouponController@statusInActive');

//Carts Routes
Route::post('addToCart/{id}','CartController@addToCart');
Route::get('/cart','CartController@ViewCart')->name('cart');
Route::get('cart/delete/{id}','CartController@delete');
Route::post('cart/update/{id}','CartController@CartUpdate');
