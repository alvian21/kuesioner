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
            Route::get('/test','BookKuesionerController@test');
            Route::get('/kuesioner','BookKuesionerController@index');
            Route::post('/post','BookKuesionerController@postData');
            Route::get('/hitung','BookKuesionerController@hitung');
            Route::get('/id','BookKuesionerController@getData');
            Route::get('/dd','BookController@getBr');
            Route::get('/kuesioner/$2y$10$mF21t9grIyuvHnSI1sfob.mCn4imbZerVcbweTyHgiYTnBE9VPXEa','BookKuesionerController@index')->name('data.kuesioner');
            Route::resource('bukutamu', 'BookController');
});


Auth::routes();

Route::group(['prefix' => 'admin',
                'middleware'=>'auth'
            ], function () {
                // Route::get('/home', 'HomeController@index')->name('home');
                Route::get('/guestbook','GuestBookController@index')->name('guest.index');
                Route::get('/fetch','DashboardController@fetch');
                Route::get('/dashboard','DashboardController@index')->name('dashboard.index');
                Route::get('/cek','CategoryController@cek');
                Route::post('/updateData','KuesionerController@UpdateData');
                Route::get('/editdata','KuesionerController@editData');
                Route::resource('category','CategoryController');
                Route::resource('kuesioner','KuesionerController');
            });


