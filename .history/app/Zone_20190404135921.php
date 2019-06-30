<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $guarded = ['id'];

    public function shippingZone()
    {
        return $this->hasMany(State::class);
    }
}
