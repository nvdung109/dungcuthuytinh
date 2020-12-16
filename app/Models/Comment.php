<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comment";
    //belongsTo Mối quan hệ đảo ngc lại N(comment) - 1(pro)
    public function product(){
        return $this->belongsTo('App\Models\Product', 'pro_id', 'id');
    }
    public function news(){
        return $this->belongsTo('App\Models\News', 'new_id', 'id');
    }
    protected $fillable = ['pro_id', 'new_id', 'content', 'name', 'telephone', 'date', 'active'];
    public $timestamps = false;
    }

