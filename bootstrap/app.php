<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php', // Подключаем API
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Настройка доверенных прокси 
        $middleware->trustProxies(at: '*');
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Настройка обработки исключений
        $exceptions->respond(function ($response, $Throwable, $request) {
            if ($request->is('api/*')) {
                // Гарантируем, что ошибки возвращаются в JSON для API
                if (!$response->headers->has('Content-Type') || 
                    str_contains($response->headers->get('Content-Type'), 'html')) {
                    return response()->json([
                        'message' => $response->getContent(), 
                        'error' => true
                    ], $response->status());
                }
            }
            return $response;
        });
    })->create();