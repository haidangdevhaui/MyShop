<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\ApiRequestHelper;
use App\Helpers\ApiResponseCode;
use App\Helpers\ApiResponse;
use App\Helpers\Message;

class ApiValidationParamMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $api = new ApiRequestHelper($request);
        if ($api->isApiPrefix() && !$api->validate()) {
            return ApiResponse::error(ApiResponseCode::CODE_PARAMETER_INVALID, Message::ERROR_PARAM_INVALID);
        }
        return $next($request);
    }
}
