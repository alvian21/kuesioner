<?php

use Illuminate\Support\Facades\Auth;
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


Route::group(['prefix' => 'data'], function () {

            Route::get('/kuesioner','BookKuesionerController@index')->middleware('CheckData');
            Route::resource('bukutamu', 'BookController');
});


Auth::routes();

Route::group(['prefix' => 'admin',
                'middelware'=>'Auth'
            ], function () {
                Route::get('/home', 'HomeController@index')->name('home');

                Route::get('/cek','CategoryController@cek');
                Route::resource('category','CategoryController');
                Route::resource('kuesioner','KuesionerController');
            });


