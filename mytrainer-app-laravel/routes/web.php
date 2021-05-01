<?php

use Illuminate\Support\Facades\Route;
use App\Facades\Util;

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

Route::get('/', 'TopController@index');

Route::group(['prefix' => 'top'], function() {
    Route::get('/', 'TopController@index');
    // Route::get('/{menuName}', 'TopController@aaa');
    Route::post('/createList', 'TopController@createList');
    // Route::get('/{menuListName}/addmenu', 'Controller@aaa');
});

Route::group(['prefix' => 'search'], function() {
    Route::get('/', 'SearchController@index');
    Route::get('/{keyWord}', 'SearchController@search');
});

Route::group(['prefix' => 'setting'], function() {
    Route::get('/', 'SettingController@index');
    Route::get('/logout', 'SettingController@logout');
});

// Route::get('/login', 'Controller@aaa');

// Route::get('/signin', 'Controller@aaa');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
