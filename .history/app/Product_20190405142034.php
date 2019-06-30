<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $primaryKey = 'id';

  protected $fillable = [
    'product_code', 'product_name', 'product_price', 'product_image', 'discount_price', 'category_id', 'department_id', 'slug', 'featured', 'sale', 'description', 'quantity_available'
  ];

  public function categories()
  {
    return $this->belongsTo('App\Category');
  }

  public function product_galleries()
  {
    return $this->hasMany('App\ProductGallery');
  }

  public function getProductImageAttribute($product_image)
  {
    return asset($product_image);
  }

  public function productAttributes()
  {
      return $this->hasMany(ProductVariant::class);
  }
}
