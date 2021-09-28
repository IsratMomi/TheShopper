<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Auth;
class Handler extends ExceptionHandler
{
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        if ($request->is('admin') || $request->is('admin/*')) {
            return redirect()->guest('/login/admin');
        }
        if ($request->is('buyer') || $request->is('buyer/*')) {
            return redirect()->guest('/login/buyer');
        }
        return redirect()->guest(route('login'));
    }
}


/*namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    
    protected $dontReport = [
        //
    ];

   
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }
}*/
