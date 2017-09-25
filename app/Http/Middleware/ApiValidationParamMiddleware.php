<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\ApiRequestHelper;

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
        if ($api->isApiPrefix()) {
            $validator = $api->validate();
        }
        return $next($request);
    }
}
