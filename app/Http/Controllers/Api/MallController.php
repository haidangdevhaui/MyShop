<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AbstractApiController as Api;
use Illuminate\Http\Request;

class MallController extends Api
{
    /**
     * construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Config');
        $this->loadRepository('Mall');
    }

    /**
     * get all mall
     * @return json
     */
    public function index(Request $req)
    {
        $limit = $req->limit ? $req->limit : $this->Config->getMallLimit();
        return $this->response->success($this->Mall->getList($limit));
    }
}
