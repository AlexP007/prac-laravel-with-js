<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class AuthVerifyToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();
        $user = User::where('remember_token', $token)->first();

        $error = [
            'eroros' => [
                'Authorized' => ['Erorr token by Middleware']
            ],
        ];

        if (!$user) {
            return response($error, 401);
        }

        return $next($request);
    }
}
