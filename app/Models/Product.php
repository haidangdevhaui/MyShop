<?php

namespace App\Models;

use App\Exceptions\ModelException;
use Carbon\Carbon;

class Product extends AbstractModel
{
	/**
	 * accessor
	 * @var array
	 */
	protected $casts = [
        'image' => 'json',
        'color' => 'json',
        'detail' => 'json'
    ];

    /**
     * dates
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * get custom created at value
     * @param  string $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        $created = explode(' ', Carbon::parse($value)->diffForHumans());
        return $created[0] . ' ' . trans('time')[$created[1] . ' ' . $created[2]];
    }

    /**
     * create shop attribute
     * @return object
     */
    public function shop()
    {
        return $this
            ->hasOne('App\Models\Shop', 'id', 'shop_id')
            ->leftJoin('products', 'shops.id', 'products.shop_id')
            ->leftJoin('votes', 'shops.id', 'votes.shop_id')
            ->selectRaw('
                shops.name,
                shops.image,
                COUNT(products.id) as total_product,
                COUNT(votes.id) as total_vote,
                AVG(votes.score) as score
            ')
            ->groupBy(
                'shops.id'
            )
        ;
    }

    /**
     * create shop attribute
     * @return object
     */
    public function mall()
    {
        return $this
            ->hasOne('App\Models\Mall', 'id', 'mall_id')
            ->leftJoin('products', 'malls.id', 'products.mall_id')
            ->leftJoin('votes', 'malls.id', 'votes.mall_id')
            ->selectRaw('
                malls.name,
                malls.image,
                COUNT(products.id) as total_product,
                COUNT(votes.id) as total_vote,
                AVG(votes.score) as score
            ')
            ->groupBy(
                'malls.id'
            )
        ;
    }

    /**
     * scope select with join product
     * @param  Query $query
     * @return Query
     */
    public function scopeSelectWithJoin($query)
    {
    	return $query
            ->leftJoin('sale_details', 'products.id', '=', 'sale_details.product_id')
            ->leftJoin('sales', 'sale_details.sale_id', '=', 'sales.id')
            ->leftJoin('votes', 'products.id', '=', 'votes.product_id')
            ->selectRaw('
    			products.id,
                products.mall_id,
    			products.name,
    			products.price,
    			products.image,
    			products.like,
    			sales.type as sale_type,
    			sales.sale_value,
    			COUNT(votes.id) as total_vote,
    			AVG(votes.score) as score
    		')
            ->groupBy(
                'products.id',
                'sales.type',
                'sales.sale_value'
            );
    }

    /**
     * get suggest product list
     * @param  integer $limit
     * @param  integer $offset
     * @param  integer $categoryId
     * @return array
     */
    public function getSuggestList($limit, $offset = 0, $categoryId = null)
    {
        return $this
        	->selectWithJoin()
            ->limit($limit)
            ->skip($offset)
            ->get()
            ->map(function($item) {
            	$item->image = $item->image[0]['thumb'];
            	return $item;
            })
        ;
    }

    /**
     * get product detail
     * @param  integer $productId
     * @return object
     */
    public function getDetail($productId)
    {
        $product = $this
            ->leftJoin('admins', 'products.admin_id', '=', 'admins.id')
            ->leftJoin('shops', 'products.shop_id', '=', 'shops.id')
            ->leftJoin('malls', 'products.mall_id', '=', 'malls.id')
            ->leftJoin('sale_details', 'products.id', '=', 'sale_details.product_id')
            ->leftJoin('sales', 'sale_details.sale_id', '=', 'sales.id')
            ->leftJoin('votes', 'products.id', '=', 'votes.product_id')
            ->selectRaw('
                products.id,
                products.mall_id,
                products.shop_id,
                products.name,
                products.price,
                products.image,
                products.color,
                products.detail,
                products.like,
                products.description,
                sales.type as sale_type,
                sales.sale_value,
                COUNT(votes.id) as total_vote,
                AVG(votes.score) as score,
                products.created_at
            ')
            ->groupBy(
                'products.id',
                'sales.type',
                'sales.sale_value'
            )
            ->where('products.id', $productId)
            ->get()
            ->map(function($item) {
                $item->shop = $item->shop;
                $item->mall = $item->mall;
                return $item;
            })
            ->first()
        ;
        return $product;
    }
}
