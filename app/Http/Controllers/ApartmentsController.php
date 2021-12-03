<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\User;
use Illuminate\Http\Request;

class ApartmentsController extends Controller
{
    protected $error = [
        'eroros' => [
            'app' => ['erorr app']
        ],
    ];

    public function index()
    {
        $apartments = Apartment::all();
        return $apartments ? ('{"meta":{"page":1,"totalPages":1,"nextPage":null,"prevPage":null},"data":' . $apartments->toJson() . '}') :
            '{"meta":{"page":1,"totalPages":1,"nextPage":null,"prevPage":null},"data":[{"id":13,"rooms":"4","meters":55,"city":"11","address":"22","metro":"33","price":66,"about":null,"images":[]},{"id":11,"rooms":"2","meters":222,"city":"test","address":"test","metro":"test","price":22222,"about":null,"images":[{"id":12,"url":"https:\/\/prac.alexp007.ru\/\/storage\/apartments\/weugyDW9VIOtALO9Sh2e9RTV61CSG7gOTqhsfP2v.png"}]},{"id":4,"rooms":"2","meters":54,"city":"Moc\u043a\u0432\u0430","address":"\u0443\u043b. \u0420\u0443\u0436\u0435\u0439\u043d\u044b\u0439 \u043f\u0435\u0440\u0435\u0443\u043b\u043e\u043a 6","metro":"\u0421\u043c\u043e\u043b\u0435\u043d\u0441\u043a\u0430\u044f","price":8500000,"about":"\u0421\u0442\u0430\u0440\u0435\u043d\u044c\u043a\u0430\u044f, \u043d\u043e \u0445\u043e\u0440\u043e\u0448\u0430\u044f \u043a\u0432\u0430\u0440\u0442\u0438\u0440\u043a\u0430 \u0432 \u0446\u0435\u043d\u0442\u0440\u0435 \u0441\u0442\u043e\u043b\u0438\u0446\u044b.","images":[{"id":4,"url":"https:\/\/prac.alexp007.ru\/\/storage\/apartments\/1wAlV3GS27WDaw7rsTJC7mIYld4Pzyu9XAxHpJVp.png"},{"id":6,"url":"https:\/\/prac.alexp007.ru\/\/storage\/apartments\/le4rSiV6uFTcBseNDemj0rOjkWoRp3fmDBNhJWr7.jpg"},{"id":9,"url":"https:\/\/prac.alexp007.ru\/\/storage\/apartments\/htXlfTikhQVvRwXKekegHvS0tdWTdkasMkRwIRsq.png"},{"id":10,"url":"https:\/\/prac.alexp007.ru\/\/storage\/apartments\/DfxSOs9CYN6SJJf7hJ2v7zhbtJ5oaDGs3VXDuZv9.png"}]},{"id":5,"rooms":"3","meters":74.2,"city":"\u041c\u043e\u0441\u043a\u0432\u0430","address":"\u0443\u043b. \u0423\u0434\u0430\u043b\u044c\u0446\u043e\u0432\u0430 10","metro":"\u041f\u0440\u043e\u0441\u043f\u0435\u043a\u0442 \u0412\u0435\u0440\u043d\u0430\u0434\u0441\u043a\u043e\u0433\u043e","price":12000000,"about":"\u0421\u043e\u0432\u0440\u0435\u043c\u0435\u043d\u043d\u0430 \u043a\u0432\u0430\u0440\u0442\u0438\u0440\u0430 \u0432 \u0437\u0435\u043b\u0435\u043d\u043e\u043c \u0440\u0430\u0439\u043e\u043d\u0435","images":[{"id":5,"url":"https:\/\/prac.alexp007.ru\/\/storage\/apartments\/YMfYaTAaJxQLLVqy8trVaSJSwR7sv2KOIX1pfM1Q.jpg"}]},{"id":12,"rooms":"4","meters":90,"city":"\u041c\u043e\u0441\u043a\u0432\u0430","address":"\u0443\u043b. \u041f\u0440\u0430\u0432\u0434\u044b \u0434\u043e\u043c 8","metro":"\u0411\u0435\u043b\u043e\u0440\u0443\u0441\u0441\u043a\u0430\u044f","price":30000000,"about":null,"images":[{"id":13,"url":"https:\/\/prac.alexp007.ru\/\/storage\/apartments\/IyHMXZBZlpcyfT5MXlMKf7rLl0GZxxU8I7jcdzbP.jpg"}]}]}';
    }

    public function store(Request $request, User $user)
    {
        $request->user_id = $user->id;
        $apartment = new Apartment($request->all());

        if($apartment->save()){
            return $this->show($apartment);
        }

        return response($this->error, 204);
    }

    public function show(Apartment $apartment)
    {
        $apartment->images = array();
        return '{"data":' . $apartment->toJson() . '}';
    }

    public function update(Request $request, User $user, Apartment $apartment = null)
    {
        if (!$apartment) {
            return $this->store($request, $user);
        } else {
            $apartment->update($request->all());
            return $this->show($apartment);
        }
    }

    public function delete(Apartment $apartment)
    {
        if ($apartment->delete()) {
            redirect('/login');
        }

        return response($this->error, 204);
    }

}
