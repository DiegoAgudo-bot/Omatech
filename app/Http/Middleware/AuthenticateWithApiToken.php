<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateWithApiToken
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
        if($request->api_token) {
            $user = User::where('api_token', $request->api_token)->first();
            if($user) {
                return $next($request);
            }
        }

        return response()->json(['retCode' => Response::HTTP_FORBIDDEN, 'data' => [], 'message' => 'Unauthorized'], Response::HTTP_FORBIDDEN);
    }
}
