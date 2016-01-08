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


//Route::get('category', function(){
//    return view('business.category');
//});
////Route::get('business', function(){
////    return view('business.business');
////});
//
//Route::get('businessType', function(){
//    return view('business.businessType');
//});
//
//Route::get('mainCategory', function(){
//    return view('business.mainCategory');
//});
//
//
//Route::get('businessTage', function(){
//    return view('business.businessTage');
//});
//
//Route::get('product', function(){
//    return view('product.product');
//});
//Route::get('promotion', function(){
//    return view('promotion.promotion');
//});



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
Route::group(['middleware' => ['web']], function () {
    //
});
