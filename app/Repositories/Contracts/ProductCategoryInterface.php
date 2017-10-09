<?php 

namespace App\Repositories\Contracts;

interface ProductCategoryInterface {

	/**
     * get list product category
     * @return mixed
     */
	public function getList();

	/**
     * get all product category by parent_id
     * @param  integer $parentId
     * @return mixed
     */
	public function getChildCategoriesByParentId($parentId);
}