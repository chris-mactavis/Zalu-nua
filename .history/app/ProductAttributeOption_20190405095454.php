<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeOption extends Model
{
    protected $guarded = ['id'];

    public function attribute()
    {
        return $this->belongsTo(Produc)
    }
}
