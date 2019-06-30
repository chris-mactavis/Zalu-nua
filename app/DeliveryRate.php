<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryRate extends Model
{
    protected $primaryKey = 'delivery_rate_id';
    
    protected $fillable = [
        'state_id', 'rate'
    ];

}
