<?php

namespace App\Http\Middleware\Api;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // return $next($request);
        if (!$request->exists('api_key')) {
            return response()->json([
                'status' => false,
                'message' => 'No access to this resources',
                'status_code' => Response::HTTP_UNAUTHORIZED
            ]);
        }

        $apiKey = $request->input('api_key');
        return $next($request);
    }
}
