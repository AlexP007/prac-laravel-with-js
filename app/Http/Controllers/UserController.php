<?php

namespace App\Http\Controllers;

use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Psy\Readline\Hoa\Readline;

class UserController extends Controller
{

   public function register(Request $request)
   {
       $validator = Validator::make($request->all(), [
           'name' => 'required|min:2|max:100',
           'surname' => 'required|min:2|max:100',
           'email' => 'required|email|unique:users',
           'password' => 'required|min:6|max:100',
          // 'confirm_password' => 'required|same:password',
       ]);

       if ( $validator->fails() ) {
           return response()->json([
               'message' => 'Validation fails',
               'errors' => $validator->errors()
           ], 422);
       }

       $user = User::create([
           'name' => $request->name,
           'surname' => $request->surname,
           'email' => $request->email,
           'password' => Hash::make($request->password),
           'api_token' => Str::random(80),
       ]);

       return response()->json([
          // 'message' => 'Registration successfull',
           'data' => new UserResource($user),
       ], 201);
   }

   public function login(Request $request)
   {
       $validator = Validator::make($request->all(), [
           'email' => 'required|email',
           'password' => 'required',
       ]);

       if ( $validator->fails() ) {
           return response()->json([
               'message' => 'Validation filed',
               'errors' => $validator->errors(),
           ], 422);
       }

       $user = User::where('email', $request->email)->first();

       if ($user) {
           if ( Hash::check($request->password, $user->password) ) {
               return response()->json([
                   'message' => 'Login successfull',
                   'data' => new UserResource($user)
               ], 201);
           } else {
               return response()->json([
                   'message' => 'Incorrect credentionals',
                   'errors' => $validator->errors(),
               ], 400);
           }
       } else {
           return response()->json([
               'message' => 'Incorrect credentionals',
               'errors' => $validator->errors(),
           ], 400);
       }

   }

    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            //'message' => 'The user has been udated',
            'data' => new UserResource($user),
            ], 200);
    }


    public function show($id)
    {
        return new UserResource(Apartment::findOrFail($id));
    }
}
