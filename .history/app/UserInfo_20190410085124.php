<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model
{
    //
    protected $fillable = [
        'user_id', 'phone', 'address', 'city', 'state', 'country', 'lga'
    ];

    public function lga()
    {
        
    }
}
