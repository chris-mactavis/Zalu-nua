<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $guarded = ['id'];

    public function shippingZones()
    {
        return $this->hasMany(State::class);
    }
}
