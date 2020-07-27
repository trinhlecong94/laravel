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

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');
Route::get('/product/{id}', 'HomeController@product');
Route::get('/search', 'HomeController@productSearch');
Route::get('/cart', 'HomeController@cart');
Route::get('/checkout-status', 'HomeController@checkoutStatus');
Route::get('/checkout', 'HomeController@checkout');
Route::get('/order-detail/{id}', 'HomeController@orderDetail');
Route::get('/category/{id}', 'HomeController@category');
Route::get('/order/cancel/{id}', 'HomeController@cancelOrder');
Route::post('/checkout-process', 'HomeController@checkoutProcess');
Route::post('/comment', 'HomeController@comment');

Route::get('/order/{id}/{size_id}', 'OrderController@index');
Route::get('/order/delete/{id}/{size_id}', 'OrderController@deleteProductInCart');
Route::get('/order/update/{id}/{size_id}/{quantity}', 'OrderController@updateProductInCart');
Route::get('/order/clear', 'OrderController@clearProductInCart');

Route::group(['middleware' => ['security:ROLE_ADMIN']], function () {
    Route::get('/admin/view-account/{id}', 'Admin\AdminController@viewAccount');
    Route::get('/admin/account-manager', 'Admin\AdminController@accountManager');
    Route::get('/admin/add-account', 'Admin\AdminController@addAccount');
    Route::post('/admin/update-account', 'Admin\AdminController@updateAccount');
});

Route::group(['middleware' => ['security:ROLE_USER']], function () {
    Route::post('/account/update', 'Account\AccountController@updateAccount');
    Route::get('/account/change-password', 'Account\AccountController@changePassword');
    Route::post('/account/update-password', 'Account\AccountController@updatePassword');
    Route::get('/account/profile', 'Account\AccountController@profile');
    Route::get('/account/my-order', 'Account\AccountController@myOrder');
    Route::get('/account/order/cancel/{id}', 'Account\AccountController@cancelOrder');
});

Route::group(['middleware' => ['security:ROLE_SELLER']], function () {
    Route::get('/seller/product-manager', 'Seller\ProductController@index');
    Route::get('/seller/add-product', 'Seller\ProductController@add');
    Route::post('/seller/add-product', 'Seller\ProductController@store');
    Route::get('/seller/edit-product/{id}', 'Seller\ProductController@show');
    Route::post('/seller/edit-product/{id}', 'Seller\ProductController@edit');
    Route::get('/seller/images/delete/{id}', 'Seller\OrderController@deleteImages');
    
    Route::get('/seller/add-promo', 'Seller\PromotionController@add');
    Route::post('/seller/add-promo', 'Seller\PromotionController@store');
    Route::get('/seller/edit-promo/{id}', 'Seller\PromotionController@show');
    Route::get('/seller/promo-manager', 'Seller\PromotionController@index');
    
    Route::get('/seller/order-manager', 'Seller\OrderController@index');
    Route::post('/seller/order-manager', 'Seller\OrderController@update');

    Route::get('downloadOrderExcel', 'ExportController@export')->name('downloadOrderExcel');
});

Auth::routes();
