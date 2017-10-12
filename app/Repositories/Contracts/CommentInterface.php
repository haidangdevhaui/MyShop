<?php 

namespace App\Repositories\Contracts;

interface CommentInterface {

	/**
	 * get comments by product id
	 * @param  integer  $productId
	 * @param  integer  $limit
	 * @param  integer $offset
	 * @return mixed
	 */
	public function getByProductId($productId, $limit, $offset = 0, $parentId = null);
}