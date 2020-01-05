<?php

Route::get('/', 'OcafController@getIndex');
Route::get('index', 'OcafController@getIndex');

Route::GET('logout', 'Auth/LoginController@logout');

Route::get('mode', 'OcafController@getMode');
Route::get('historys', 'OcafController@getHistorys');
Route::get('history/{id}', 'OcafController@getHistory');
Route::post('gamemode', 'OcafController@getGamemode');

Auth::routes();
Route::group(['middleware' => 'auth'], function () {

    Route::GET('paneladmin', function(){
        if (Auth::check()) {
            return Redirect::action('OcafController@getIndex');
        } else {
            return Redirect::action('OcafController@getIndex');
        }
    });

    Route::get('paneladmin', function(){
        if (Auth::check()) {
            return Redirect::action('OcafController@getIndex');
        } else {
            return Redirect::action('OcafController@getIndex');
        }
    });

});
