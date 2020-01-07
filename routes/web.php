<?php

Route::get('/', 'OcafController@getIndex');
Route::get('index', 'OcafController@getIndex');

Route::get('mode', 'OcafController@getMode');

Route::get('gamemode/{id}', 'OcafController@getGamemode');

Route::get('historias','OcafController@getHistorias');

Route::get('historia/{id}', 'OcafController@getHistoria');
