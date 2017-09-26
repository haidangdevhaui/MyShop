<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController as Api;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Exception, Validator, JWTAuth;
use App\User;
use App\Helpers\ApiResponse as Response;
use App\Helpers\ApiResponseCode as Code;
use App\Helpers\Message;

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
        $credentials = $req->input();
        if (!$token = JWTAuth::attempt($credentials)) {
            return Response::error(Code::CODE_AUTH_EMAIL_OR_PASSWORD_INVAILD, Message::ERROR_EMAIL_OR_PASSWORD_INVALID);
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
        $data      = $req->only('full_name', 'email', 'password');
        $data['password'] = \Hash::make($data['password']);
        if (User::insert($data)) {
            return $this->login($req);
        }
    }
}
