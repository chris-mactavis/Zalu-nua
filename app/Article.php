<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'banner'];

    public function getBannerAttribute($banner) {
		return asset($banner);
	}
}
