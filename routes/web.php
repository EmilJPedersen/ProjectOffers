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
//  Google login
Route::get('google', function () {
    return view('googleAuth');
});

Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');


Route::get('/', function () {
    return view('dashboard/show');
});

Auth::routes();

// Route::get('/', 'HomeController@index')->name('dashboard');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/homepage', 'HomeController@index')->name('homepage');

// Clients
Route::get('/createClient', 'clientController@index')->name('createClient');
Route::get('/viewClient', 'clientController@index')->name('viewClient');

// Offer
Route::get('/createOffer', 'offerController@index')->name('createOffer');
Route::get('/viewOffer', 'offerController@index')->name('viewOffer');
