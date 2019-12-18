<?php

Auth::routes();
Route::GET('/logout', 'Auth/LoginController@logout');

Route::get('mode', 'OcafController@getMode');
Route::get('gamemode/{id}', 'OcafController@getGamemode');

Route::group(['middleware' => 'auth'], function () {

    Route::GET('/', function(){
        if (Auth::check()) {
            return Redirect::action('OcafController@getMode');
        } else {
            return Redirect::action('OcafController@getIndex');
        }
    });

    Route::get('index', function(){
        if (Auth::check()) {
            return Redirect::action('OcafController@getMode');
        } else {
            return Redirect::action('OcafController@getIndex');
        }
    });
    
});