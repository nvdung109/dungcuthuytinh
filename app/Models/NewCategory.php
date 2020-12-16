<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewCategory extends Model
{
   	protected $table = 'cate_news';

   	const FIELD_FOR_DEFAULT		= ['id', 'name'];
	const KEY_CATEGORY			= 'new_id';
	
    protected $fillable = [
        'name', 'date', 'active', 'link', 'meta_title', 'meta_description'
    ];
    public $timestamps = false;
}
