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

Route::get('/', 'HomeController@home')->name('home');
Route::get('authentication', 'HomeController@authentication')->name('authentication');
Route::post('register', 'HomeController@register')->name('register');
Route::post('login', 'HomeController@login')->name('login');
Route::get('dashboard', 'Panel\HomeController@dashboard');
Route::get('showRegisterAdvertisementForm', 'Panel\PanelController@showRegisterAdvertisementForm')->name('showRegisterAdvertisementForm');

Route::post('registerAdvertisement', 'Panel\PanelController@registerAdvertisement')->name('registerAdvertisement');
Route::get('detail/{id}/{type}', 'HomeController@detail')->name('detail');
Route::get('list/{type}', 'HomeController@list')->name('list');
Route::get('advertise/{user_id}', 'HomeController@advertise')->name('advertise');
Route::get('orders', 'Panel\PanelController@orders')->name('orders');
Route::post('delete', 'Panel\PanelController@delete')->name('delete');
Route::post('checked', 'Panel\PanelController@checked')->name('checked');
Route::post('unChecked', 'Panel\PanelController@unChecked')->name('unChecked');
Route::get('about', 'HomeController@about')->name('about');
Route::get('users', 'Panel\PanelController@users')->name('users');