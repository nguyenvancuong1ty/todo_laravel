<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;


class EnsureJWTToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($token = Cookie::get('jwt_token')) {
            $request->headers->set('Authorization', 'Bearer ' . $token);
            Log::channel('all')->warning('Token set: ' . $token);
        }

        return $next($request);
    }

}
