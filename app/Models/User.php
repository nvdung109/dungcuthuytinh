<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "users";
    public function product(){
        //hasMany quan hệ 1-N
        return $this->hasMany('App\Product', 'user_id');
    }
    protected $fillable = [
        'name', 'avatar', 'email','telephone','role_id', 'active', 'date'
    ];
    public $timestamps = false;
}
