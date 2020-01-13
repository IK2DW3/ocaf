<?php
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'OcafController@getIndex');
Route::get('index', 'OcafController@getIndex');

Route::GET('logout', 'Auth/LoginController@logout');

Route::get('mode', 'OcafController@getMode');
Route::get('historys', 'OcafController@getHistorys');
Route::get('history/{id}', 'OcafController@getHistory');
Route::post('gamemode', 'OcafController@getGamemode');
Route::post('register', 'OcafController@postRegister');


Route::group(['middleware' => 'auth'], function () {

    Route::GET('panel', function(){
        if (Auth::check()) {
            return Redirect::action('OcafController@getPanel');
        } else {
            return Redirect::action('OcafController@getIndex');
        }
    });

    Route::get('/panel', function(){
        if (Auth::check()) {
            return Redirect::action('OcafController@getPanel');
        } else {
            return Redirect::action('OcafController@getIndex');
        }
    });

    Route::get('panel', 'OcafController@getPanel');
    Route::get('perfil', 'OcafController@getPerfil');
    Route::get('panelcartas', 'OcafController@getPanelcartas');
    Route::get('panelusuarios', 'OcafController@getPanelusuarios');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
