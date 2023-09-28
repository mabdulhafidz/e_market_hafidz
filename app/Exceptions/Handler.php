<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

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

    // protected function prepareException(Exception $e) 
    // {
    //         if ($e instanceof ModelNotFoundException) {
    //             $e = new NotFoundHttpException($e->getMessage(), $e);
    //         } elseif ($e instanceof AuthorizationException) {
    //             $e = new AccessDeniedException($e->getMessage(), $e);
    //         } elseif ($e instanceof TokenMismatchException) {
    //               return redirect()->route('login');
    //         }
    //         return $e;
    // }
    

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }


}
