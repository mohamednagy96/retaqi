<?php

namespace App\Exceptions;

use App\Http\Controllers\Api\CoreJsonResponse;
use Dotenv\Exception\ValidationException;
use ErrorException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Throwable;

class Handler extends ExceptionHandler
{
    use CoreJsonResponse;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
     {
    //     if ($request->isJson() || ($request->headers->get('accept') == "application/json")) {

    //         if ($exception instanceof ErrorException) {
    //             return $this->serverError();
    //         }

    //         if ($exception instanceof ModelNotFoundException) {
    //             return $this->notFound();
    //         }

    //         if ($exception instanceof MethodNotAllowedException) {
    //             return $this->notFound();
    //         }

    //         if ($exception instanceof AuthenticationException) {
    //             return $this->unauthorized();
    //         }

    //         if ($exception instanceof AuthorizationException) {
    //             return $this->forbidden();
    //         }

    //         if ($exception instanceof ValidationException) {
    //             return $this->invalidRequest($exception->validator->getMessageBag()->toArray());
    //         }

    //         return $this->serverError();
    //     }

        return parent::render($request, $exception);
    }
}
