<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Apartment,
    User,
    Image
};
use Illuminate\Support\Facades\Storage;

class ApartmentsController extends Controller
{





    public function index()
    {
        return \response(["data" => Apartment::with('images')->get()]);
    }


    public function userIndex(Request $request){

        $token = $request->bearerToken();

        $user = User::where("api_token", $token)->first();

        return \response(["data" => Apartment::where("user_id", $user->id)->get()]);

    }





    public function create()
    {

    }







    public function store(Request $request)
    {
        $data = $request->all();
        $token = $request->bearerToken();
        $user = User::where("api_token", $token)->first();
        $data['user_id'] = $user->id;

        return \response(['data' => Apartment::create($data)], 201);
    }







    public function show($id)
    {
        $apartment = Apartment::with('images')->find($id);

        return \response(["data" => $apartment]);
    }







    public function edit($id)
    {

    }








    public function update(Request $request, $id)
    {
        Apartment::find($id)->update($request->all());
    }







    public function destroy($id)
    {
        Apartment::find($id)->delete();
        return \response(null, 204);
    }

    public function image(Request $request, $id){

        $url = Storage::url($request->file('image')->store($id));

        Image::create(
            [
                "url" => $url,
                "apartment_id" => $id
            ]
        );

        return \response(['data' => ['url' => $url]], 200);


    }
}
