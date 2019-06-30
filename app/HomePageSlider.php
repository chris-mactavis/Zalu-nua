<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomePageSlider extends Model
{
    protected $fillable = [
        'image', 'url'
    ];

    public function getImageAttribute($image) {
		return asset($image);
	}
}
