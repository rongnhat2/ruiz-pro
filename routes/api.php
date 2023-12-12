<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
 
Route::post('post-image', 'Admin\DisplayController@image')->name('admin.image.post');
Route::prefix('color')->group(function () {
    Route::get('/get', 'Admin\ColorController@get')->name('admin.color.get');
    Route::post('/store', 'Admin\ColorController@store')->name('admin.color.store');
    Route::get('/get-one/{id}', 'Admin\ColorController@get_one')->name('admin.color.get_one');
    Route::post('/update', 'Admin\ColorController@update')->name('admin.color.update');
    Route::get('/delete/{id}', 'Admin\ColorController@delete')->name('admin.color.delete');
});
Route::prefix('brand')->group(function () {
    Route::get('/get', 'Admin\BrandController@get')->name('admin.brand.get');
    Route::post('/store', 'Admin\BrandController@store')->name('admin.brand.store');
    Route::get('/get-one/{id}', 'Admin\BrandController@get_one')->name('admin.brand.get_one');
    Route::post('/update', 'Admin\BrandController@update')->name('admin.brand.update');
    Route::get('/delete/{id}', 'Admin\BrandController@delete')->name('admin.brand.delete');
});
Route::prefix('category')->group(function () {
    Route::get('/get', 'Admin\CategoryController@get')->name('admin.category.get');
    Route::post('/store', 'Admin\CategoryController@store')->name('admin.category.store');
    Route::get('/get-one/{id}', 'Admin\CategoryController@get_one')->name('admin.category.get_one');
    Route::post('/update', 'Admin\CategoryController@update')->name('admin.category.update');
    Route::get('/delete/{id}', 'Admin\CategoryController@delete')->name('admin.category.delete');
});
Route::prefix('blog')->group(function () {
    Route::get('/get', 'Admin\BlogController@get')->name('admin.brand.get');
    Route::post('/store', 'Admin\BlogController@store')->name('admin.brand.store');
    Route::get('/get-one/{id}', 'Admin\BlogController@get_one')->name('admin.brand.get_one');
    Route::post('/update', 'Admin\BlogController@update')->name('admin.brand.update');
    Route::get('/delete/{id}', 'Admin\BlogController@delete')->name('admin.brand.delete');
}); 
Route::prefix('product')->group(function () {
    Route::get('/get', 'Admin\ProductController@get')->name('admin.product.get');
    Route::post('/store', 'Admin\ProductController@store')->name('admin.product.store');
    Route::get('/get-one/{id}', 'Admin\ProductController@get_one')->name('admin.product.get_one');
    Route::post('/update', 'Admin\ProductController@update')->name('admin.product.update');
    Route::get('/delete/{id}', 'Admin\ProductController@delete')->name('admin.product.delete');
});
Route::prefix('banner')->group(function () {
    Route::get('/get', 'Admin\BannerController@get')->name('admin.banner.get');
    Route::post('/store', 'Admin\BannerController@store')->name('admin.banner.store');
    Route::get('/get-one/{id}', 'Admin\BannerController@get_one')->name('admin.banner.get_one');
    Route::post('/update', 'Admin\BannerController@update')->name('admin.banner.update');
    Route::get('/delete/{id}', 'Admin\BannerController@delete')->name('admin.banner.delete');
}); 


Route::prefix('warehouse')->group(function () {
    Route::get('get-item', 'Admin\WarehouseController@get_item')->name('admin.warehouse.item.get');
    Route::get('get-history', 'Admin\WarehouseController@get_history')->name('admin.warehouse.history.get');
    Route::get('get-order-fullfil', 'Admin\WarehouseController@get_order_fullfil')->name('admin.warehouse.item.get');
    Route::get('get-order-export', 'Admin\WarehouseController@get_order_export')->name('admin.warehouse.item.get');
    Route::get('get-order-shipping', 'Admin\WarehouseController@get_order_shipping')->name('admin.warehouse.item.get');

    Route::post('store', 'Admin\WarehouseController@store')->name('admin.warehouse.store');
    Route::get('/get-ware-one/{id}', 'Admin\WarehouseController@get_ware_one')->name('admin.warehouse.get_ware_one');

    Route::get('/get-one/{id}', 'Admin\ProductController@get_one')->name('admin.warehouse.get_one');
    Route::post('/update', 'Admin\ProductController@update')->name('admin.warehouse.update');
});

Route::prefix('order')->group(function () {
    Route::get('get', 'Admin\OrderController@get')->name('admin.order.get');
    Route::get('get-one', 'Admin\OrderController@get_one')->name('admin.order.get_one');
    Route::post('/update', 'Admin\OrderController@update')->name('admin.order.update');
});


Route::prefix('customer')->group(function () {
    Route::prefix('blog')->group(function () {
        Route::get('get', 'Customer\BlogController@get')->name('customer.blog.get');
    }); 
    Route::prefix('color')->group(function () {
        Route::get('/get', 'Customer\ColorController@get')->name('customer.color.get'); 
    });
    Route::prefix('brand')->group(function () {
        Route::get('/get', 'Customer\BrandController@get')->name('customer.brand.get'); 
    });
    Route::prefix('comment')->group(function () {
        Route::get('get/{id}', 'Customer\CommentController@get')->name('customer.comment.get');
        Route::post('create', 'Customer\CommentController@create')->name('customer.comment.create');
    });

    Route::prefix('product')->group(function () {
        Route::get('/get-all-new', 'Customer\ProductController@get_all_new')->name('admin.product.get');
        Route::get('/get-best-sale', 'Customer\ProductController@get_best_sale')->name('admin.product.get');
        Route::get('/get-one/{id}', 'Customer\ProductController@get_one')->name('admin.product.get');


        Route::get('/get', 'Customer\ProductController@get')->name('admin.product.get');
        Route::post('get-search', 'Customer\ProductController@get_search')->name('customer.product.get.search');
        Route::get('get-related/{id}', 'Customer\ProductController@get_related')->name('customer.product.get.related');

    });
    Route::prefix('auth')->group(function () {
        Route::post('register', 'Customer\AuthController@register')->name('customer.auth.register');
        Route::post('login', 'Customer\AuthController@login')->name('customer.auth.login');
        Route::post('forgot', 'Customer\AuthController@forgot')->name('customer.auth.forgot');
        Route::post('reset', 'Customer\AuthController@reset')->name('customer.auth.reset');
        Route::post('code', 'Customer\AuthController@code')->name('customer.auth.code');
        Route::post('change', 'Customer\AuthController@change')->name('customer.auth.change');
        Route::post('update', 'Customer\AuthController@update')->name('customer.auth.update');
        Route::get('get-profile', 'Customer\AuthController@get_profile')->name('customer.auth.profile');
    }); 
}); 