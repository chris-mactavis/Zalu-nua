<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'category_id';

    protected $fillable = [
        'category_name', 'category_url', 'cover_image', 'department_id'
    ];

    public function products() {
        return $this->hasMany('App\Product');
    }

    public function departments() {
		return $this->belongsTo('App\Department');
    } 

    public function getCoverImageAttribute($cover_image) {
		return asset($cover_image);
	}
}
