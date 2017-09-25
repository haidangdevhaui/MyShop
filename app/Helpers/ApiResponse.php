<?php
namespace App\Helpers;

use App\Helpers\ApiResponseCode;
use Response;

class ApiResponse
{

    /**
     * response success
     * @param  array $data
     * @return json
     */
    public static function success(array $data = [])
    {
        $response = ['success' => ResponseCode::CODE_SUCCESS];
        if ($data) {
            $response['data'] = $data;
        }
        return Response::json($response);
    }

    /**
     * response error
     * @param  string $errorCode
     * @param  string $errorMessage
     * @return json
     */
    public static function error(string $errorCode, string $errorMessage)
    {
        return Response::json([
            'error_code'    => $errorCode,
            'error_message' => $errorMessage,
        ]);
    }
}
