<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseApi as Response;
use App\Helpers\ResponseCode;
use App\Helpers\ValidationApi;
use App\Http\Controllers\ApiController as Api;
use App\User;
use Exception;
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
        try {
            $credentials = $req->only('email', 'password');
            $validator   = ValidationApi::validateLogin($credentials);
            if (!$validator->passes()) {
                return Response::error(ResponseCode::CODE_PARAMETER_INVALID, 'error param message');
            }
            if (!$token = JWTAuth::attempt($credentials)) {
                return Response::error(ResponseCode::CODE_AUTH_EMAIL_OR_PASSWORD_INVAILD, 'Invalid email or password');
            }
            return Response::success(['api_token' => $token]);
        } catch (Exception $e) {
            return Response::error(ResponseCode::CODE_SERVER_INTERNAL_ERROR, 'Server internal error');
        }
    }

    /**
     * register action
     * @param  Request $req
     * @return json
     */
    public function register(Request $req)
    {
        try {
            $data      = $req->only('full_name', 'email', 'password');
            $validator = ValidationApi::validateRegister($data);
            if (!$validator->passes()) {
                return Response::error(ResponseCode::CODE_PARAMETER_INVALID, 'error param message');
            }
            $data['password'] = \Hash::make($data['password']);
            if (User::insert($data)) {
                return $this->login($req);
            }
            return Response::error(ResponseCode::CODE_SERVER_INTERNAL_ERROR, 'Server internal error');
        } catch (Exception $e) {
            return Response::error(ResponseCode::CODE_SERVER_INTERNAL_ERROR, 'Server internal error');
        }
    }
}
