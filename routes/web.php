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
Route::get('/category/{id}', 'HomeController@category');

Route::get('/admin/view-account', 'AdminController@viewAccount');
Route::get('/admin/account-manager', 'AdminController@accountManager');
Route::get('/admin/add-account', 'AdminController@addAccount');



Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    Route::get('account/{id}', 'AccountController@find');

    Route::get('admin/{id}', 'AdminController@find');

    Route::get('seller/{id}', 'SellerController@find');
});

