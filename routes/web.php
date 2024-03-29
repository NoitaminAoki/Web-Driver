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
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth:admin']], function () {
    Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('user/report/excel/{id}', 'AdminController@reportUser')->name('admin.user.report.excel');
    Route::get('user/get/activity', 'AdminController@userGetActivity')->name('admin.user.get.activity');
    Route::get('driver/{status}', 'AdminController@driverIndex')->name('admin.driver.index');
    Route::post('driver/laporan/pdf/{id?}', 'AdminController@driverLaporanPdf')->name('admin.driver.laporan.pdf');
    Route::get('driver/laporan/excel/{id?}', 'AdminController@driverLaporanExcel')->name('admin.driver.laporan.excel');
    Route::get('master/laporan', 'MasterLaporanController@index')->name('admin.master.laporan.index');
    Route::get('master/laporan/upload', 'MasterLaporanController@upload')->name('admin.master.laporan.upload');
    Route::post('master/laporan/upload', 'MasterLaporanController@uploadStore')->name('admin.master.laporan.upload.store');
});
Route::namespace('Auth')->group(function ()
{
    Route::get('admin/login','AdminLoginController@showLoginForm');
    Route::post('admin/login', 'AdminLoginController@login')->name('admin.login');
    Route::get('admin/register','AdminRegisterController@showRegisterForm');
    Route::post('admin/register', 'AdminRegisterController@register')->name('admin.register');
});
Route::get('/home', 'HomeController@index')->name('home');
