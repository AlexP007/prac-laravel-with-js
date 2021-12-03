<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserTokenRequest;

class UsersController extends Controller
{
    protected $error = [
        'eroros' => [
            'auth' => ['erorr auth']
        ],
    ];

    private function show(User $user)
    {
        $user->api_token = $user->setToken();
        return '{"data":' . $user->toJson() . '}';
    }

    public function register(UserTokenRequest $request)
    {
        $validate = $request->validated();
        $user = new User($validate);

        if ($user->save()) {
            return $this->show($user);
        }

        return response($this->error, 401);
    }

    public function login(UserTokenRequest $request)
    {
        $validate = $request->validated();

        $email = $validate['name'];
        $password = $validate['password'];
        $user = User::where('email', $email)->first();

        if ($user->password === $password) {
            return $this->show($user);
        }

        return response($this->error, 401);
    }

    public function update(UserTokenRequest $request, User $user)
    {
        $validate = $request->validated();

        $user->name = $validate['name'];
        $user->password = $validate['password'];

        if ($user->save()) {
            return $this->show($user);
        }

        return response($this->error, 401);
    }

    public function logout(UserTokenRequest $request, User $user)
    {
        if ($request->validated()) {
            $user->unsetToken();
            return $this->show($user);
        }

        return response($this->error, 401);
    }

}
