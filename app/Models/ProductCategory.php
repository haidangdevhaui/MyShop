<?php

namespace App\Models;

class ProductCategory extends AbstractModel
{
    /**
     * get list product category
     * @return array
     */
    public function getList()
    {
        return $this->select('id', 'name', 'image')->orderBy('id', 'asc')->get();
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
