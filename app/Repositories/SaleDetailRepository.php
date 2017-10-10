<?php

namespace App\Repositories;

use App\Models\ProductCategory;
use App\Repositories\Contracts\SaleDetailInterface;

class SaleDetailRepository extends AbstractRepository implements SaleDetailInterface
{
	/**
     * get list flash sale
     * @return mixed
     */
	public function getFlashSaleList($limit)
	{
		return $this->model->getFlashSale($limit);
	}
}