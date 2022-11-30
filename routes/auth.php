<?php
use App\Http\Resources\ApartmentResource;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApartmentController;



Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');
Route::put('/update/{id}', 'UserController@update');
Route::get('/profile', 'UserController@show')->middleware('auth');;





?>
