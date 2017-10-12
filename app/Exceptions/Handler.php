<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use App\Helpers\ApiResponse as Response;
use App\Helpers\ApiResponseCode as Code;
use App\Helpers\Message;
use App\Helpers\ApiRequestHelper;
use Illuminate\Support\Facades\Log;

class Handler extends ExceptionHandler
{
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
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if (env('API_DEBUG')) {
            if ((new ApiRequestHelper($request))->isApiPrefix()) {
                Log::useDailyFiles(storage_path().'/logs/api');
                Log::error($exception);
                return (new Response)->error(Code::CODE_SERVER_INTERNAL_ERROR, Message::ERROR_SERVER_INTERNAL);
            }
        }
        return parent::render($request, $exception);
    }

    /**
     * unauthenticated
     * @param  Request $request
     * @param  AuthenticationException $exception
     * @return json
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return (new Response)->error(Code::CODE_AUTH_ERROR, 'You have not...');
    }
}
