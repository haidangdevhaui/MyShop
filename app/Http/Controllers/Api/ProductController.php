<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AbstractApiController as Api;
use Illuminate\Http\Request;

class ProductController extends Api
{
    /**
     * construct
     */
    public function __construct()
    {
    	parent::__construct();
    	$this->loadModel('Config');
    	$this->loadRepository('Product');
    }

    /**
     * action get list suggest product
     * @param  Request $req
     * @return json
     */
    public function suggest(Request $req)
    {
        $limit = $req->limit ? $req->limit : $this->Config->getFlashSaleLimit();
    	return $this->response->success($this->Product->getSuggestList($limit, $req->offset));
    }

    /**
     * action get product detail
     * @param  integer $productId
     * @return object
     */
    public function detail($productId)
    {
        return $this->response->success($this->Product->getDetail($productId));
    }
}
