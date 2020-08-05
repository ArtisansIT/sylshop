<?php

use App\Facades\Cart;
use Illuminate\Support\Facades\Auth;
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






Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'layout' => 'admin.layouts.app', 'section' => 'mainContent', 'middleware' => ['auth', 'admin']], function () {

    Route::group(['namespace' => 'Admin',], function () {

        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        Route::resource('category', 'categoryController');
        Route::resource('shop', 'shopController');

        Route::post('product_image/{product}', 'Product\prosuctController@store')->name('product.store');
        Route::post('image/{subcategory}', 'Subcategory\subcategoryController@imageUpload')->name('subcategory.image');
        Route::put('image/{subcategory}', 'Subcategory\subcategoryController@imageUpdate')->name('subcategory.imageUpdate');
        Route::group(['prefix' => 'shop', 'as' => 'shop.'], function () {

            Route::get('/pending', 'shopController@all_pending_shop')->name('pending');
            Route::get('/inactive', 'shopController@all_inactive_shop')->name('inactive');
            Route::put('/update_image/{image_select_id}', 'shopController@update_image')->name('update_image');
        });
    });
    Route::livewire('category_create', 'admin.category.create')->name('category_create');
    Route::livewire('category_index', 'category-index')->name('category_index');
    Route::livewire('subcategory_create', 'admin.subcategory.create')->name('subcategory_create');
    Route::livewire('product', 'admin.product.create')->name('product');
    Route::livewire('shop', 'shop.create')->name('shop');
    Route::livewire('coupane', 'admin.coupane.create')->name('coupane');
    Route::livewire('pickup', 'admin.pickup.create')->name('pickup');
    Route::livewire('payment', 'admin.payment.create')->name('payment');
    Route::livewire('payment', 'admin.payment.create')->name('payment');
    Route::livewire('citems', 'admin.citems.create')->name('citems');
    Route::livewire('coupane-with-user', 'admin.userwithcoupane.users')->name('coupane_with_user');
    Route::livewire('all-order', 'admin.order.all-order')->name('all_order');
    Route::livewire('order_section', 'admin.ordersection.index')->name('order_section');
    Route::livewire('order-processing', 'admin.order-procesing.shop-list')->name('order_processing');
    Route::livewire('order-delevered', 'admin.order-delever.shop-list')->name('order_delevered');
    Route::livewire('requested-product', 'admin.productrequest.requested-product')->name('requested_product');


    Route::get('single-order-details-print/{id}', 'Admin\Product\prosuctController@printDocument')
        ->name('single_order_item_print');
    Route::get('shop-processing-money-print/{id}', 'Admin\Product\prosuctController@shop_processing_invoice')
        ->name('shop_processing_invoice');
    Route::get('shop-delevered-money-print/{id}', 'Admin\Product\prosuctController@shop_delevered_invoice')
        ->name('shop_delevered_invoice');
});



//Frontend

Route::group(['layout' => 'admin.layouts.app', 'as' => 'user.', 'section' => 'mainContent', 'middleware' => ['auth', 'user']], function () {



    Route::livewire('/user/dashboard', 'user.dashboard.home')->name('dashboard');
    Route::livewire('/all-orders', 'user.dashboard.order.all-orders')->name('all_orders');
    Route::livewire('/order-processing', 'user.dashboard.ordersection.order-processing')->name('order_processing');
});
Route::group(['layout' => 'admin.layouts.app', 'as' => 'shop.', 'section' => 'mainContent', 'middleware' => ['auth', 'shop']], function () {



    Route::livewire('/shop/dashboard', 'shopsection.pages.dashboard')->name('dashboard');
    Route::livewire('/shop/all-product', 'shopsection.product.all-product')->name('all_product');
    // Route::livewire('/shop/all-product', 'shopsection.product.all-product')->name('all_product');
    Route::livewire('/shop/subcategory', 'shopsection.subcategory.create')->name('subcategory');
    Route::livewire('/shop/product-section', 'shopsection.product.create')->name('product_section');
    Route::livewire('/shop-order-processing', 'shopsection.orderprocessing.processing-all')->name('shop_order_processing');
    Route::livewire('/My-account', 'shopsection.myaccount.index')->name('Myaccount_index');
    Route::livewire('/My-coupanes', 'shopsection.coupane.create')->name('My_coupanes_create');
    Route::livewire('/update-images', 'shopsection.imagesection.index')->name('update_banner_image');
});



Route::layout('layouts.app')->as('front.')->group(function () {

    Route::livewire('/', 'front.pages.index')->name('home');
    Route::livewire('/category/{category}-{slug}', 'front.pages.single-category')->name('category');
    Route::livewire('/product/{product}-{slug}', 'front.pages.single-product')->name('product');
    Route::group(['middleware' => ['auth', 'user']], function () {

        Route::livewire('/cart', 'front.pages.cart')->name('cart');
    });
    Route::livewire('/shop', 'front.pages.shop-list')->name('shop');
    Route::livewire('/shop/{shop}-{slug}', 'front.pages.single-shop')->name('single.shop');
    Route::livewire('/subcategory', 'front.pages.subcategory-list')->name('subcategory');
    Route::livewire('/subcategory/{subcategory}-{slug}', 'front.pages.single-subcategory')->name('single.subcategory');
});

Route::livewire('/user-login', 'front.pages.auth.login')->name('customer.login');
