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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//route for the message resource
Route::resource('message', 'MessagesController');

//route for the users resource
Route::resource('user', 'UsersController');

//routes to the orders resoource
Route::resource('order', 'OrdersController');

//routes to the products resource
Route::resource('product', 'ProductsController');
