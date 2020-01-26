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


// Route::get('/', function () {
//     return view('dashboard/show');
// });
Route::get('/', function () {
    return view('home');
});

Auth::routes();

// Route::get('/', 'HomeController@index')->name('dashboard');
// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/homepage', 'HomeController@index')->name('homepage');

// Clients
Route::get('/clients', 'ClientController@index')->name('client.viewClient');
Route::get('/createClient', 'ClientController@create')->name('client.createClient');
Route::post('/createClient', 'ClientController@store')->name('client.store');
Route::delete('/clients', 'ClientController@delete')->name('client.delete');


// Offer
Route::get('/createOffer', 'OfferController@create')->name('offer.createOffer');
Route::post('/createOffer', 'OfferController@store')->name('offer.store');
Route::get('/viewOffer', 'OfferController@index')->name('offer.viewOffer');
Route::get('/viewOffer/{cvr}', 'OfferController@getOffer')->name('viewOffer');
Route::get('/viewOffer/{cvr}/pdf', 'PDFController@pdf')->name('viewOffer');
Route::get('/viewTask/{task}', 'OfferController@getTask')->name('viewTask');
Route::get('/viewTemplate', 'OfferController@getTemplates')->name('offer.viewTemplate');

