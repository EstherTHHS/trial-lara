<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $startTime = microtime(true);
        $storedToken = session('authData');


        if (!$request->hasHeader('Authorization')) {
            return response()->error($request, null, 'Missing bearer token', 401, $startTime);
        }

        $bearerToken = $request->header('Authorization');
        $accessToken = str_replace('bearerToken ', '', $bearerToken);
        $requestEmail = $request->header('email');

        if ($accessToken !== $storedToken['accessToken']) {
            return response()->error($request, null, 'Invalid access token', 401, $startTime);
        }

        return $next($request);
    }
}
