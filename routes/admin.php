<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
// this the admin dashboard routes
*/

Auth::routes();

Route::prefix('admin')->middleware('auth')->group(function () {

  // routes to manage users and profiles
  Route::get('/','backend\AdminController@index')->name('admin')->middleware('auth');
  Route::get('/users','backend\AdminController@users')->name('users')->middleware('auth');
  Route::get('/user/{user}/{name}','backend\AdminController@profile')->name('profile')->middleware('auth');
  Route::get('/user/{user}','backend\AdminController@edit')->name('user.edit')->middleware('auth');
  Route::put('/user/{user}/update','backend\AdminController@update')->name('user.update')->middleware('auth');
  Route::delete('/user/{user}/delete','backend\AdminController@destroy')->name('user.destroy')->middleware('auth');

  // make user role Admin
  Route::post('/user/{user}/make-admin','backend\AdminController@makeAdmin')->name('user.make-admin')->middleware('auth');
  // make user role editor
  Route::post('/user/{user}/make-editor','backend\AdminController@makeEditor')->name('user.make-editor')->middleware('auth');
  // make user role viewer
  Route::post('/user/{user}/make-viewer','backend\AdminController@makeViewer')->name('user.make-viewer')->middleware('auth');

  // routes to manage Products (CRUD)
    Route::resource('/product','backend\ProductsController')->middleware('auth');
  // route for soft delete products (trashed products)
    Route::get('/trashed' , 'backend\ProductsController@trashed')->name('trashed.index')->middleware('auth');

   // restore the product from trashed to public
    Route::get('/restore/{id}' , 'backend\ProductsController@restore')->name('restore.product')->middleware('auth');

    // Route to add product to cart
    Route::get('/addToCart/{product}','backend\ProductsController@addToCart')->name('cart.add')->middleware('auth');
    // Route to show the cart shop V1
    Route::get('/shopCart','backend\ProductsController@shopCart')->name('cart.show')->middleware('auth');
    // Route to show the cart shop V2
    Route::get('/shopCartV2','backend\ProductsController@shopCartV2')->name('cart.show.v2')->middleware('auth');

    // checkout the product by stripe or paypal
    Route::get('/checkout/{amount}','backend\ProductsController@checkout')->name('cart.checkout')->middleware('auth');

    // orders controller
    Route::resource('/orders', 'backend\OrderController')->middleware('auth');

    // show orders to dashboard admin
    Route::get('/ordersCart' , 'backend\AdminController@orders')->name('orders.cart')->middleware('auth');

    // remove product from cart
    Route::delete('/remove_product/{$id}','PageController@remove_product')->name('cart.remove')->middleware('auth');


});


