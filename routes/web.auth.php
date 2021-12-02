<?php

    Route::post('/auth/register', 'App\Http\Controllers\UsersController@store')
        ->name('auth.register');
    Route::post('/auth/login', 'App\Http\Controllers\UsersController@auth')
        ->name('auth.login');
    Route::post('/auth/update', 'App\Http\Controllers\UsersController@update')
        ->name('auth.update');

