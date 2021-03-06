<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse as Response;
use App\Http\Controllers\AbstractApiController as Api;
use Illuminate\Http\Request;

class SaleController extends Api
{
	public function __construct()
	{
		parent::__construct();
		$this->loadRepository('SaleDetail');
		$this->loadModel('Config');
	}

	/**
	 * get list flash sale
	 * @return json
	 */
    public function index(Request $req)
    {
    	$limit = $req->limit ? $req->limit : $this->Config->getFlashSaleLimit();
    	return $this->response->success($this->SaleDetail->getFlashSaleList($limit));
    }
}
