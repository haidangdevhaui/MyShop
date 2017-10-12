<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiTrait;
use App\Helpers\ApiResponse as Response;

abstract class AbstractApiController extends Controller
{
	use ApiTrait;

	public function __construct()
	{
		$this->response = new Response;
	}
}
