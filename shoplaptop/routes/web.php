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

Route::get('/', 'App\Http\Controllers\HomeController@getHome')->name('home.index');

Route::get('/san-pham', 'App\Http\Controllers\HomeController@getProduct')->name('home.product');

Route::get('/san-pham/{slug}', 'App\Http\Controllers\HomeController@getProductDetail')->name('home.product-detail');

Route::group(['namespace' => 'App\Http\Controllers\Admin'], function () {

    //đăng nhập admin
    Route::get('/admin/index-login', 'AuthenController@index')->name('index.index');

    Route::post('/admin/login', ['as' => 'admin.login', 'uses' => 'AuthenController@login']);

    Route::get('/admin/logout', 'AuthenController@logout');

    Route::get('/admin/register', 'AuthenController@registerIndex')->name('register.index');;

    Route::post('/admin/register', ['as' => 'admin.register', 'uses' => 'AuthenController@register']);

    //home
    Route::get('/admin/home', 'HomeController@index')->name('home.index');

});
