<?php

namespace App\Models;

class Comment extends AbstractModel
{
    /**
     * get comments by product id
     * @param  integer  $productId
     * @param  integer  $limit
     * @param  integer $offset
     * @param  integer $parentId
     * @return array
     */
    public function getByProductId($productId, $limit, $offset = 0, $parentId = null)
    {
    	$where['comments.product_id'] = $productId;
    	$where['comments.parent_id'] = null;
    	if ($parentId) {
    		$where['comments.parent_id'] = $parentId;
    	}
        return $this
        	->leftJoin('admins', 'comments.admin_id', 'admins.id')
        	->leftJoin('shops', 'comments.shop_id', 'shops.id')
        	->leftJoin('users', 'comments.user_id', 'users.id')
        	->selectRaw('
        		CASE 
        			WHEN comments.admin_id THEN admins.name
        			WHEN comments.shop_id THEN shops.name
        			WHEN comments.user_id THEN users.full_name
        		END as user_comment_name,
        		CASE 
        			WHEN comments.shop_id THEN shops.image
        			WHEN comments.user_id THEN users.avatar
        		END as user_comment_avatar,
        		comments.parent_id,
        		comments.content
        	')
        	->where($where)
        	->limit($limit)
        	->skip($offset)
        	->get()
        	->toArray()
        ;
    }
}
