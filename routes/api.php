<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Apartment;
use App\Models\User;


Route::get('/apartments/all', 'ApartmentsController@all');

Route::get('/apartments', function (Request $request) {

    $token = $request->bearerToken();
    $user = User::where('remember_token', $token)->first();
    $apartments = Apartment::where('user_id', $user->id)->get();

    $response = [
        'meta' => [
            'page' => 1,
            'totalPages' => 1,
            'nextPage' => null,
            'prevPage' => null,
        ],

        'data' => $apartments,
    ];

    return $response;
})->middleware('verifyToken');

Route::post('/apartments', 'ApartmentsController@apartments');

Route::delete('/apartments/{id}', 'ApartmentsController@delete');

Route::get('apartments/{id}', 'ApartmentsController@get');

Route::patch('apartments/{id}', 'ApartmentsController@patch');

Route::post('/apartments/{id}/image', 'ImagesController@images');