<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'home'], function() {
    Route::get('/', 'Controller@aaa');
    Route::get('/{menuListName}', 'Controller@aaa');
    Route::get('/{menuListName}/addmenu', 'Controller@aaa');
});

Route::get('/search', function () {
    return view('search');
});

Route::get('/user', function () {
    return view('user');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/signin', function () {
    return view('signin');
});


