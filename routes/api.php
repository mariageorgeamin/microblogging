<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::post('login', 'PassportController@login');
Route::post('register', 'PassportController@register');

Route::middleware('auth:api')->group(function () {
    Route::get('users', 'PassportController@index');

    Route::get('user', 'PassportController@details');
    Route::post('users/{profileId}/follow', 'PassportController@followUser')->name('user.follow');
    Route::post('users/{profileId}/unfollow', 'PassportController@unFollowUser')->name('user.unfollow');
    Route::get('timeline', 'PassportController@timeline')->name('user.timeline');

    Route::get('tweets', 'TweetController@index');
    Route::get('tweets/{tweet}', 'TweetController@show');
    Route::post('tweets', 'TweetController@store');
    Route::delete('tweets/{tweet}', 'TweetController@destroy');

});
