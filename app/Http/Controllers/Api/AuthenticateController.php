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
        try {
            $credentials = $req->input();
            // $check   = $this->checkValidation($credentials, ValidationRule::LOGIN_RULE);
            // if (!$check->validator) {
            //     return $check->result;
            // }
            // if (!$check->result->passes()) {
            //     return Response::error(Code::CODE_PARAMETER_INVALID, Message::ERROR_PARAM_INVALID);
            // }
            if (!$token = JWTAuth::attempt($credentials)) {
                return Response::error(Code::CODE_AUTH_EMAIL_OR_PASSWORD_INVAILD, Message::ERROR_EMAIL_OR_PASSWORD_INVALID);
            }
            return Response::success(['api_token' => $token]);
        } catch (Exception $e) {
            return Response::error(Code::CODE_SERVER_INTERNAL_ERROR, Message::ERROR_SERVER_INTERNAL);
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
                return Response::error(ResponseCode::CODE_PARAMETER_INVALID, Message::ERROR_PARAM_INVALID);
            }
            $data['password'] = \Hash::make($data['password']);
            if (User::insert($data)) {
                return $this->login($req);
            }
            return Response::error(ResponseCode::CODE_SERVER_INTERNAL_ERROR, Message::ERROR_SERVER_INTERNAL);
        } catch (Exception $e) {
            return Response::error(ResponseCode::CODE_SERVER_INTERNAL_ERROR, Message::ERROR_SERVER_INTERNAL);
        }
    }
}
