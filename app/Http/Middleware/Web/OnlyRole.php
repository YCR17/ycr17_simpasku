<?php

namespace App\Http\Middleware\Web;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OnlyRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!auth()->check()) {
            return redirect()->route('web.auth.login');
        }

        $user = auth()->user();

        if (!in_array($user->role, $roles)) {
            return redirect('dashboard')->with([
                'flash_message' => [
                    [
                        'type' => 'error',
                        'title' => 'Forbidden Access',
                        'message' => 'You has no access to this resource'
                    ]
                ]
            ]);
        }
        return $next($request);
    }
}
