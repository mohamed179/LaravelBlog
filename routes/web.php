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
    return view('user.home');
})->name('home');

Route::get('/post', function () {
    return view('user.post');
})->name('post');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.home');
    });

    Route::get('/post', function () {
        return view('admin.posts.create');
    });

    Route::get('/category', function () {
        return view('admin.categories.create');
    });
});
