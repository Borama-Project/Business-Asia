<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//
//Route::get('/', function(){
//    return view('index');
//});

Route::get('/', 'User\UserController@getIndex');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::controllers([
    'user' => 'User\UserController',
    'product' => 'BackEnd\Product\ProductController',
]);

Route::group(['middleware' => ['web']], function () {
    //
});
