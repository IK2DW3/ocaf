<?php

Route::get('/', 'OcafController@getIndex');
Route::get('index', 'OcafController@getIndex');

Route::get('mode', 'OcafController@getMode');

Route::get('gamemode/{id}', 'OcafController@getGamemode');

