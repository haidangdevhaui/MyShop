<?php
namespace App\Repositories;

class ProductCategoryRepository extends AbstractRepository implements ProductCategoryInterface
{
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
