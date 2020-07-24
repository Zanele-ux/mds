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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/holidays', 'HolidayController@store')->name('holidays');
Route::get('/holidays', 'HolidayController@index')->name('holidays.index');
Route::get('/holidays/{year}', 'HolidayController@download')->name('holidays.download');
//.Route::get('htmltopdfview',array('as'=>'holidays','uses'=>'HolidayController@htmltopdfview'));

