<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model
{
    protected $guarded = ['id'];

    public function lgas()
    {
        return $this->hasOne(City::class, 'id', 'lga');
    }
}
