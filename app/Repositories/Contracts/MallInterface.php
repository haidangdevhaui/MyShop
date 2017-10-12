<?php 

namespace App\Repositories\Contracts;

interface MallInterface {

	/**
     * get list mall
     * @param integer $limit 
     * @return mixed
     */
	public function getList($limit);
}