<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Добавляем наш маршрут вебхука в исключения для CSRF-проверки
        $middleware->validateCsrfTokens(except: [
            'webhooks/gumroad'
        ]);

        // ✅ ИЗМЕНЕНИЕ: Добавляем наш middleware в группу 'web', а не глобально
        $middleware->appendToGroup('web', [
            \App\Http\Middleware\TrackUserActivity::class,
            \App\Http\Middleware\SetLocale::class, // <-- ВОТ ЭТА СТРОКА ДОБАВЛЕНА
        ]);


        // Эти строки остаются без изменений
        $middleware->append(\App\Http\Middleware\CheckCookieConsent::class);
        $middleware->append(\App\Http\Middleware\EnsureLocaleForApi::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Этот блок кода мы добавили ранее, он остается без изменений
        $exceptions->renderable(function (Throwable $e, \Illuminate\Http\Request $request) {
            if ($request->is('webhooks/gumroad')) {
                \Illuminate\Support\Facades\Log::error(
                    'Webhook processing error: ' . $e->getMessage(),
                    ['trace' => $e->getTraceAsString()]
                );
                return response()->json([
                    'status' => 'error',
                    'message' => 'An internal server error occurred.',
                ], 500);
            }
        });
    })->create();
