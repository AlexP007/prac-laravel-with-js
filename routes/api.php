<?php

use App\Http\Resources\ApartmentResource;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApartmentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::get('/apartments', fn() => '{"meta":{"page":1,"totalPages":1,"nextPage":null,"prevPage":null},"data":[{"id":18,"rooms":"1","meters":123,"city":"123","address":"123","metro":"123","price":123,"about":null,"images":[]},{"id":11,"rooms":"2","meters":222,"city":"test","address":"test","metro":"test","price":22222,"about":null,"images":[{"id":12,"url":"https:\/\/prac.alexp007.ru\/\/storage\/apartments\/weugyDW9VIOtALO9Sh2e9RTV61CSG7gOTqhsfP2v.png"}]},{"id":14,"rooms":"2","meters":20,"city":"\u041c\u043e\u0441\u043a\u0432\u0430","address":"\u0443\u043b. \u042f\u0431\u043b\u043e\u0447\u043a\u043e\u0432\u0430","metro":"\u0422\u0438\u043c\u043a\u0430","price":5000000,"about":null,"images":[{"id":16,"url":"https:\/\/prac.alexp007.ru\/\/storage\/apartments\/pNNvAgQ68GiRyiZoe36eoSVNjykaeJCz0vZEhPaH.jpg"}]},{"id":4,"rooms":"2","meters":54,"city":"Moc\u043a\u0432\u0430","address":"\u0443\u043b. \u0420\u0443\u0436\u0435\u0439\u043d\u044b\u0439 \u043f\u0435\u0440\u0435\u0443\u043b\u043e\u043a 6","metro":"\u0421\u043c\u043e\u043b\u0435\u043d\u0441\u043a\u0430\u044f","price":8500000,"about":"\u0421\u0442\u0430\u0440\u0435\u043d\u044c\u043a\u0430\u044f, \u043d\u043e \u0445\u043e\u0440\u043e\u0448\u0430\u044f \u043a\u0432\u0430\u0440\u0442\u0438\u0440\u043a\u0430 \u0432 \u0446\u0435\u043d\u0442\u0440\u0435 \u0441\u0442\u043e\u043b\u0438\u0446\u044b.","images":[{"id":4,"url":"https:\/\/prac.alexp007.ru\/\/storage\/apartments\/1wAlV3GS27WDaw7rsTJC7mIYld4Pzyu9XAxHpJVp.png"},{"id":6,"url":"https:\/\/prac.alexp007.ru\/\/storage\/apartments\/le4rSiV6uFTcBseNDemj0rOjkWoRp3fmDBNhJWr7.jpg"},{"id":9,"url":"https:\/\/prac.alexp007.ru\/\/storage\/apartments\/htXlfTikhQVvRwXKekegHvS0tdWTdkasMkRwIRsq.png"},{"id":10,"url":"https:\/\/prac.alexp007.ru\/\/storage\/apartments\/DfxSOs9CYN6SJJf7hJ2v7zhbtJ5oaDGs3VXDuZv9.png"}]},{"id":5,"rooms":"3","meters":74.2,"city":"\u041c\u043e\u0441\u043a\u0432\u0430","address":"\u0443\u043b. \u0423\u0434\u0430\u043b\u044c\u0446\u043e\u0432\u0430 10","metro":"\u041f\u0440\u043e\u0441\u043f\u0435\u043a\u0442 \u0412\u0435\u0440\u043d\u0430\u0434\u0441\u043a\u043e\u0433\u043e","price":12000000,"about":"\u0421\u043e\u0432\u0440\u0435\u043c\u0435\u043d\u043d\u0430 \u043a\u0432\u0430\u0440\u0442\u0438\u0440\u0430 \u0432 \u0437\u0435\u043b\u0435\u043d\u043e\u043c \u0440\u0430\u0439\u043e\u043d\u0435","images":[{"id":5,"url":"https:\/\/prac.alexp007.ru\/\/storage\/apartments\/YMfYaTAaJxQLLVqy8trVaSJSwR7sv2KOIX1pfM1Q.jpg"}]},{"id":15,"rooms":"3","meters":80,"city":"\u041c\u043e\u0441\u043a\u0432\u0430","address":"\u0443\u043b. \u0422\u0432\u0435\u0440\u0441\u043a\u0430\u044f","metro":"\u0422\u0432\u0435\u0440\u0441\u043a\u0430\u044f","price":25000000,"about":null,"images":[{"id":14,"url":"https:\/\/prac.alexp007.ru\/\/storage\/apartments\/86zbtRH3ikiz5Kn7ootCkYXdD9s5ZxrPEcvoaXOl.jpg"},{"id":15,"url":"https:\/\/prac.alexp007.ru\/\/storage\/apartments\/ZiEuDDwVzb9x8kCaDDqdEHMg8SVhoJjQicKt8gGo.jpg"}]},{"id":12,"rooms":"4","meters":90,"city":"\u041c\u043e\u0441\u043a\u0432\u0430","address":"\u0443\u043b. \u041f\u0440\u0430\u0432\u0434\u044b \u0434\u043e\u043c 8","metro":"\u0411\u0435\u043b\u043e\u0440\u0443\u0441\u0441\u043a\u0430\u044f","price":30000000,"about":null,"images":[{"id":13,"url":"https:\/\/prac.alexp007.ru\/\/storage\/apartments\/IyHMXZBZlpcyfT5MXlMKf7rLl0GZxxU8I7jcdzbP.jpg"}]}]}');


*/



Route::get('/apartments/all', 'ApartmentController@all');
Route::get('/apartments/{id}', 'ApartmentController@show');



