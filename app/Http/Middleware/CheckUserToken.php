<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;


class CheckUserToken
{







    public function handle(Request $request, Closure $next)
    {
        if(!User::where('api_token', $request->bearerToken())->exists()){
            return \response('{"errors":{"Authorized":["Not authorized"]}}', 401);
        }

        return $next($request);
    }
}
