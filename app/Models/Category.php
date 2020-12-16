<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "category";
    public function product(){
        //hasMany quan hệ 1-N
        return $this->hasMany('App\Models\Product', 'cate_id');
    }
    protected $fillable = [
        'name', 'image', 'link', 'date', 'description', 'active', 'meta_title', 'meta_description'
    ];
    public $timestamps = false;
}
