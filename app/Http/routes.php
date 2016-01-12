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
Route::get('/', function(){
    return view('index');
});

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
    'product' => 'Product\ProductController',
]);
Route::controllers([
    'business' => 'Business\BusinessController',
]);

Route::controllers([
    'Auth' => 'User\AuthController',
]);

Route::group(['middleware' => ['web']], function () {
    //
});

Route::controllers([
    'Auths' => 'User\FormController',
]);

Route::get('home', function () {
    // Retrieve a piece of data from the session...
    $value = session('key');

    // Store a piece of data in the session...
    session(['key' => 'value']);
    var_dump(session::All());
});

Route::get('home', ['middleware' => 'web', function () {
    // $data = $request->session()->all();
}]);