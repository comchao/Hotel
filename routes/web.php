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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/account', function () {
    return view('account');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/events', function () {
    return view('events');
});

Route::get('/forgotPwd', function () {
    return view('forgotPwd');
});

Route::get('/guests', function () {
    return view('guests');
});

Route::get('/report', function () {
    return view('report');
});

Route::get('/reservation', function () {
    return view('reservation');
});

Route::get('/services', function () {
    return view('services');
});
Route::get('/setting', function () {
    return view('setting');
});
Route::get('/staff', function () {
    return view('staff');
});
Route::get('/stock', function () {
    return view('stock');
});

Route::get('/home', 'HomeController@index')->name('home');
