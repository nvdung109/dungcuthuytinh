<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';
    protected $fillable = ['name', 'telephone', 'email', 'title', 'content', 'date', 'status'];
    public $timestamps = false;
}
