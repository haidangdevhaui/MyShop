<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    public $timestamp = false;

    /**
     * get mall limit config
     * @return string
     */
    public function getMallLimit()
    {
    	return $this->key('mall_limit');
    }

    /**
     * get product popular limit
     * @return string
     */
    public function getProductPopularLimit()
    {
    	return $this->key('product_popular_limit');
    }

    /**
     * get flash sale limit
     * @return string
     */
    public function getFlashSaleLimit()
    {
    	return $this->key('flash_sale_limit');
    }

    /**
     * get product on day limit
     * @return string
     */
    public function getProductOnDayLimit()
    {
    	return $this->key('product_on_day_limit');
    }

    /**
     * get value by key of config
     * @param  string $key
     * @return string
     */
    protected function key($key)
    {
    	$config = $this->select('_value')->where('_key', $key)->first();
    	return $config ? $config->_value : config('default_limit');
    }
}
