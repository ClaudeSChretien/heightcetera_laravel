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

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/', 'IndexController@index');

Route::get('trip/{trip}/mapInfo', 'TripController@mapInfo');
Route::resource('trips', 'TripController');
Route::resource('trip', 'TripController');

Route::get('tripManager', 'TripController@ShowAdmin');
Route::get('trip/{trip}/markers', 'TripController@markers');

Route::resource('trip/{trip}/postManager', 'PostController');

Auth::routes();
