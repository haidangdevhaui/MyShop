<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController as Api;
use Illuminate\Http\Request;
use App\Helpers\ResponseApi as Response;
use App\Helpers\ResponseCode;
use App\Helpers\ValidationApi;

class TestController extends Api
{
	/**
	 * success action
	 * @param  Request $req
	 * @return json
	 */
    public function success(Request $req)
    {
    	$response = [
            'user' => [
                'full_name' => 'Vu Hai Dang',
                'email'     => 'haidangdevhaui@gmail.com',
            ],
        ];
        return Response::success($response);
    }

    /**
     * error action
     * @param  Request $req
     * @return json
     */
    public function error(Request $req)
    {
        return Response::error(ResponseCode::CODE_SERVER_INTERNAL_ERROR, 'Server internal error');
    }

    /**
     * with param action
     * @param  Request $req
     * @return json
     */
    public function param(Request $req)
    {
    	$validator = ValidationApi::validateTestParam($req->all());
    	if (!$validator->passes()) {
    		// using log, see "storage/logs/laravel.log"
    		\Illuminate\Support\Facades\Log::error($validator->errors());
    		return Response::error(ResponseCode::CODE_PARAMETER_INVALID, 'error param message');
    	}
    	return Response::success();
    }
}
