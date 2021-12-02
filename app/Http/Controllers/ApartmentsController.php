<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Apartment;

class ApartmentsController extends Controller
{
    public function apartments(Request $request)
    {

        $token = $request->bearerToken();
        $user = User::where('remember_token', $token)->first();

        // dd($user->id);

        $request['user_id'] = $user->id;
        $apartment = new Apartment($request->all());

        if($apartment->save()){
            $data = [
            'data' => [
            'address' => $apartment->address,                                  
            'city' => $apartment->city,
            'id' => $apartment->id,
            'meters' => $apartment->meters,
            'metro' => $apartment->metro,
            'price' => $apartment->price,
            'rooms' => $apartment->rooms,
                ],
            ];

            return response($data, 201);
        }

        
    }

    public function delete(Request $request, $id)
    {
        $apartment = Apartment::find($id)->delete();
        return response($apartment, 204);
    }

    public function getApartment(Request $request, $id)
    {
        $apartment = Apartment::find($id);   
        return response($apartment, 200);
    }

    public function patchApartment(Request $request, $id)
    {
        $apartment = Apartment::find($id)->update($request->all());

        return response($apartment, 200);
    }
}
