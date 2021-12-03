<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Apartment;
use App\Models\User;

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

// require __DIR__.'/users.php';