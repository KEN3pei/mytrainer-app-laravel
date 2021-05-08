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

Route::get('/', 'TopController@index')->middleware('auth');

Route::group(['prefix' => 'top'], function() {
    Route::get('/', 'TopController@index')->middleware('auth');
    Route::post('/', 'TopController@createList');
    Route::get('/menulist', 'TopController@show')->middleware('auth');
    Route::post('/menulist', 'TopController@addItem');
    Route::post('/menulist/delete', 'TopController@delete');
});

Route::group(['prefix' => 'search'], function() {
    Route::get('/', 'SearchController@index')->middleware('auth');
    Route::get('/{keyWord}', 'SearchController@search')->middleware('auth');
});

Route::group(['prefix' => 'setting'], function() {
    Route::get('/', 'SettingController@index')->middleware('auth');
    Route::post('/', 'SettingController@edit');
    Route::get('/logout', 'SettingController@logout')->middleware('auth');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
