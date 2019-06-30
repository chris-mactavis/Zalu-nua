<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function zone()
    {
        return $this->hasOne(ShippingZone::class);
    }
}
