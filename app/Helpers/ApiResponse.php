<?php
namespace App\Helpers;

use App\Helpers\ApiResponseCode as Code;
use Response;

class ApiResponse
{

    /**
     * response success
     * @param  array $data
     * @return json
     */
    public function success($data = [])
    {
        $response = ['success' => Code::CODE_SUCCESS];
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
    public function error(string $errorCode, string $errorMessage)
    {
        return Response::json([
            'error_code'    => $errorCode,
            'error_message' => $errorMessage,
        ]);
    }
}
