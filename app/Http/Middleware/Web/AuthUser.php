<?php

namespace App\Http\Middleware\Web;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('web.auth.login')->with([
                'flash_message' => [
                    [
                        'type' => 'info',
                        'title' => 'Not logged',
                        'message' => 'Youre not logged'
                    ]
                ]
            ]);
        }
        return $next($request);
    }
}
