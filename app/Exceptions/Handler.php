<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (Throwable $exception) {
            if (request()->is('api*'))
            {
                if ($exception instanceof ModelNotFoundException)
                    return response()->json(['error' => 'Recurso no encontrado'],404);
                else if ($exception instanceof ValidationException)
                    //Pra que te devuelva los errores que lo buscamos debes de hacer esto:
                    return response()->json(['error'=>$exception->errors()],400);
                   // return response()->json(['error' => 'Datos no válidos: :' .$exception->getMessage()], 400);
                else if ($exception instanceof QueryException)
                    return response()->json(['error' => 'Error SQL:' .$exception->getMessage()], 400);
                else if (isset($exception))
                    return response()->json(['error' => 'Error aplicacion: ' . $exception->getMessage()],500);
            }
        });
    }
}
