<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Auth\AuthenticationException; // Importa AuthenticationException
use Illuminate\Http\Request;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
{
    $this->renderable(function (AuthenticationException $exception, Request $request) {
        if ($request->is('api/*')) {
            return response()->json([
                'message' => 'Unauthenticated.',
                'status' => 401,
                'Description' => 'Missing or Invalid Access Token'
            ], 401);
        }
    });


        /*$this->renderable(function(ValidationException $exception, CategoryRequest $request) {
            if ($request->is('api/*')) {

                $errors = $exception->errors();
                return response()->json(['errors' => $errors]);

            }
        });*/
    }
}
