<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingZone extends Model
{
    protected $guarded = ['id'];

    public function zone()
    {
        return $this->hasOne(Zone::class);
    }
    
}
