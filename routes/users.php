<?php

use Illuminate\Support\Facades\Route;

Route::get('/reg', 'UsersController@create');

Route::get('/profile', 'UsersController@index')->name('profile');

