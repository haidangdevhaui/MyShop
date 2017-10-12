<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AbstractApiController as Api;
use Illuminate\Http\Request;

class CommentController extends Api
{
    /**
     * construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Config');
        $this->loadRepository('Comment');
    }

    /**
     * get comment action
     * @param  Request $req
     * @return json
     */
    public function index(Request $req)
    {
        $limit = $req->limit ? $req->limit : 10;
        return $this->response->success($this->Comment->getByProductId($req->product_id, $limit, $req->offset, $req->parent_id));
    }
}
