<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = ['title', 'url', 'image','desc_en', 'description', 'new_id', 'date', 'active', 'meta_title', 'meta_description'];
    public $timestamps = false;
    
    const KEY_CATEGORY			= 'new_id';
    public function category(){
		return $this->hasOne(
			\App\Models\NewCategory::class,
			'id',
			static::KEY_CATEGORY
		)->select(\App\Models\NewCategory::FIELD_FOR_DEFAULT);
	}
	public function comment(){
        //hasMany quan hệ 1-N
        return $this->hasMany('App\Models\Comment', 'new_id');
    }
}
