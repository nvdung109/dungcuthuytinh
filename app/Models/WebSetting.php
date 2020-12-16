<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebSetting extends Model
{
    protected $table = 'web_setting';
    protected $fillable = ['name', 'logo', 'address1', 'link_fb', 'link_yt', 'link_pin', 'link_tt', 'email', 'hotline', 'sup_telephone1', 'active'];
    public $timestamps = false;
}
