<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
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

    /**
     * get all product category by parent_id
     * @param  integer $parentId
     * @return array
     */
    public function getChildCategoriesByParentId($parentId)
    {
    	return $this->select('id', 'name', 'image')->where('parent_id', $parentId)->orderBy('id', 'desc')->get();
    }
}
