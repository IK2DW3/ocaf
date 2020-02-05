<?php
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'OcafController@getIndex');
Route::get('index', 'OcafController@getIndex');

Route::GET('logout', 'Auth/LoginController@logout');
Route::post('register', 'OcafController@postRegister');

Route::get('mode', 'OcafController@getMode');
Route::get('historys', 'OcafController@getHistorys');
Route::get('history/{id}', 'OcafController@getHistory');
Route::get('gamemode', 'OcafController@getGamemode')->name('gamemode');
Route::get('tablero/normal', 'OcafController@getTabnormal')->name('tablero.normal');
Route::get('tablero/serpiente', 'OcafController@getTabserpiente')->name('tablero.serpiente');


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
    Route::get('panelusuarios', 'OcafController@getPanelusuarios');
    Route::get('panelambitos', 'OcafController@getPanelambitos');
    Route::get('panelcontinentes', 'OcafController@getPanelcontinentes');
    Route::get('panelcartas', 'OcafController@getPanelcartas');
    Route::get('panelpreguntas', 'OcafController@getPanelpreguntas');

});

/*
CRUD Vue.js y Laravel
*/
// Rutas para el perfil del usuario
Route::get('/profile', 'TaskController@getPerfiluser');
Route::put('/profile/actualizar', 'TaskController@updatePerfiluser');

// Rutas para el panel de gestion de usuarios
Route::get('/user', 'TaskController@tableUser');
Route::put('/user/actualizar', 'TaskController@updateUser');
Route::post('/user/guardar', 'TaskController@storeUser');
Route::delete('/user/borrar/{id}', 'TaskController@destroyUser');
Route::get('/user/buscar', 'TaskController@showUser');

// Rutas para el panel de gestion de cartas
Route::get('/card', 'TaskController@tableCard');
Route::put('/card/actualizar', 'TaskController@updateCard');
Route::post('/card/guardar', 'TaskController@storeCard');
Route::post('/card/imagen', 'TaskController@uploadImage');
Route::delete('/card/borrar/{id}', 'TaskController@destroyCard');
Route::get('/card/buscar', 'TaskController@showCard');
Route::get('/card/filtrar', 'TaskController@filterCard');

// Rutas para el panel de gestion de cartas
Route::get('/ambit', 'TaskController@tableAmbit');
Route::put('/ambit/actualizar', 'TaskController@updateAmbit');
Route::post('/ambit/guardar', 'TaskController@storeAmbit');
Route::delete('/ambit/borrar/{id}', 'TaskController@destroyAmbit');
Route::get('/ambit/buscar', 'TaskController@showAmbit');

// Rutas para el panel de gestion de cartas
Route::get('/continent', 'TaskController@tableContinent');
Route::put('/continent/actualizar', 'TaskController@updateContinent');
Route::post('/continent/guardar', 'TaskController@storeContinent');
Route::delete('/continent/borrar/{id}', 'TaskController@destroyContinent');
Route::get('/continent/buscar', 'TaskController@showContinent');

// Rutas para el panel de gestion de Preguntas
Route::get('/quest', 'TaskController@tableQuest');
Route::put('/quest/actualizar', 'TaskController@updateQuest');
Route::post('/quest/guardar', 'TaskController@storeQuest');
Route::delete('/quest/borrar/{id}', 'TaskController@destroyQuest');
Route::get('/quest/buscar', 'TaskController@showQuest');

// Ruta para el selector de juego y el tablero
Route::post('/modo', 'TaskController@getGamemode');

/**
 * Subida de archivos
 */
Route::get('pruebas', 'FileController@create');
Route::resource('file', 'FileController');
Route::resource('file', 'TaskController');



