<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse as Response;
use App\Http\Controllers\AbstractApiController as Api;
use Illuminate\Http\Request;

class UserController extends Api
{
	/**
	 * construct
	 */
    public function __construct()
    {
    	parent::__construct();
    }
}
