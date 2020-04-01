<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

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

        if($exception instanceof TokenBlacklistedException){
            return response(['error' => 'Token can not be used, get new one'], Response::HTTP_BAD_REQUEST);
        }else if ($exception instanceof TokenInvalidException){
            return response(['error' => 'Token is invalid'], Response::HTTP_BAD_REQUEST);
        }else if ($exception instanceof TokenExpiredException){
            return response(['error' => 'Token is Expire'], Response::HTTP_BAD_REQUEST);
        }else if ($exception instanceof JWTException){
            return response(['error' => 'Token is not provided'], Response::HTTP_BAD_REQUEST);
        }
        return parent::render($request, $exception);
    }
}
