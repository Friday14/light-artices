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


Auth::routes();

Route::get('/', 'ArticlesController@index')->name('home');
Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');

Route::prefix('manager')
    ->middleware('auth')
    ->group(function () {
        Route::get('', 'ManagerController')->name('manager');
        Route::resource('articles', 'ArticlesController')->except(['index', 'show']);
        Route::resource('categories', 'CategoriesController')->except(['index', 'show']);
    });

