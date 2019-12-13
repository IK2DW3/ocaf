<?php

Route::get('/', 'OcafController@getIndex');
Route::get('index', 'OcafController@getIndex');

Route::get('mode', 'OcafController@getMode');

Route::put('gamemode/{id}', 'OcafController@getGamemode');

