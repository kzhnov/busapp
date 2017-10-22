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
Route::resource('busstop', 'BusStopController');
Route::resource('bus', 'BusController');
Route::get('/nearestBusStop/{lat}/{lng}', 'BusStopController@getNearestBusStop')->name('nearest_bus_stop');
Route::post('/bus/register', 'BusController@register')->name('register_bus');