<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', 'UsersController@register');

Route::post('/login', 'UsersController@login');

Route::post('/update', 'UsersController@update')->middleware('auth');