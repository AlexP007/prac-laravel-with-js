<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserPostGeneratedRequest;

class UsersController extends Controller
{

    public function register(UserPostGeneratedRequest $request)
    {

        $validate = $request->validated();
        $user = new User($validate);

        // $token = $user->generateAndSaveToken();

        if($user->save()){
            
            // $data = [
            //     'data' => [
            //         'api_token' => $token,
            //         'email' =>  $user->email,
            //         'id' =>  $user->id,
            //         'name' =>  $user->name,
            //         'surname' =>  $user->surname,
            //     ]
            // ];

            // return response($data, 201);

            return $user->getData($user);
        }
        
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = User::where('email', $email)->first();

        if($user->password === $password){
            $token = $user->generateAndSaveToken();

                $data = [
                    'data' => [
                        'api_token' => $token,
                        'email' => $user->email,
                        'id' => $user->id,
                        'name' => $user->name,
                        'surname' => $user->surname,
                    ]
                ];
    
                return response($data, 201);
        }
    }

    public function update(UserPostGeneratedRequest $request)
    {
        
        $token = $request->bearerToken();
        $user = User::where('remember_token', $token)->first();

        $validate = $request->validated();

        $user->name = $validate['name'];
        $user->password = $validate['password'];
        $user->surname = $validate['surname'];

        $token = $user->generateAndSaveToken();

        $data = [
            'data' => [
                'api_token' => $token,
                'email' => $user->email,
                'id' => $user->id,
                'name' => $user->name,
                'surname' => $user->surname,
            ]
        ];            
        
        return $data;
    }

    public function profile()
    {
        return 'Страница пользователя';
    }

}

