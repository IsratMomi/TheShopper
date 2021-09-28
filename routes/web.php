<?php

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

//use Illuminate\Routing\Route;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact','ContactController@show')->name('contact');

Route::get('products', 'ProductController@index')->name('products');


Route::post('restock', 'ProductController@storeRequest')->name('requestRestock');


Route::post('add-to-cart','cartController@addtocart');
Route::get('/load-cart-data','cartController@cartloadbyajax');
Route::get('/carts','cartController@ShowCart')->name('cart');
Route::post('/update-to-cart','cartController@updateToCart');
Route::delete('/delete-from-cart','cartController@deleteFromCart');
Route::get('/clear-cart', 'cartController@Deletecart');

Route::get('/restockRequest/{id}', 'ProductController@Restock')->name('restock');
Route::get('/search', 'ProductController@searchProduct')->name('search');
Route::get('/productShow', 'ProductController@showProduct')->name('showProduct');
Route::get('/productView/{id}', 'ProductController@SingleProduct')->name('productView');



Route::get('/register', 'Auth\RegisterController@showBuyerRegisterForm');
Route::post('/registerBuyer', 'Auth\RegisterController@createBuyer')->name('registerBuyer');

Auth::routes();
Route::group(['middleware'=>['auth','isUser']],function(){
    Route::view('/home', 'home')->name('home');
    Route::get('My_profile/{id}','UserController@index')->name('My_profile');
    Route::post('update_profile/{id}','UserController@update')->name('update_profile');
    Route::get('checkout','CheckoutController@index');
    Route::post('place-order','CheckoutController@storeOrder');
    Route::get('/sslPay','CheckoutController@exampleEasyCheckout')->name('sslPay');
    Route::post('/pay-via-ajax','CheckoutController@PayViaAjax');
    Route::post('/success','CheckoutController@success');
    Route::post('/fail', 'SslCommerzPaymentController@fail');
    Route::post('/cancel','SslCommerzPaymentController@cancel' );
    Route::get('/order-load','OrderController@ordercount');
    Route::post('/ipn','SslCommerzPaymentController@ipn');
    Route::get('my_orders','OrderController@myorders');
    Route::delete('order-delete/{id}','OrderController@removeOrder')->name('order-delete');

    //Route::resource('update_profile','UserController');
});



Route::group(['middleware'=> ['auth','isAdmin']],function(){
    Route::get('/Dashboard', function () {
        return view('Admin.admin');

    });

    Route::get('ProductPage', 'ProductController@display')->name('ProductPage');
    Route::get('VendorRegister','VendorController@index')->name('VendorRegister');
    Route::post('/addVendor','VendorController@createVendor')->name('addVendor');
    Route::get('vendorList', 'VendorController@showVendors');
    Route::resource('vendors', 'VendorController');
    Route::get('vendorPage','VendorController@showVendors');

    Route::get('orders','OrderController@index');
    Route::get('review-order/{id}','OrderController@viewOrder');
    Route::get('order_review/{id}', 'OrderController@revieworder');
    Route::post('sendVoucher','VoucherController@store');
    Route::get('requestMessage', 'ProductController@showMessage')->name('requestMessage');
    Route::get('customer_list','UserController@customers');
    Route::delete('remove-user/{id}','UserController@removeCustomer');


});
Route::group(['middleware'=> ['auth','isVendor']],function(){
    Route::get('/VendorDashboard', function () {
        return view('Vendors.VendorDashboard');

    });
    Route::post('productAdd', 'ProductController@store')->name('addproduct');
    Route::resource('products', 'ProductController');
    Route::get('seeProduct','ProductController@SeeProduct')->name('seeProduct');
    Route::get('productPage', 'ProductController@SeeProduct')->name('productPage');
    Route::get('showOrders','OrderController@productOrdered');
    Route::get('confirm-order','OrderController@confirmOrder');
    Route::get('vouchers','VoucherController@display');

});


