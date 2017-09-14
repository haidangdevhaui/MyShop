<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use App\Helpers\ResponseApi;
use App\Helpers\ResponseCode;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\JWTException;

class ApiMidlleware
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
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return ResponseApi::error(ResponseCode::CODE_USER_NOT_FOUND, 'User not found');
            }
        } catch (TokenExpiredException $e) {
            try {
                $refreshed = JWTAuth::refresh(JWTAuth::getToken());
                $user = JWTAuth::setToken($refreshed)->toUser();
                header('Authorization: Bearer ' . $refreshed);
            }
            catch (JWTException $e) {
                return ResponseApi::error(ResponseCode::CODE_TOKEN_EXPIRED, 'Token exipred');
            }
        } catch (TokenInvalidException $e) {
            return ResponseApi::error(ResponseCode::CODE_TOKEN_INVALID, 'Token invalid');
        } catch (JWTException $e) {
            return ResponseApi::error(ResponseCode::CODE_TOKEN_ABSENT, 'Token absent');
        }
        return $next($request);
    }
}
