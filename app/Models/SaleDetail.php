<?php

namespace App\Models;

use Carbon\Carbon;

class SaleDetail extends AbstractModel
{
    /**
     * custom return value image field
     * @return object
     */
    public function getImageAttribute($image)
    {
        return json_decode($image)[0]->thumb;
    }

	/**
	 * get list flash sale 
	 * @return array 
	 */	
    public function getFlashSale($limit) 
    {
    	return $this
    		->join('products', 'sale_details.product_id', '=', 'products.id')
    		->join('sales', 'sale_details.sale_id', '=', 'sales.id')
    		->select(
    			'products.name',
    			'products.image',
    			'products.price',
    			'sale_details.product_id',
    			'sale_details.sale_numb',
    			'sale_details.sell_numb',
    			'sales.type',
    			'sales.sale_value'
    		)
    		->where('sales.expired_at', '<=', Carbon::now()->toDateString())
    		->orderBy('sell_numb', 'desc')
    		->limit($limit)
    		->get()
    		->toArray()
    	;
    }
}
