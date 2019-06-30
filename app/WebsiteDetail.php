<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteDetail extends Model
{
    protected $fillable = [
    	'name', 'email', 'phone', 'áddress', 'facebook', 'twitter', 'instagram', 'linkedin'
    ];
}
