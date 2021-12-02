<?php

    Route::get('/apartments/all', '\App\Http\Controllers\ApartmentsController@index')
        ->name('apartment.all');
    Route::get('/apartments', '\App\Http\Controllers\ApartmentsController@userIndex')
        ->name('apartment.user');
    Route::get('/apartments/{id}', '\App\Http\Controllers\ApartmentsController@show')
        ->name('apartment.item');


    Route::patch('/apartments/{id}', '\App\Http\Controllers\ApartmentsController@update')
        ->name('apartment.patch');


    Route::post('/apartments', '\App\Http\Controllers\ApartmentsController@store')
        ->name('apartment.put');
    Route::post('/apartments/{id}/image', '\App\Http\Controllers\ApartmentsController@image')
        ->name('apartment.image');


    Route::delete('/apartments/{id}', '\App\Http\Controllers\ApartmentsController@destroy')
        ->name('apartment.delete');
