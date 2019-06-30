<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'order_id';
    
    protected $fillable = [
        'transaction_id', 'cart_total', 'discount', 'order_total', 'customer_id', 'userinfo_id', 'delivery_id', 
        'shipping_fee', 'amount_paid', 'payment_method', 'order_status', 'gateway_resp', 'trans_ref', 'currency', 
        'fees', 'paid_at'
    ];

    public function customers() {
		return $this->belongsTo('App\Customer');
    } 
    
    public function order_details() {
		return $this->hasMany('App\OrderDetail');
	}
}
