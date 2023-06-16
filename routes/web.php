<?php

use Illuminate\Support\Facades\Route;

use App\Mail\NewUserNotification;
use Illuminate\Support\Facades\Mail;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/login', 'LoginController@index')->name('login')->middleware('guest');
Route::post('/login', 'LoginController@authenticate');
Route::post('/logout', 'LoginController@logout');

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/{id}/detail', 'HomeController@detail')->name('detail')->middleware('auth');
Route::get('/{id}/delete', 'HomeController@delete')->name('delete')->middleware('auth');

Route::get('/{id}/edit', 'InputController@edit')->name('edit')->middleware('auth');
Route::get('/input', 'InputController@index')->name('input')->middleware('auth');
Route::post('/store', 'InputController@store')->name('store')->middleware('auth');
Route::post('/update', 'InputController@update')->name('update')->middleware('auth');

Route::get('/export','ExportController@index')->name('export')->middleware('auth');
Route::post('/exportexcel', 'ExportController@export')->name('exportexcel')->middleware('auth');
