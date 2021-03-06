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

Route::get('/', 'FrontController@home')->name('front');
Route::get('/reviews', 'FrontController@reviews')->name('reviews');
Route::get('/reviews/{slug}', 'FrontController@showReviews')->name('show-reviews');

Route::get('/user/confirmation/{token}', 'UserController@registerConfirmation')->name('register-confirmation');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('ongkir', 'OngkirController');
Route::resource('review', 'ReviewController');
Route::resource('comment-review', 'CommentReviewController');

Route::get('/callback', 'LoginController@callback')->name('callback');

