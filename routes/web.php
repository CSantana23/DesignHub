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



//Route::get('/',['uses'=>'ProductController@index', 'as'=>'product.index']);


Route::group(['prefix' => 'user'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/signup', ['uses' => 'UserController@index','as'=>'signup.index']);
        Route::post('/signup', ['uses' => 'UserController@store','as'=>'signup.store']);
        Route::get('/signin', ['uses' => 'UserController@getSignIn', 'as' => 'signin']);
        Route::post('/signin', ['uses' => 'UserController@postSignIn', 'as' => 'postsignin']);
    });
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/profile', ['uses' => 'UserController@getProfile', 'as' => 'profile']);
        Route::get('/logout', ['uses' => 'UserController@getLogout', 'as' => 'logout']);
    });
});


// beginning page
Route::get('/image','ImageController@create');
Route::post('/image','ImageController@store');
Route::post('/image/download/{image}','ImageController@download');
Route::get('/image/{image}','ImageController@show');


//SHOPPING CHART page
Route::resource('/', 'ProductController');
Route::get('/add-to-cart/{id}',['uses'=>'ProductController@addToCart', 'as'=>'addCart']);
Route::get('/shoppingCart',['uses'=>'ProductController@getCart', 'as'=>'shoppingCart']);


//CHECKOUT
Route::resource('/checkout','CheckoutController');
Route::get('/thankyou','CheckoutController@getThankYou');


// strip payment integration
Route::get('/payment', 'PaymentController@index');
Route::post('/charge', 'PaymentController@charge');




