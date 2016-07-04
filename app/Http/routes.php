<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/howitworks', function () {
    return view('extra.howitworks');
});
Route::get('/termsandconditions', function () {
    return view('extra.termsandconditions');
});
Route::get('/aboutus', function () {
    return view('extra.aboutus');
});

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/user','UserController@index');

Route::post('/user','UserController@update');

Route::get('/products','ProductController@index');

Route::get('/products/categories/{category}','ProductController@index');


Route::get('/orderlists','OrderlistController@index');

Route::get('/orderlists/products/{product}', 'OrderlistController@makeorder');

Route::post('/orderlists/add/products/{product}','OrderlistController@addToList');

Route::get('/orderlists/details/{orderlist}','OrderlistController@details');

Route::get('/orderlists/{orderlist}/edit/products/{orderlistProduct}','OrderlistController@editOrderlistProduct');

Route::post('/orderlists/{orderlist}/edit/products/{orderlistProduct}','OrderlistController@updateOrderlistProduct');

Route::get('/orderlists/{orderlist}/delete/confirm/products/{orderlistProduct}','OrderlistController@deleteOrderlistProductConfirmation');

Route::post('/orderlists/{orderlist}/delete/products/{orderlistProduct}','OrderlistController@deleteOrderlistProduct');


Route::get('/orderlists/add','OrderlistController@add');

Route::post('/orderlists/add','OrderlistController@create');

Route::get('/orderlists/delete/{orderlist}','OrderlistController@delete');

Route::get('/orderlists/delete/confirm/{orderlist}','OrderlistController@deleteorderlistconfirmation');

Route::get('/orderlists/edit/{orderlist}','OrderlistController@edit');

Route::post('/orderlists/edit/{orderlist}','OrderlistController@update');


Route::get('/deliveries','DeliveryController@index');

Route::get('/deliveries/details/{orderlist}','DeliveryController@details');


Route::get('/homes','HomesController@index');

Route::get('/homes/add','HomesController@add');

Route::post('/homes/add','HomesController@create');

Route::get('/homes/edit/{home}','HomesController@edit');

Route::post('/homes/edit/{home}','HomesController@update');

Route::get('/homes/delete/{home}','HomesController@delete');

Route::get('/homes/delete/confirm/{home}','HomesController@deletehomeconfirmation');


Route::get('/deliveryaddresses','DeliveryAddressController@index');

Route::get('/deliveryaddresses/add','DeliveryAddressController@add');

Route::post('/deliveryaddresses/add','DeliveryAddressController@create');

Route::get('/deliveryaddresses/edit/{deliveryaddress}','DeliveryAddressController@edit');

Route::post('/deliveryaddresses/edit/{deliveryaddress}','DeliveryAddressController@update');

Route::get('/deliveryaddresses/delete/confirm/{deliveryaddress}','DeliveryAddressController@deletedeliveryaddressconfirm');

Route::get('/deliveryaddresses/delete/{deliveryaddress}','DeliveryAddressController@delete');






Route::get('/admin/categories','AdminCategoryController@index');

Route::get('/admin/categories/add','AdminCategoryController@add');

Route::post('/admin/categories/add','AdminCategoryController@create');

Route::get('/admin/categories/edit/{category}','AdminCategoryController@edit');

Route::post('/admin/categories/edit/{category}','AdminCategoryController@update');

Route::get('/admin/categories/delete/{category}','AdminCategoryController@delete');

Route::get('/admin/categories/delete/confirm/{category}','AdminCategoryController@deleteconfirm');


Route::get('/admin/deliveryaddresses','AdminDeliveryAddressController@index');

Route::get('/admin/deliveryaddresses/add','AdminDeliveryAddressController@add');

Route::post('/admin/deliveryaddresses/add','AdminDeliveryAddressController@create');

Route::get('/admin/deliveryaddresses/edit/{deliveryaddress}','AdminDeliveryAddressController@edit');

Route::post('/admin/deliveryaddresses/edit/{deliveryaddress}','AdminDeliveryAddressController@update');

Route::get('/admin/deliveryaddresses/delete/{deliveryaddress}','AdminDeliveryAddressController@delete');

Route::get('/admin/deliveryaddresses/delete/confirm/{deliveryaddress}','AdminDeliveryAddressController@deleteconfirm');


Route::get('/admin/homes','AdminHomesController@index');

Route::get('/admin/homes/add','AdminHomesController@add');

Route::post('/admin/homes/add','AdminHomesController@create');

Route::get('/admin/homes/edit/{home}','AdminHomesController@edit');

Route::post('/admin/homes/edit/{home}','AdminHomesController@update');

Route::get('/admin/homes/delete/{home}','AdminHomesController@delete');

Route::get('/admin/homes/delete/confirm/{home}','AdminHomesController@deleteconfirm');


Route::get('/admin/orders','AdminOrderController@index');

Route::get('/admin/orders/add','AdminOrderController@add');

Route::post('/admin/orders/add','AdminOrderController@create');

Route::get('/admin/orders/edit/{order}','AdminOrderController@edit');

Route::post('/admin/orders/edit/{order}','AdminOrderController@update');

Route::get('/admin/orders/delete/{order}','AdminOrderController@delete');

Route::get('/admin/orders/delete/confirm/{order}','AdminOrderController@deleteconfirm');


Route::get('/admin/orderlists','AdminOrderlistController@index');

Route::get('/admin/orderlists/add','AdminOrderlistController@add');

Route::post('/admin/orderlists/add','AdminOrderlistController@create');

Route::get('/admin/orderlists/edit/{orderlist}','AdminOrderlistController@edit');

Route::post('/admin/orderlists/edit/{orderlist}','AdminOrderlistController@update');

Route::get('/admin/orderlists/delete/{orderlist}','AdminOrderlistController@delete');

Route::get('/admin/orderlists/delete/confirm/{orderlist}','AdminOrderlistController@deleteconfirm');


Route::get('/admin/orderlistproducts','AdminOrderlistProductController@index');

Route::get('/admin/orderlistproducts/add','AdminOrderlistProductController@add');

Route::post('/admin/orderlistproducts/add','AdminOrderlistProductController@create');

Route::get('/admin/orderlistproducts/edit/{orderlistproduct}','AdminOrderlistProductController@edit');

Route::post('/admin/orderlistproducts/edit/{orderlistproduct}','AdminOrderlistProductController@update');

Route::get('/admin/orderlistproducts/delete/{orderlistproduct}','AdminOrderlistProductController@delete');

Route::get('/admin/orderlistproducts/delete/confirm/{orderlistproduct}','AdminOrderlistProductController@deleteconfirm');


Route::get('/admin/orderproducts','AdminOrderProductController@index');

Route::get('/admin/orderproducts/add','AdminOrderProductController@add');

Route::post('/admin/orderproducts/add','AdminOrderProductController@create');

Route::get('/admin/orderproducts/edit/{orderproduct}','AdminOrderProductController@edit');

Route::post('/admin/orderproducts/edit/{orderproduct}','AdminOrderProductController@update');

Route::get('/admin/orderproducts/delete/{orderproduct}','AdminOrderProductController@delete');

Route::get('/admin/orderproducts/delete/confirm/{orderproduct}','AdminOrderProductController@deleteconfirm');


Route::get('/admin/products','AdminProductController@index');

Route::get('/admin/products/add','AdminProductController@add');

Route::post('/admin/products/add','AdminProductController@create');

Route::get('/admin/products/edit/{product}','AdminProductController@edit');

Route::post('/admin/products/edit/{product}','AdminProductController@update');

Route::get('/admin/products/delete/{product}','AdminProductController@delete');

Route::get('/admin/products/delete/confirm/{product}','AdminProductController@deleteconfirm');


Route::get('/admin/roles','AdminRoleController@index');

Route::get('/admin/roles/add','AdminRoleController@add');

Route::post('/admin/roles/add','AdminRoleController@create');

Route::get('/admin/roles/edit/{role}','AdminRoleController@edit');

Route::post('/admin/roles/edit/{role}','AdminRoleController@update');

Route::get('/admin/roles/delete/{role}','AdminRoleController@delete');

Route::get('/admin/roles/delete/confirm/{role}','AdminRoleController@deleteconfirm');


Route::get('/admin/userroles','AdminUserRoleController@index');

Route::get('/admin/userroles/add','AdminUserRoleController@add');

Route::post('/admin/userroles/add','AdminUserRoleController@create');

Route::get('/admin/userroles/edit/{userrole}','AdminUserRoleController@edit');

Route::post('/admin/userroles/edit/{userrole}','AdminUserRoleController@update');

Route::get('/admin/userroles/delete/{userrole}','AdminUserRoleController@delete');

Route::get('/admin/userroles/delete/confirm/{userrole}','AdminUserRoleController@deleteconfirm');
