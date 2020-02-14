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

    Route::GET('/panel/gestion', function(){
        if (Auth::check()) {
            return Redirect::action('OcafController@getPanelgestion');
        } else {
            return Redirect::action('OcafController@getIndex');
        }
    });

    Route::get('/panel/gestion', function(){
        if (Auth::check()) {
            return Redirect::action('OcafController@getPanelgestion');
        } else {
            return Redirect::action('OcafController@getIndex');
        }
    });

    Route::get('/perfil', 'OcafController@getPerfil')->name('perfil');
    Route::get('/panel/gestion', 'OcafController@getPanelgestion')->name('panel.gestion');
    Route::get('/panel/usuarios', 'OcafController@getPanelusuarios')->name('panel.usuarios');
    Route::get('/panel/ambitos', 'OcafController@getPanelambitos')->name('panel.ambitos');
    Route::get('/panel/continentes', 'OcafController@getPanelcontinentes')->name('panel.continentes');
    Route::get('/panel/cartas', 'OcafController@getPanelcartas')->name('panel.cartas');
    Route::get('/panel/preguntas', 'OcafController@getPanelpreguntas')->name('panel.preguntas');

});

/*
CRUD Vue.js y Laravel
*/
// Rutas para el perfil del usuario
Route::get('/perfil/usuario', 'TaskController@getPerfiluser');
Route::put('/perfil/actualizar', 'TaskController@updatePerfiluser');

// Rutas para el panel de gestion de usuarios
Route::get('/panel/usuarios/datos', 'TaskController@tableUser');
Route::put('/panel/usuarios/actualizar', 'TaskController@updateUser');
Route::post('/panel/usuarios/guardar', 'TaskController@storeUser');
Route::delete('/panel/usuarios/borrar/{id}', 'TaskController@destroyUser');
Route::get('/panel/usuarios/buscar', 'TaskController@showUser');

// Rutas para el panel de gestion de cartas
Route::get('/panel/cartas/datos', 'TaskController@tableCard');
Route::put('/panel/cartas/actualizar', 'TaskController@updateCard');
Route::post('/panel/cartas/guardar', 'TaskController@storeCard');
Route::post('/panel/cartas/imagen', 'TaskController@uploadImage');
Route::delete('/panel/cartas/borrar/{id}', 'TaskController@destroyCard');
Route::get('/panel/cartas/buscar', 'TaskController@showCard');
Route::get('/panel/cartas/filtrar', 'TaskController@filterCard');

// Rutas para el panel de gestion de cartas
Route::get('/panel/ambitos/datos', 'TaskController@tableAmbit');
Route::put('/panel/ambitos/actualizar', 'TaskController@updateAmbit');
Route::post('/panel/ambitos/guardar', 'TaskController@storeAmbit');
Route::delete('/panel/ambitos/borrar/{id}', 'TaskController@destroyAmbit');
Route::get('/panel/ambitos/buscar', 'TaskController@showAmbit');

// Rutas para el panel de gestion de cartas
Route::get('/panel/continentes/datos', 'TaskController@tableContinent');
Route::put('/panel/continentes/actualizar', 'TaskController@updateContinent');
Route::post('/panel/continentes/guardar', 'TaskController@storeContinent');
Route::delete('/panel/continentes/borrar/{id}', 'TaskController@destroyContinent');
Route::get('/panel/continentes/buscar', 'TaskController@showContinent');

// Rutas para el panel de gestion de Preguntas
Route::get('/panel/preguntas/datos', 'TaskController@tableQuest');
Route::put('/panel/preguntas/actualizar', 'TaskController@updateQuest');
Route::post('/panel/preguntas/guardar', 'TaskController@storeQuest');
Route::delete('/panel/preguntas/borrar/{id}', 'TaskController@destroyQuest');
Route::get('/panel/preguntas/buscar', 'TaskController@showQuest');

// Ruta para el selector de juego y el tablero
Route::post('/modo', 'TaskController@getGamemode');

/**
 * Subida de archivos
 */
Route::get('pruebas', 'FileController@create');
Route::resource('file', 'FileController');
Route::resource('file', 'TaskController');



