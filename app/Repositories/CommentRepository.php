<?php

namespace App\Repositories;

use App\Models\Comment;
use App\Repositories\Contracts\CommentInterface;

class CommentRepository extends AbstractRepository implements CommentInterface
{

    public function __construct(Comment $comment)
    {
        $this->model = $comment;
    }

	/**
     * get comments by product id
     * @param  integer  $productId
     * @param  integer  $limit
     * @param  integer $offset
     * @return mixed
     */
    public function getByProductId($productId, $limit, $offset = 0, $parentId = null)
    {
        return $this->model->getByProductId($productId, $limit, $offset, $parentId);
    }
}
