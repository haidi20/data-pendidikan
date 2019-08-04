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
    // return view('welcome');
    return redirect()->route('guestbook.index');
});

Route::group(['prefix' => 'guest-book'], function(){
    Route::get('/', 'GuestBookController@index')->name('guestbook.index');

    Route::get('/store', 'GuestBookController@send')->name('guestbook.send');
});
Route::group(['prefix' => 'guest-group'], function(){
    Route::get('/', 'GuestGroupController@index')->name('guestgroup.index');
    Route::get('/store', 'GuestGroupController@store')->name('guestgroup.store');
    Route::get('/destroy', 'GuestGroupController@destroy')->name('guestgroup.destroy');
});
Route::group(['prefix' => 'necessity'], function(){
    Route::get('/', 'NecessityController@index')->name('necessity.index');
    Route::get('/store', 'NecessityController@store')->name('necessity.store');
    Route::get('/destroy', 'NecessityController@destroy')->name('necessity.destroy');
});

