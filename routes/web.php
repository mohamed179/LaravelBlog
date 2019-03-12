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

/**
 * User routes
 */
Route::group(['namespace' => 'User'], function(){
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/post/{id}', 'PostController@show')->name('post');
});

/**
 * Admin routes
 */
Route::group(['prefix' => 'admin',  'namespace'=>'Admin'], function () {
    
    // dashboard route
    Route::get('/dashboard', 'DashboardController@index');

    // posts routes
    Route::resource('/posts', 'PostController');

    // categories routes
    Route::resource('/categories', 'CategoryController');

    // tage routes
    Route::resource('/tags', 'TagController');

    // users routes
    Route::resource('/users', 'UserController');
});
