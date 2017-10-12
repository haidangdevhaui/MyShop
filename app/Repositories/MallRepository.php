<?php

namespace App\Repositories;

use App\Models\Mall;
use App\Repositories\Contracts\MallInterface;

class MallRepository extends AbstractRepository implements MallInterface
{

    public function __construct(Mall $mall)
    {
        $this->model = $mall;
    }

	/**
     * get list mall
     * @param string $limit
     * @return array
     */
    public function getList($limit)
    {
        return $this->model->getList($limit);
    }
}
