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


//Route::resource('/post','PostsController');

//Route::get('/',['uses'=>'ProductController@index', 'as'=>'product.index']);
Route::resource('/', 'ProductController');

Route::group(['prefix' => 'user'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/signup', ['uses' => 'UserController@index','as'=>'signup.index']);
        Route::post('/signup', ['uses' => 'UserController@postSignIn','as'=>'signup.store']);
        Route::get('/signin', ['uses' => 'UserController@getSignIn', 'as' => 'signin']);
        Route::post('/signin', ['uses' => 'UserController@postSignIn', 'as' => 'postsignin']);
    });
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/profile', ['uses' => 'UserController@getProfile', 'as' => 'profile']);
        Route::get('/logout', ['uses' => 'UserController@getLogout', 'as' => 'logout']);
    });
});
