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

Route::get('/', 'MainController@index');
Route::get('beranda', 'MainController@beranda');
Route::get('map', 'MainController@map');
Route::get('weather/history/{city_id}', 'MainController@historyWeather');
Route::get('ajax/weather', 'MainController@ajaxGetWeather');
Route::get('search', 'SearchController@index');