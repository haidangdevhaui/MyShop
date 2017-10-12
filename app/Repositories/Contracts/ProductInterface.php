<?php 

namespace App\Repositories\Contracts;

interface ProductInterface {

	/**
     * get suggest list product
     * @param integer $limit 
     * @return mixed
     */
	public function getSuggestList($limit, $offset, $categoryId = null);

	/**
	 * get product detail
	 * @param  integer $productId
	 * @return mixed            
	 */
	public function getDetail($productId);
}