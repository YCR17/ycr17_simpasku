<?php

namespace App\Http\Middleware\Web;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthGuest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            return redirect(url('dashboard'))->with([
                'flash_message' => [
                    [
                        'type' => 'info',
                        'title' => 'Already logged',
                        'message' => 'Youre has already logged'
                    ]
                ]
            ]);
        }
        return $next($request);
    }
}
