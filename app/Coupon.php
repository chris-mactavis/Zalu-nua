<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $guarded = ['id'];

    public function type()
    {
        return $this->belongsTo(CouponType::class, 'coupon_type_id', 'id');
    }
}
