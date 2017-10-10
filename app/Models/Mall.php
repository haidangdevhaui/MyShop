<?php

namespace App\Models;

class Mall extends AbstractModel
{
    /**
     * get list product category
     * @param string $limit
     * @return array
     */
    public function getList($limit = 15)
    {
        return $this->select('id', 'name', 'image')->orderBy('id', 'asc')->limit($limit)->get();
    }
}
