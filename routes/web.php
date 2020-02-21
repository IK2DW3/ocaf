<?php
Auth::routes();
Route::get('/', 'OcafController@getIndex');
Route::get('index', 'OcafController@getIndex');

Route::GET('logout', 'Auth/LoginController@logout');
Route::post('register', 'OcafController@postRegister');

Route::get('historys', 'OcafController@getHistorys');
Route::get('history/{id}', 'OcafController@getHistory');

Route::get('mode', 'OcafController@getMode');
Route::get('gamemode', 'OcafController@getGamemode')->name('gamemode');

Route::get('tablero/normal', 'OcafController@getTabnormal')->name('tablero.normal');
Route::get('tablero/serpiente', 'OcafController@getTabserpiente')->name('tablero.serpiente');

Route::get('blog/home', 'OcafController@getBlog')->name('blog.home');
Route::get('blog/posts', 'OcafController@getPosts')->name('blog.posts');
Route::get('blog/post/{id}', 'OcafController@getPost')->name('blog.post');
Route::get('blog/posts/category/{id}', 'OcafController@getPostsByCategory')->name('blog.postsByCategory');
Route::get('blog/posts/filter', 'OcafController@getPostsByFilter')->name('blog.postsByFilter');

Route::post('/blog/post/comentar', 'OcafController@postComment');
Route::post('/blog/post/filtrar', 'OcafController@getPostsByFilter');
Route::post('/blog/post/eliminar/{id}', 'OcafController@deletePost');
Route::post('/blog/comentario/eliminar', 'OcafController@deleteComment');

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

    Route::get('/profile', 'OcafController@getPerfil')->name('profile');
    Route::get('/panel/gestion', 'OcafController@getPanelgestion')->name('panel.gestion');
});

/*
CRUD Vue.js y Laravel
*/
// Rutas para el perfil del usuario
Route::get('/profile/user', 'TaskController@getProfile');
Route::put('/profile/update', 'TaskController@updateProfile');
Route::put('/profile/post/update', 'TaskController@updateProfilePost');
Route::post('/profile/post/save', 'TaskController@storeProfilePost');
Route::get('/profile/post/data', 'TaskController@getProfilePosts');
Route::delete('/profile/post/delete/{id}', 'TaskController@destroyProfilePost');
Route::get('/profile/post/search', 'TaskController@showProfilePost');

// Rutas para el panel de gestion de usuarios
Route::get('/panel/ranks/data', 'TaskController@tableRank');
Route::put('/panel/ranks/update', 'TaskController@updateRank');
Route::post('/panel/ranks/save', 'TaskController@storeRank');
Route::delete('/panel/ranks/delete/{id}', 'TaskController@destroyRank');
Route::get('/panel/ranks/search', 'TaskController@showRank');

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

/**
 * Rutas para el blog
 */
Route::get('/blog/posts/data', 'TaskController@getBloghome');
