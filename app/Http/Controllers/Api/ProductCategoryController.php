<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse as Response;
use App\Http\Controllers\ApiController as Api;
use Illuminate\Http\Request;
use App\Repositories\Contracts\ProductCategoryInterface;

class ProductCategoryController extends Api
{
    /**
     * construct
     */
    public function __construct()
    {
        $this->loadRepository('ProductCategory');
    }

    /**
     * get list product category
     * @return json
     */
    public function index(Request $req)
    {
        return Response::success($this->ProductCategory->getList());
    }

    /**
     * get all child product category
     * @param  Request $req
     * @return json
     */
    public function child(Request $req)
    {
        return Response::success($this->ProductCategory->getChildCategoriesByParentId($req->parent_id));
    }
}
