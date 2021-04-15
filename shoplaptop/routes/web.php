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

Route::get('/tim-kiem', 'App\Http\Controllers\HomeController@getSearch')->name('home.search');

Route::get('/tin-tuc', 'App\Http\Controllers\HomeController@getNews')->name('home.news');

Route::get('/tin-tuc/{slug}', 'App\Http\Controllers\HomeController@getNewsDetail')->name('home.news-detail');

Route::get('/san-pham', 'App\Http\Controllers\HomeController@getProduct')->name('home.product');

Route::get('/san-pham/{slug}', 'App\Http\Controllers\HomeController@getProductDetail')->name('home.product-detail');

Route::get('/danh-muc-san-pham/{slug}', 'App\Http\Controllers\HomeController@getProductCategory')->name('home.product-category');

Route::post('them-gio-hang', 'App\Http\Controllers\HomeController@postAddCart')->name('home.post-add-cart');

Route::get('gio-hang', 'App\Http\Controllers\HomeController@getCart')->name('home.cart');

Route::get('cap-nhat-gio-hang', 'App\Http\Controllers\HomeController@updateCart')->name('home.update-cart');

Route::post('dat-hang', 'App\Http\Controllers\HomeController@postCheckOut')->name('home.post-check-out');

Route::group(['namespace' => 'App\Http\Controllers\Admin'], function () {

    //đăng nhập admin
    Route::get('/admin/index-login', 'AuthenController@index')->name('index.index');

    Route::post('/admin/login', ['as' => 'admin.login', 'uses' => 'AuthenController@login']);

    Route::get('/admin/logout', 'AuthenController@logout');

    Route::get('/admin/register', 'AuthenController@registerIndex')->name('register.index');;

    Route::post('/admin/register', ['as' => 'admin.register', 'uses' => 'AuthenController@register']);

    //home
    Route::get('/admin/home', 'HomeController@index')->name('home.index');

    //danh sách sản phẩm
    Route::get('/admin/product', 'ProductController@index')->name('product.index');

    //view thêm và sửa sản phẩm
    Route::get('/admin/save-product', 'ProductController@saveProduct')->name('saveProduct.index');

    //Lưu sản phẩm
    Route::post('/admin/product', ['as' => 'admin.saveProduct', 'uses' => 'ProductController@save']);

    //Lấy sản phẩm cần sửa
    Route::get('/admin/edit-product/{id}', 'ProductController@eidtProduct')->name('editProduct.index');

    //Xóa sản phẩm
    Route::post('/admin/deleteProduct', ['as' => 'admin.product.delete', 'uses' => 'ProductController@delete']);

    //danh sách người dùng
    Route::get('/admin/user', 'UserController@index')->name('user.index');

    //view thêm và sửa sản phẩm
    Route::get('/admin/save-user', 'UserController@saveUser')->name('saveUser.index');

    //Lưu sản phẩm
    Route::post('/admin/user', ['as' => 'admin.saveUser', 'uses' => 'UserController@save']);

    //Lấy người dùng cần sửa
    Route::get('/admin/edit-user/{id}', 'UserController@eidtUser')->name('editUser.index');

    //Xóa người dùng
    Route::post('/admin/deleteUser', ['as' => 'admin.user.delete', 'uses' => 'UserController@delete']);

    //danh sách đơn hàng

    Route::get('/admin/order', 'OrderController@index')->name('order.index');

     //view thêm và sửa đơn hàng
     Route::get('/admin/save-order', 'OrderController@saveOrder')->name('saveOrder.index');

     //Lưu đơn hàng
     Route::post('/admin/order', ['as' => 'admin.saveOrder', 'uses' => 'OrderController@save']);

     //Thêm sản phẩm vào session
     Route::get('/admin/add-product-to-card/{id}/{type}/{iddonhang}',"OrderController@addProductToCard")->name('addProductToCard.index');

     //Xóa sản phẩm khỏi session
     Route::get('/admin/delete-product-from-card/{id}/{iddonhang}',"OrderController@deleteProductOnCart")->name('admin.order.deleteProductOnCart');

    //  Route::post('/admin/add-product-to-card',['as' => 'admin.addProductToCard', 'uses' => 'OrderController@addProductToCard']);
    //Lưu tạm thông tin khách hàng vào session
    Route::post('/admin/add-customer-to-session', ['as' => 'admin.addCustomerToSession', 'uses' => 'OrderController@addSessionCustomer']);

    //Xóa đơn hàng
    Route::post('/admin/deleteOrder', ['as' => 'admin.order.delete', 'uses' => 'OrderController@delete']);

    //Lấy đơn hàng cần sửa
    Route::get('/admin/edit-order/{id}', 'OrderController@editOrder')->name('admin.editOrder');

    //Xem chi tiết đơn hàng
    Route::get('/admin/detail-order/{id}', 'OrderController@detailOrder')->name('admin.viewDetail');

    //danh sách tin tức
    Route::get('/admin/news', 'NewsController@index')->name('news.index');

    //view thêm và sửa tin tức
    Route::get('/admin/save-news', 'NewsController@saveNews')->name('saveNews.index');

    //Lưu tin tức
    Route::post('/admin/news', ['as' => 'admin.saveNews', 'uses' => 'NewsController@save']);

    //Lấy tin tức cần sửa
    Route::get('/admin/edit-news/{id}', 'NewsController@eidtNews')->name('eidtNews.index');

    //Xóa tin tức
    Route::post('/admin/deleteNews', ['as' => 'admin.news.delete', 'uses' => 'NewsController@delete']);
});
