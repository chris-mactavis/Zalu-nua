<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function zone()
    {
        return $this->hasOne(ShippingZone::class);
    }
}
