<?php 

namespace App\Repositories\Contracts;

interface SaleDetailInterface {

	/**
     * get list flash sale
     * @param integer $limit
     * @return mixed
     */
	public function getFlashSaleList($limit);
}