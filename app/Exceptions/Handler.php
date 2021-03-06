<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /*
    public function render($request, Exception $exception)
    {
        if($this->isHttpException($exception)){

            switch ($exception->getStatusCode()) {

                case 404:
                    return redirect()->route('404');
                    break;

                case 405:
                    return redirect()->route('405');
                    break;

                case 500:
                    return redirect()->route('500');
                    break;

                default:
                    return $this->renderHttpException($e);
                    break;

            }

        }

        return parent::render($request, $exception);
        
    }
    */

    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }

    
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        $guard = array_get($exception->guards(), 0);

        switch ($guard) {
            case 'admin':
                # code...
                $login = 'admin.login';
                break;
            
            default:
                # code...
                $login = 'login';
                break;
        }

        return redirect()->guest(route('login'));
    }

    
}
