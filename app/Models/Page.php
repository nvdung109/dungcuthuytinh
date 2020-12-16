<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'page';
    protected $fillable = ['name', 'title', 'link', 'content', 'meta_title', 'meta_description', 'date', 'active', 'type'];
    public $timestamps = false;
}
