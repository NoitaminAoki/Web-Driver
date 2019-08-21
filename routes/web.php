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
Route::post('driver/login', 'Auth\LoginController@customLogin')->name('auth.login.custom');
Route::group(['middleware' => ['auth', 'lastActivityUser']], function () {
    Route::get('driver/profil', 'Driver\DriverController@home')->name('driver.home');
    Route::get('driver/project', 'Driver\DriverController@index')->name('driver.index');
    Route::post('driver/create/laporan', 'Driver\DriverController@createLaporan')->name('driver.create.laporan');
    Route::view('/daftar', 'employee_index');
    Route::view('/driver/daftar', 'driver_registration');
    
});
Route::group(['namespace' => 'Admin', 'middleware' => ['auth:admin']], function () {
    Route::get('admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
});
Route::namespace('Auth')->group(function ()
{
    Route::get('admin/login','AdminLoginController@showLoginForm');
    Route::post('admin/login', 'AdminLoginController@login')->name('admin.login');
    Route::get('admin/register','AdminRegisterController@showRegisterForm');
    Route::post('admin/register', 'AdminRegisterController@register')->name('admin.register');
});
Route::get('/home', 'HomeController@index')->name('home');
