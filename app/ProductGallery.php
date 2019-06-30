<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    protected $fillable = [
        'product_id', 'product_image', 'default'
    ];

    public function products() {
		return $this->belongsTo('App\Product');
	} 

    public function getProductImageAttribute($product_image) {
		return asset($product_image);
	}
}
