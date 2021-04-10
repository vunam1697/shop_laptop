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

Route::group(['namespace' => 'App\Http\Controllers\Admin'], function () {

    Route::get('/admin/index-login', 'LoginController@index')->name('index.index');

    Route::post('/admin/login', ['as' => 'admin.login', 'uses' => 'LoginController@login']);

});
