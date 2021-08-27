<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'role:developer || manager'], function () {

    Route::prefix('/dashboard')->name('dashboard.')->group(function () {
        Route::get('/', 'App\Http\Controllers\Backend\Dashboard\DashboardController@index')->name('show');
    });
    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/', 'App\Http\Controllers\Backend\Category\CategoryController@index')->name('index');
        Route::get('/search', 'App\Http\Controllers\Backend\Category\CategoryController@search')->name('search');
        Route::post('/create', 'App\Http\Controllers\Backend\Category\CategoryController@create')->name('create');
        Route::get('/table', 'App\Http\Controllers\Backend\Category\CategoryController@select')->name('select');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\Category\CategoryController@edit')->name('edit');
        Route::patch('/update', 'App\Http\Controllers\Backend\Category\CategoryController@update')->name('update');
        Route::get('/delete{id}', 'App\Http\Controllers\Backend\Category\CategoryController@delete')->name('delete');
        Route::delete('/post/delete', 'App\Http\Controllers\Backend\Category\CategoryController@categoryDelete')->name('category.delete');
    });
    Route::prefix('post')->name('post.')->group(function () {
        Route::get('/', 'App\Http\Controllers\Backend\Post\PostController@index')->name('index');
        Route::post('/create', 'App\Http\Controllers\Backend\Post\PostController@create')->name('create');
        Route::get('/search', 'App\Http\Controllers\Backend\Post\PostController@search')->name('search');
        Route::get('/get', 'App\Http\Controllers\Backend\Post\PostController@select')->name('select');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\Post\PostController@edit')->name('edit');
        Route::patch('/update', 'App\Http\Controllers\Backend\Post\PostController@update')->name('update');
        Route::get('/delete{id}', 'App\Http\Controllers\Backend\Post\PostController@delete')->name('delete');
        Route::delete('/category/delete', 'App\Http\Controllers\Backend\Post\PostController@postDelete')->name('post.delete');
    });
    Route::prefix('subcategory')->name('subcategory.')->group(function () {
        Route::get('/', 'App\Http\Controllers\Backend\SubCategory\SubCategoryController@index')->name('index');
        Route::get('/search', 'App\Http\Controllers\Backend\SubCategory\SubCategoryController@search')->name('search');
        Route::post('/create', 'App\Http\Controllers\Backend\SubCategory\SubCategoryController@create')->name('create');
        Route::get('/table', 'App\Http\Controllers\Backend\SubCategory\SubCategoryController@select')->name('select');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\SubCategory\SubCategoryController@edit')->name('edit');
        Route::patch('/update', 'App\Http\Controllers\Backend\SubCategory\SubCategoryController@update')->name('update');
        Route::get('/delete{id}', 'App\Http\Controllers\Backend\SubCategory\SubCategoryController@delete')->name('delete');
    });
    Route::prefix('userpost')->name('userpost.')->group(function () {
        Route::get('/', 'App\Http\Controllers\Backend\CustomerPost\CustomerPostController@index')->name('index');
        Route::get('/search', 'App\Http\Controllers\Backend\CustomerPost\CustomerPostController@search')->name('search');
        Route::get('/table', 'App\Http\Controllers\Backend\CustomerPost\CustomerPostController@select')->name('select');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\CustomerPost\CustomerPostController@edit')->name('edit');
        Route::patch('/update', 'App\Http\Controllers\Backend\CustomerPost\CustomerPostController@update')->name('update');
    });
    Route::prefix('customer')->name('customer.')->group(function () {
        Route::get('/', 'App\Http\Controllers\Backend\Customer\CustomerController@index')->name('index');
        Route::get('/table', 'App\Http\Controllers\Backend\Customer\CustomerController@select')->name('select');
        Route::get('/delete{id}', 'App\Http\Controllers\Backend\Customer\CustomerController@delete')->name('delete');
    });
    Route::prefix('home')->name('home.')->group(function () {
        Route::get('/', 'App\Http\Controllers\Backend\Home\HomeController@home')->name('index');
    });
    Route::prefix('user')->name('user.')->group(function () {
        Route::post('/logout', 'App\Http\Controllers\Backend\Logout\LogoutController@logout')->name('logout');
        Route::get('/changepassword', 'App\Http\Controllers\Backend\ChangePassword\ChangePasswordController@index')->name('changepassword');
        Route::post('/', 'App\Http\Controllers\Backend\ChangePassword\ChangePasswordController@update')->name('changepasswordupdate');
    });
});

Route::prefix('login')->name('login.')->group(function () {
    Route::get('/', 'App\Http\Controllers\Auth\LoginController@index')->name('index');
    Route::post('/', 'App\Http\Controllers\Auth\LoginController@login')->name('login');
});
