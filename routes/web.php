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
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/register','UserController@registerCustomer');
Route::get('/dashboard','DashboardController@index');
Route::resource('/departements','DepartementController');
Route::resource('/reviews','ReviewController');
Route::resource('/registrations','RegisterController');
Route::get('/registrations/{id}/actions','RegisterController@takeAction');
Route::get('/history','RegisterController@history');
Route::get('/qrcode/{code}','RegisterController@showQrCode');
Route::resource('/roles','RoleController');
Route::resource('/users','UserController');
Route::get('/users/{id}/delete','UserController@destroy');
Route::get('/reviews/{id}/delete','ReviewController@destroy');