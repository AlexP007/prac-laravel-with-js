<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\CarPostStoreRequest;

class UsersController extends Controller
{
    public function create()
    {
        return 'Страница регистрации';
    }

    public function generatedUser(CarPostStoreRequest $request)
    {

        $validate = $request->validated();
        $user = new User($validate);

        if($user->save()){
            return redirect()
                ->route('profile')
                ->createToken($request->token_name);
        }
         
        
    }

    public function index()
    {
        return 'Здесь страница пользователя';
    }
}
