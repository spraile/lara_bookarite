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
    return view('welcome');
});

Route::delete('/bags/empty','BagController@empty')->name('bags.empty');

Route::resource('categories', 'CategoryController');
Route::resource('titles', 'TitleController');
Route::resource('assets', 'AssetController');
Route::resource('bags','BagController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
