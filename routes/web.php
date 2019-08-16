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

Route::view('/', 'welcome');

Auth::routes();
Route::post('driversss/login', 'Auth\LoginController@customLogin')->name('auth.login.custom');
Route::group(['middleware' => 'auth'], function () {
    Route::get('driver/home', 'Driver\DriverController@index')->name('driver.index');
    Route::view('/daftar', 'employee_index');
    Route::view('/driver/daftar', 'driver_registration');
    
});
Route::get('/home', 'HomeController@index')->name('home');
