<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mall extends Model
{
    use SoftDeletes;

    /**
     * get list product category
     * @return array
     */
    public function getList()
    {
        return $this->select('id', 'name', 'image')->orderBy('id', 'desc')->get();
    }
}
