<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $primaryKey = 'order_detail_id';

    protected $fillable = [
        'order_id', 'product_id', 'price', 'quantity'
    ];

    public function orders() {
		return $this->belongsTo('App\Order');
    } 
    
    public function products() {
		return $this->belongsTo('App\Product');
	} 

	public function getProductImageAttribute($product_image) {
		return asset($product_image);
	}
}
