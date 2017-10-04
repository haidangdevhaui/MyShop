<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse as Response;
use App\Http\Controllers\ApiController as Api;
use Illuminate\Http\Request;

class MallController extends Api
{
    /**
     * construct
     */
    public function __construct()
    {
        $this->loadModel('Mall');
    }

    /**
     * get all mall
     * @return json
     */
    public function index(Request $req)
    {
        return Response::success($this->Mall->getList());
    }
}
