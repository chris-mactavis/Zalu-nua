<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $guarded = ['id'];

    public function options()
    {
        return $this->hasMany(ProductAttributeOption::class);
    }
}
