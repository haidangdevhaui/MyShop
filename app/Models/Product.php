<?php

namespace App\Models;

use App\Exceptions\ModelException;

class Product extends AbstractModel
{
	/**
	 * custom return value image field
	 * @return object
	 */
    public function getImageAttribute()
    {
    	return $this->image;
    }
}
