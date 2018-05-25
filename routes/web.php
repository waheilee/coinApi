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

//Route::get('login','Admin\LoginController@index');
//Route::group(['middleware' => 'auth:web'],function (){});
// Route::group(['prefix' => 'admin'],function (){
//
//     Route::get('login','Admin\LoginController@index');
//     Route::post('login','Admin\LoginController@login');
//     Route::get('login','Admin\LoginController@logout');
//
//     Route::group(['middleware' => 'auth:admin'],function(){
//
//         Route::get('admin','Admin\AdminController@index');
//
//     });
//
// });

    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('admin','Admin\AdminController@index')->name('admin');
    Route::get('login1','Admin\AdminController@login1')->name('admin');
    Route::get('huobi','Admin\OtcController@huobi');
    Route::get('html','HomeController@otcApi');
    Route::get('usdt','Admin\HuobiOtcController@getInUsdt');
    Route::get('admin/symbol','Admin\OtcController@index');
    Route::post('admin/symbol/list','Admin\OtcController@Symbol');
    Route::get('admin/symbol/list','Admin\OtcController@Symbol');

    //币赢
    Route::get('biying','Admin\BiyingController@symbol');


