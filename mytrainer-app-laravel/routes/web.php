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

Route::get('/', function () {
    // dd(app());
    // $util = Util::getMessage();
    $util = app()->make('util');
    dd($util->getMessage());
    return view('welcome');
});

Route::group(['prefix' => 'home'], function() {
    Route::get('/', 'HomeController@index');
    Route::get('/{menuName}', 'HomeController@aaa');
    // Route::get('/{menuListName}/addmenu', 'Controller@aaa');
});

Route::get('/search', 'SearchController@index');

// Route::get('/user', 'Controller@aaa');

// Route::get('/login', 'Controller@aaa');

// Route::get('/signin', 'Controller@aaa');


