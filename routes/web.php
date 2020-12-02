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


//Client Routes
Route::get('/','ClientController@index')->name('home_page');
Route::get('/shop','ClientController@shop')->name('shop');
Route::get('/single_product/{slug}','ClientController@singleProduct')->name('singleProduct');
Route::get('/checkout','ClientController@checkout')->name('checkout');
Route::get('/category.product/{catName}','ClientController@catWiseProduct')->name('category.product');

Route::post('search/product','ClientController@searchProductFromHome')->name('search.product');


//Carts Routes
Route::post('addToCart/{id}','CartController@addToCart');
Route::get('/cart','CartController@ViewCart')->name('cart');
Route::get('cart/delete/{id}','CartController@delete');
Route::post('cart/update/{id}','CartController@CartUpdate');
Route::post('applycoupon','CartController@ApplyCoupon');
Route::get('destroy.coupon','CartController@DestroyCoupon');


//Admin Routes
Route::get('admin','backend\AdminController@index')->name('dashboard')->middleware('auth');
Route::get('e-admin','backend\AdminController@login')->name('e-admin');
Route::get('e-registraion','backend\AdminController@registraion')->name('e-registraion');
Route::post('admin.store','backend\AdminController@store');
Route::post('admin.login','backend\AdminController@LoginProcess');
Route::get('admin.logout','backend\AdminController@logout')->middleware('auth')->name('logOut');
Route::get('logout','backend\AdminController@logout_cus')->middleware('auth')->name('logOut_cus');

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

//Order Routes
Route::get('order.index','OrderController@index');
Route::get('checkout.index','OrderController@checkout');
Route::post('order.confirm','OrderController@ConfirmOrder');
Route::get('manageorder.index','OrderController@ManageOrder')->middleware('auth');
Route::get('shiftedOrder/{id}','OrderController@ShiftedOrder')->middleware('auth');
Route::get('trashdOrder/{id}','OrderController@trashdOrder')->middleware('auth');


//Slider Routes
Route::prefix('slider')->group(function () {
    Route::get('index','backend\SliderController@index')->name('slider.index');
    Route::post('store','backend\SliderController@store')->name('slider.store');
    Route::post('update/{id}','backend\SliderController@update')->name('slider.update');
    Route::get('delete/{id}','backend\SliderController@delete')->name('slider.delete');

});
#site identity
Route::prefix('site')->group(function (){
    Route::get('identity','backend\WebsiteController@index')->name('site.identity');
    Route::post('identity','backend\WebsiteController@store')->name('site.identity');
    Route::post('update','backend\WebsiteController@update')->name('site.update');
});
#social links
Route::prefix('social-link')->group(function (){
    Route::get('index','backend\SocialLinksController@index')->name('social.index');
    Route::post('index','backend\SocialLinksController@store')->name('social.store');
    Route::post('update','backend\SocialLinksController@update')->name('social.update');
});

//Customer Routes
Route::get('customer.login','CustomerController@loginPage')->name('cus.log');
Route::get('customer.registration','CustomerController@regPage')->name('cus.reg');
Route::post('customer.store','CustomerController@store')->name('cus.log.store');
Route::post('customer.login','CustomerController@Login')->name('cus.log');
Route::get('customer/home','CustomerController@index')->name('cus/home')->middleware('auth');

//Auth::routes();

Route::get('/', 'ClientController@index')->name('home');


//new Route for order and bill
Route::get('customer/all','CustomerController@allCustomersBackend')->name('back.cus')->middleware('auth');
Route::get('billing-info','OrderController@billingInformationBackend')->name('billing.info')->middleware('auth');
Route::get('billing-order/{id}','OrderController@billingOrderBackend')->name('billing.oder')->middleware('auth');

Route::get('view/admin','backend\AdminController@allAdminsBackend')->name('view.admin')->middleware('auth');
Route::get('view/profile','backend\AdminController@viewProfile')->name('view.profile')->middleware('auth');
Route::get('admin/update','backend\AdminController@updateProfile')->name('admin.update')->middleware('auth');
Route::post('admin/update','backend\AdminController@updateProfileAdmin')->name('admin.update')->middleware('auth');
Route::post('admin/change/password','backend\AdminController@changePassword')->name('admin.change.password')->middleware('auth');
Route::get('admin/delete/{id}','backend\AdminController@deleteAdmin')->name('admin.delete')->middleware('auth');


//payment Method
Route::get('/example1', 'SslCommerzPaymentController@exampleEasyCheckout')->name('ssl');
Route::get('/example2', 'SslCommerzPaymentController@exampleHostedCheckout')->name('host_ssl');

Route::post('/pay', 'SslCommerzPaymentController@index');
Route::post('/pay-via-ajax', 'SslCommerzPaymentController@payViaAjax');


Route::post('/success', 'SslCommerzPaymentController@success');
Route::post('/fail', 'SslCommerzPaymentController@fail');
Route::post('/cancel', 'SslCommerzPaymentController@cancel');

// SSLCOMMERZ Start
//Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
//Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);
//
//Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
//Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);
//
//Route::post('/success', [SslCommerzPaymentController::class, 'success']);
//Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
//Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);
//
//Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

