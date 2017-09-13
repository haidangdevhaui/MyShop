<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseApi as Response;
use App\Helpers\ResponseCode;
use App\Helpers\ValidationApi;
use App\Http\Controllers\ApiController as Api;
use App\Models\Authentication;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use JWTAuth;

class AuthenticateController extends Api
{
    use AuthenticatesUsers;
    /**
     * login action
     * @param  Request $req
     * @return json
     */
    public function login(Request $req)
    {
        $credentials = $req->only('email', 'password');
        $validator   = ValidationApi::validateLogin($credentials);
        if (!$validator->passes()) {
            return Response::error(ResponseCode::CODE_PARAMETER_INVALID, 'error param message');
        }
        if (!$token = JWTAuth::attempt($credentials)) {
            return Response::error(ResponseCode::CODE_AUTH_EMAIL_OR_PASSWORD_INVAILD, 'Invalid email or password');
        }
        return Response::success(['api_token' => $token]);
    }

    /**
     * register action
     * @param  Request $req
     * @return json
     */
    public function register(Request $req)
    {

    }
}
