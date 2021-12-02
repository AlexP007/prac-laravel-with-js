<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{





    public function index()
    {

    }






    public function create()
    {

    }







    public function store(UserStoreRequest $request)
    {
        if ($user = User::create([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'remember_token' => Str::random(60),
        ]) ) {
            return \response(["data" => $user], 201);
        }
    }


    public function auth(Request $request){

        $user = User::where('email', $request->input('email'))->first();


        if(is_null($user)){
            return \response(["data" => ["msg" => "User does not exist"]],422);
        }

        if(Hash::check($request->input('password'), $user->password)){

            $user->api_token = Hash::make("");
            $user->save();

            return \response(["data" => $user]);
        }else{
            return \response(["data" => ["msg" => "Password wrong"]],422);
        }

        return $user;



    }

    public function edit($id)
    {

    }

    public function update(Request $request)
    {
        $user = User::where('api_token', $request->bearerToken())->first();
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return \response(["data" => $user],200);
    }

    public function destroy($id)
    {

    }
}
