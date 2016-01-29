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

// Route::get('/', function () {
//      return view('index');
// });


Route::get('/', 'Users\AuthController@home');
Route::controllers([
    'business' => 'Business\BusinessController',
    'product' => 'Product\ProductController',
    'Auth' => 'Users\AuthController',
    'Admin' => 'Users\AdminController',
    'home' => 'Users\UsersController',
]);

