<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
   	protected $table = 'partner';
   	public $timestamps = false;
   	protected $fillable = ['name', 'image', 'link', 'active'];
}
