<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
  protected $primaryKey = 'order_detail_id';

  protected $guarded = ['id'];

  public function orders()
  {
    return $this->belongsTo('App\Order');
  }

  public function products()
  {
    return $this->belongsTo('App\Product', 'product_id');
  }

  public function getProductImageAttribute($product_image)
  {
    return asset($product_image);
  }
}
