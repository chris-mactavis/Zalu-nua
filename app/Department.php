<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $primaryKey = 'department_id';

    protected $fillable = [
        'department_name', 'department_url', 'department_banner', 'content',
    ];

    public function categories() {
        return $this->hasMany('App\Category');
    }

    public function products() {
        return $this->hasMany('App\Product');
    }

    public function getDepartmentBannerAttribute($department_banner) {
		return asset($department_banner);
	}
    
}
