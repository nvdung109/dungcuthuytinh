<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    public function category(){
    	return $this->belongsTo('App\Models\Category', 'cate_id', 'id');
    }
    public function user(){
    	return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function brand(){
    	return $this->belongsTo('App\Models\Brand', 'brand_id', 'id');
    }
    public function comment(){
        //hasMany quan hệ 1-N
        return $this->hasMany('App\Models\Comment', 'pro_id');
    }
    protected $fillable = ['name', 'url', 'masp', 'image', 'price', 'description_en', 'description', 'cate_id', 'user_id', 'brand_id', 'date', 'view', 'active', 'meta_title', 'meta_description'];
    public $timestamps = false;

}
