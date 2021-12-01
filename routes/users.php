<?php

use Illuminate\Support\Facades\Route;

Route::get('/reg', 'UsersController@create');

Route::post('/reg/generated', 'UsersController@generatedUser');

Route::get('/profile', 'UsersController@index')->name('profile');

