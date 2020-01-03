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
Route::get('/clients', 'ClientController@index')->name('client.index');
Route::get('/createClient', 'ClientController@create')->name('client.createClient');
Route::post('/createClient', 'ClientController@store')->name('client.store');
// Route::get('/viewClient', 'clientController@index')->name('viewClient');
// Route::get('createClient', function () {
//     return view('client/createClient');
// });
// Route::get('viewClient', function () {
//     return view('client/viewClient');
// });

// Offer
// Route::get('/createOffer', 'offerController@index')->name('createOffer');
Route::get('/viewOffer', 'OfferController@index')->name('viewOffer');
Route::get('createOffer', function () {
    return view('offer/createOffer');
});
// Route::get('viewOffer', function () {
//     return view('offer/viewOffer');
// });
