<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    
    //$productImage-> produto
    
    public function product()
    {
    	return $this-> belongsTo(Product::class);
    }

    public function getUrlAttribute()
    {

    	if (substr($this -> image, 0, 4) == "http") 
    	{
    		return $this -> image;
    	}

    	//accesor
    	return '/images/products/' . $this -> image;

    }

    
}
