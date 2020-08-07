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

Auth::routes();


Route::get('/', 'PageController@index')->name('main');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/products', 'PageController@products')->name('productsList');
    Route::get('/product/{product}', 'PageController@product')->name('product.show');
    Route::get('/users', 'PageController@users')->name('usersList');
    Route::get('/access/{user}', 'PageController@access')->name('access');
// route to change role for user
    Route::put('/changeRole/{user}', 'PageController@changeRole')->name('changeRole');
//Route::get('/shopcart/{user}', 'PageController@shopcart')->name('shopcart');

// route for post strip request (charge)
    Route::post('/charge' , 'PageController@charge')->name('cart.charge');

    // remove product from cart
    Route::delete('/remove_product/{product}','PageController@remove_product')->name('cart.remove')->middleware('auth');

    // update price and quantity from shop cart
    Route::put('/update_product/{product}','PageController@update_product')->name('cart.update')->middleware('auth');

});

