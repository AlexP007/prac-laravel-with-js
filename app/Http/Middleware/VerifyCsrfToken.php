<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    protected $error = [
        'eroros' => [
            'auth' => ['erorr token']
        ],
    ];

    protected $except = [
        //
    ];

    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();
        $user = User::where('remember_token', $token)->first();

        if (!$user) {
            return response($this->error, 401);
        }

        return $next($request);
    }
}
