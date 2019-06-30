<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function zone()
    {
        return $this->hasOne(Zone::class);
    }
}
