<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AbstractApiController as Api;
use Illuminate\Http\Request;
use App\Repositories\Contracts\ProductCategoryInterface;

class ProductCategoryController extends Api
{
    /**
     * construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->loadRepository('ProductCategory');
    }

    /**
     * get list product category
     * @return json
     */
    public function index(Request $req)
    {
        return $this->response->success($this->ProductCategory->getList());
    }

    /**
     * get all child product category
     * @param  Request $req
     * @return json
     */
    public function child(Request $req)
    {
        return $this->response->success($this->ProductCategory->getChildCategoriesByParentId($req->parent_id));
    }
}
