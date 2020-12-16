<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brand';
    public function product(){
        //hasMany quan hệ 1-N
        return $this->hasMany('App\Product', 'brand_id');
    }
    public $timestamps = false;
    protected $fillable = [
        'name', 'date', 'description', 'active'
    ];
}
