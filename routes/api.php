<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Apartment;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/apartments', function () {

    $apartments = Apartment::all();
    // dd($apartments);

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
});

Route::post('/apartments', 'ApartmentsController@apartments');

Route::delete('/apartments/{id}', 'ApartmentsController@delete');

Route::get('apartments/{id}', 'ApartmentsController@getApartment');

Route::patch('apartments/{id}', 'ApartmentsController@patchApartment');

// require __DIR__.'/users.php';