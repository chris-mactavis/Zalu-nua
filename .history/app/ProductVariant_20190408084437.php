<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $guarded = ['id'];

    public function product_attribute()
    {
        return $this->belongsTo(ProductAttribute::class);
    }
    
    public function product_attribute_option()
    {
        return $this->belongsTo(Produc::class);
    }
}
