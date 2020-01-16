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

/*
CRUD Vue.js y Laravel
*/
Route::get('pruebas', 'OcafController@getPrueba');

Route::get('/user', 'TaskController@tableUser');

Route::put('/user/actualizar', 'TaskController@updateUser');

Route::post('/user/guardar', 'TaskController@storeUser');

Route::delete('/user/borrar/{id}', 'TaskController@destroyUser');

Route::get('/user/buscar', 'TaskController@showUser');
