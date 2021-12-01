<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserPostGeneratedRequest;

class UsersController extends Controller
{
    public function create()
    {
        return 'Страница регистрации';
    }

    public function register(UserPostGeneratedRequest $request)
    {

        $validate = $request->validated();
        $user = new User($validate);

        $token = $user->generateAndSaveToken();

        if($user->save()){
            
            $data = [
                'data' => [
                    'api_token' => $token,
                    'email' =>  $user->email,
                    'id' =>  $user->id,
                    'name' =>  $user->name,
                    'surname' =>  $user->surname,
                ]
            ];

            return response($data, 201);
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

        $error = [
            'eroros' => [
                'Authorized' => ['Not authorized']
            ],
        ];

        if (!$user) {
            return response($error, 401);
        }

        $validate = $request->validated();

        // dd($validate);

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

        // проверяем есть ли такой токен, если есть все хорошо, если нет то вернули 401 ошибку        
        
        return response($error, 401);
    }

}

