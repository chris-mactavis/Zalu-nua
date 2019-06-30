<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'page_title', 'page_url', 'content', 'banner'
    ];

    public function getBannerAttribute($banner) {
		return asset($banner);
	}
}
