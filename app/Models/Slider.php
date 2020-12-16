<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'slider';
    protected $fillable = ['image', 'title', 'link', 'position', 'active'];
    public $timestamps = false;
}
