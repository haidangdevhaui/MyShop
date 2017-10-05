<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mall extends Model
{
    use SoftDeletes;

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
