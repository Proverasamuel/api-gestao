<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * Uma lista dos inputs que nunca devem aparecer em mensagens de erro de validação.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Registra os callbacks de exceções.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Customiza a resposta para exceções em APIs.
     */
    public function render($request, Throwable $e)
    {
        // Model não encontrado (404)
        if ($e instanceof ModelNotFoundException) {
            return response()->json([
                'message' => 'Recurso não encontrado'
            ], 404);
        }

        // Rota inválida (404)
        if ($e instanceof NotFoundHttpException) {
            return response()->json([
                'message' => 'Rota não encontrada'
            ], 404);
        }

        // Se não for exceção tratada, retorna erro genérico
        return response()->json([
            'message' => $e->getMessage()
        ], 500);
    }

    /**
     * Substitui o redirecionamento padrão para rota [login].
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson() || $request->is('api/*')) {
            return response()->json([
                'message' => 'Não autenticado. Token inválido ou ausente.'
            ], 401);
        }

        // Caso algum dia você use rotas web
        return redirect()->guest(route('login'));
    }
}
