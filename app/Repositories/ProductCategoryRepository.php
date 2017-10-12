<?php

namespace App\Repositories;

use App\Models\ProductCategory;
use App\Repositories\Contracts\ProductCategoryInterface;

class ProductCategoryRepository extends AbstractRepository implements ProductCategoryInterface
{

    public function __construct(ProductCategory $category)
    {
        $this->model = $category;
    }

	/**
     * get list product category
     * @return array
     */
    public function getList()
    {
        return $this->model->getList();
    }

    /**
     * get all product category by parent_id
     * @param  integer $parentId
     * @return array
     */
    public function getChildCategoriesByParentId($parentId)
    {
        return $this->model->getChildCategoriesByParentId($parentId);
    }

}
