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
Route::get('/profile/user', 'TaskController@getPerfiluser');
Route::put('/profile/update', 'TaskController@updatePerfiluser');

// Rutas para el panel de gestion de usuarios
Route::get('/panel/users/data', 'TaskController@tableUser');
Route::put('/panel/users/update', 'TaskController@updateUser');
Route::post('/panel/users/save', 'TaskController@storeUser');
Route::delete('/panel/users/delete/{id}', 'TaskController@destroyUser');
Route::get('/panel/users/search', 'TaskController@showUser');

// Rutas para el panel de gestion de cartas
Route::get('/panel/cards/data', 'TaskController@tableCard');
Route::put('/panel/cards/update', 'TaskController@updateCard');
Route::post('/panel/cards/save', 'TaskController@storeCard');
Route::post('/panel/cards/image', 'TaskController@uploadImage');
Route::delete('/panel/cards/delete/{id}', 'TaskController@destroyCard');
Route::get('/panel/cards/search', 'TaskController@showCard');
Route::get('/panel/cards/filter', 'TaskController@filterCard');

// Rutas para el panel de gestion de cartas
Route::get('/panel/ambits/data', 'TaskController@tableAmbit');
Route::put('/panel/ambits/update', 'TaskController@updateAmbit');
Route::post('/panel/ambits/save', 'TaskController@storeAmbit');
Route::delete('/panel/ambits/delete/{id}', 'TaskController@destroyAmbit');
Route::get('/panel/ambits/search', 'TaskController@showAmbit');

// Rutas para el panel de gestion de cartas
Route::get('/panel/continents/data', 'TaskController@tableContinent');
Route::put('/panel/continents/update', 'TaskController@updateContinent');
Route::post('/panel/continents/save', 'TaskController@storeContinent');
Route::delete('/panel/continents/delete/{id}', 'TaskController@destroyContinent');
Route::get('/panel/continents/search', 'TaskController@showContinent');

// Rutas para el panel de gestion de Preguntas
Route::get('/panel/quests/data', 'TaskController@tableQuest');
Route::put('/panel/quests/update', 'TaskController@updateQuest');
Route::post('/panel/quests/save', 'TaskController@storeQuest');
Route::delete('/panel/quests/delete/{id}', 'TaskController@destroyQuest');
Route::get('/panel/quests/search', 'TaskController@showQuest');

// Ruta para el selector de juego y el tablero
Route::post('/modo', 'TaskController@getGamemode');

/**
 * Subida de archivos
 */
Route::get('pruebas', 'FileController@create');
Route::resource('file', 'FileController');
Route::resource('file', 'TaskController');



