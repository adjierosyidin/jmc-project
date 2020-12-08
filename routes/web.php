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

// user
Route::get('/dashboard', 'UserController@index')->name('dashboard');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::get('/register/getbyprovinsi/{kabupaten}','Auth\RegisterController@get_by_provinsi')->name('kabupaten.show');
Route::get('/register/getbykabupaten/{kecamatan}','Auth\RegisterController@get_by_kabupaten')->name('kecamatan.show');
Route::get('/myreferrals','UserController@myreferrals')->name('myreferral.show');
Route::get('/pending_activation','UserController@pending_activation')->name('pending_activation.show');
Route::get('/profile', 'UserController@myprofile')->name('profile');
Route::post('/userbank', 'UserController@addbank');
Route::post('/userbank/{userbank}', 'UserController@updatebank');
Route::get('/bonus', 'UserController@bonus');
Route::get('/profile/getbyprovinsi/{kabupaten}','UserController@get_by_provinsi')->name('profilkabupaten.show');
Route::get('/profile/getbykabupaten/{kecamatan}','UserController@get_by_kabupaten')->name('profilkecamatan.show');
Route::post('/edituser/{edituser}', 'UserController@edituser');
Route::post('/ganti_password', 'UserController@ganti_password');

// admin
Route::get('/pending', 'AdminController@pending')->name('pending')->middleware('role:Admin');
Route::post('/activate-user', 'AdminController@activateUser')->middleware('role:Admin');
Route::get('/all_member', 'AdminController@all_member')->middleware('role:Admin');
Route::get('/reward', 'AdminController@reward')->middleware('role:Admin');
Route::get('/user_admin', 'AdminController@user_admin')->middleware('role:Admin');
Route::post('/user_admin/{user_admin}', 'AdminController@update_role')->middleware('role:Admin');
Route::get('/log_user', 'AdminController@log_user')->middleware('role:Admin');
Route::get('/reset_password', 'AdminController@reset_password')->middleware('role:Admin');
Route::post('/exec_reset_password/{exec_reset_password}', 'AdminController@exec_reset_password')->middleware('role:Admin');

// master data
Route::resource('/masterbank', 'MstBankController')->middleware('role:Admin');
Route::resource('/masterjoin', 'MstJoinController')->middleware('role:Admin');

