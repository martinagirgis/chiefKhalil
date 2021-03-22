<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{

    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    public function render($request, Throwable $exception)
    {
        return parent::render($request, $exception);
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {

        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        if ($request->is('en/admin') || $request->is('en/admin/*') || $request->is('ar/admin') || $request->is('ar/admin/*')) {
            return redirect()->guest(route('admin.login'));
        }

        if ($request->is('en/chief') || $request->is('en/chief/*') || $request->is('ar/chief') || $request->is('ar/chief/*')) {
            return redirect()->guest(route('chief.login'));
        }

        return redirect()->guest(route('login'));
    }
}