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



Route::get('/', 'Customer\DisplayController@index')->name('customer.view.index');
Route::get('product/{slug}', 'Customer\DisplayController@product')->name('customer.view.product'); 
Route::get('category', 'Customer\DisplayController@category')->name('customer.view.category'); 
Route::get('about', 'Customer\DisplayController@about')->name('customer.view.about'); 
Route::get('cart', 'Customer\DisplayController@cart')->name('customer.view.cart'); 
Route::get('checkout', 'Customer\DisplayController@checkout')->name('customer.view.checkout'); 
Route::get('blog', 'Customer\DisplayController@blog')->name('customer.view.blog'); 
Route::get('blog-detail/{slug}', 'Customer\DisplayController@blog_detail')->name('customer.view.blog_detail'); 
Route::get('contact-us', 'Customer\DisplayController@contact')->name('customer.view.contact'); 
Route::get('order-success', 'Customer\DisplayController@order_success')->name('customer.view.success'); 



Route::middleware(['AuthAdmin:auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/login', 'Admin\DisplayController@login')->name('admin.login');
        Route::post('/login', 'Admin\AuthController@login')->name('admin.login');
    });
});

Route::middleware(['AuthAdmin:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::post('logout', 'Admin\AuthController@logout')->name('admin.logout');  
        Route::get('/', 'Admin\DisplayController@statistic')->name('admin.statistic.index');

        Route::prefix('color')->group(function () {
            Route::get('/', 'Admin\ColorController@index')->name('admin.color.index');
        });
        Route::prefix('brand')->group(function () {
            Route::get('/', 'Admin\BrandController@index')->name('admin.brand.index');
        });
        Route::prefix('category')->group(function () {
            Route::get('/', 'Admin\CategoryController@index')->name('admin.category.index');
        });
        Route::prefix('blog')->group(function () {
            Route::get('/', 'Admin\BlogController@index')->name('admin.blog.index');
        });
        Route::prefix('product')->group(function () {
            Route::get('/', 'Admin\ProductController@index')->name('admin.product.index'); 
        });
        Route::prefix('banner')->group(function () {
            Route::get('/', 'Admin\BannerController@index')->name('admin.banner.index'); 
        });
        Route::prefix('discount')->group(function () {
            Route::get('/', 'Admin\DiscountController@index')->name('admin.discount.index'); 
        });
        Route::prefix('warehouse')->group(function () {
            Route::get('/', 'Admin\WarehouseController@index')->name('admin.warehouse.index');
        });
        Route::prefix('order')->group(function () {
            Route::get('/', 'Admin\OrderController@index')->name('admin.order.index');
        });
    });
});
