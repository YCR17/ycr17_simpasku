<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Response;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        api: __DIR__ . '/../routes/api.php',
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'api.auth' => App\Http\Middleware\Api\Auth::class,
            'web.auth.guest' => App\Http\Middleware\Web\AuthGuest::class,
            'web.auth.user' => App\Http\Middleware\Web\AuthUser::class,
            'web.access.onlyrole' => App\Http\Middleware\Web\OnlyRole::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        if (strpos(request()->url(), url('api')) !== false) {
            $exceptions->respond(function (Response $response, $exception) {
                $statusCode = $response->getStatusCode();
                // $plainStatus = ApiResponse::$statusTexts[$statusCode];
                $errors = null;

                if (config('app.debug')) {
                    $errors = [
                        "message" => $exception->getMessage(),
                        "trace" => $exception->getTrace()
                    ];
                }

                return response()->json([
                    'status' => false,
                    'message' => "Error $statusCode",
                    "error" => $errors
                ]);

                // return ApiResponse::message($plainStatus)->statusCode($statusCode)->error($errors)->failed()->send();
            });
        }
    })->create();
