<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ApartmentsController;

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

Route::post('/login', [UsersController::class, 'login']);
Route::post('/register', [UsersController::class, 'register']);
Route::post('/update/{user}', [UsersController::class, 'update'])->middleware('VerifyCsrfToken');
Route::get('/logout/{user}', [UsersController::class, 'logout'])->middleware('VerifyCsrfToken');

Route::get('/apartments/all', [ApartmentsController::class, 'index']);
Route::get('/apartments/{apartment}', [ApartmentsController::class, 'show']);
Route::get('/apartments/store', [ApartmentsController::class, 'store'])->middleware('VerifyCsrfToken');
Route::get('/apartments/update/{user}/{apartment}', [ApartmentsController::class, 'update'])->middleware('VerifyCsrfToken');
Route::get('/apartments/delete/{apartment}', [ApartmentsController::class, 'delete'])->middleware('VerifyCsrfToken');
