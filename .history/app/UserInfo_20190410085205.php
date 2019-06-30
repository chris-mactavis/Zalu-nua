<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model
{
    //
    protected $fillable = [
        'user_id', 'phone', 'address', 'city', 'state', 'country', 'lga'
    ];

    public function lgas()
    {
        return $this->hasOne(City::class, 'lga', 'id');
    }
}
