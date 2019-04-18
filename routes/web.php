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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/searchresult', 'CustomerController@searchresult')->name('searchresult')->middleware('auth');

Route::resource('customer', 'CustomerController')->middleware('auth');

Route::get('/meter', 'MeteringController@createMeter')->name('meter.create')->middleware('auth');

Route::post('/meter', 'MeteringController@storeMeter')->name('meter.store')->middleware('auth');

Route::get('/assign_meters', 'MeteringController@createMeterAssignment')->name('meter.assignment')->middleware('auth');

Route::post('/assign_meters', 'MeteringController@assignMeter')->name('meter.assignment')->middleware('auth');

Route::get('/meter_reading', 'ReadingController@create')->name('reading.create')->middleware('auth');

Route::post('/search_reading', 'ReadingController@search')->name('reading.search')->middleware('auth');