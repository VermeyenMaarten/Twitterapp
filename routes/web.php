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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('tweets', 'TweetController');

Route::get('/home', [
    'uses' => 'TweetController@show',
    'as' => 'tweets.show',
]);

Route::get('/global', [
    'uses' => 'TweetController@globalTweets',
    'as' => 'tweets.global',
]);

Route::get('/users', [
    'uses' => 'UserController@index',
    'as' => 'users.index',
]);

Route::post('/users/follow', [
    'uses' => 'FollowController@follow',
    'as' => 'users.follow',
]);


Route::get('/{id}', [
    'uses' => 'TweetController@showSingletweet',
    'as' => 'tweets.showSingle',
]);