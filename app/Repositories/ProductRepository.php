<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Contracts\ProductInterface;

class ProductRepository extends AbstractRepository implements ProductInterface
{

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

	/**
     * get suggest list product
     * @return array
     */
    public function getSuggestList($limit, $offset = 0, $categoryId = null)
    {
        return $this->model->getSuggestList($limit, $offset, $categoryId);
    }

    /**
     * get product detail
     * @param  integer $productId
     * @return object
     */
    public function getDetail($productId)
    {
        return $this->model->getDetail($productId);
    }
}
