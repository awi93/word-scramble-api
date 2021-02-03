<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Laravel\Passport\Exceptions\OAuthServerException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(\Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function render($request, \Throwable $e)
    {
        if(env('APP_DEBUG')) {
            return parent::render($request, $e);
        }

        Log::error($e->getMessage(), $e->getTrace());

        $status = Response::HTTP_INTERNAL_SERVER_ERROR;
        if ($e instanceof OAuthServerException) {
            $status = Response::HTTP_UNAUTHORIZED;
            $e = new \Dotenv\Exception\ValidationException($e->getMessage(), $status, $e);
        } elseif ($e instanceof HttpResponseException) {
            $status = Response::HTTP_INTERNAL_SERVER_ERROR;
            $e = new HttpException($status, 'http_internal_server_error');
        } elseif ($e instanceof MethodNotAllowedHttpException) {
            $status = Response::HTTP_METHOD_NOT_ALLOWED;
            $e = new MethodNotAllowedHttpException([], 'http_method_not_allowed', $e);
        } elseif ($e instanceof NotFoundHttpException) {
            $status = Response::HTTP_NOT_FOUND;
            $e = new NotFoundHttpException('http_not_found', $e);
        } elseif ($e instanceof AuthorizationException) {
            $status = Response::HTTP_FORBIDDEN;
            $e = new AuthorizationException('http_forbidden', $status);
        } elseif ($e instanceof \Dotenv\Exception\ValidationException && $e->getResponse()) {
            $status = Response::HTTP_BAD_REQUEST;
            $e = new \Dotenv\Exception\ValidationException('http_bad_request', $status, $e);
        } elseif ($e instanceof UnauthorizedHttpException) {
            $status = Response::HTTP_UNAUTHORIZED;
            $e = new \Dotenv\Exception\ValidationException('http_unauthorized', $status, $e);
        } elseif ($e instanceof AuthenticationException) {
            $status = Response::HTTP_UNAUTHORIZED;
            $e = new \Dotenv\Exception\ValidationException('http_unauthorized', $status, $e);
        } else if ($e instanceof ValidationException) {
            $status = Response::HTTP_UNPROCESSABLE_ENTITY;
            return response()->json([
                'error' => 'http_unprocessable_entity',
                'errors' => $e->errors()
            ], $status);
        } elseif ($e instanceof HttpException) {
            $status = $e->getStatusCode();
            switch ($status) {
                case 400:
                    $e = new \Dotenv\Exception\ValidationException('http_bad_request', $status, $e);
                    break;
                case 401:
                    $e = new \Dotenv\Exception\ValidationException('http_unauthorized', $status, $e);
                    break;
                case 403:
                    $e = new \Dotenv\Exception\ValidationException('http_forbidden', $status, $e);
                    break;
                case 404:
                    $e = new \Dotenv\Exception\ValidationException('http_not_found', $status, $e);
                    break;
                case 405:
                    $e = new \Dotenv\Exception\ValidationException('http_method_not_allowed', $status, $e);
                    break;
                case 406:
                    $e = new \Dotenv\Exception\ValidationException('http_not_acceptable', $status, $e);
                    break;
                case 415:
                    $e = new \Dotenv\Exception\ValidationException('http_unsupported_media_type', $status, $e);
                    break;
                case 500:
                    $e = new \Dotenv\Exception\ValidationException('http_internal_server_error', $status, $e);
                    break;
                case 501:
                    $e = new \Dotenv\Exception\ValidationException('http_not_implemented', $status, $e);
                    break;
                default:
                    $e = new \Dotenv\Exception\ValidationException('http_unknown_error', $status, $e);
                    break;
            }
        }
        else {
            $status = Response::HTTP_INTERNAL_SERVER_ERROR;
            $e = new \Dotenv\Exception\ValidationException('http_internal_server_error_two', $status, $e);
        }

        return response()->json([
            'error' => $e->getMessage()
        ], $status);
    }
}
