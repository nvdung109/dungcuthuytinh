<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table		= 'menus';
	protected $primaryKey	= 'mnu_id';
	protected $guarded		= [];
	//protected $fillable	= [];
	public $timestamps		= false;
	public $prefix			= 'mnu_';

	const FIELD_FOR_DEFAULT	= ['mnu_id', 'mnu_name', 'mnu_icon', 'mnu_link'];
	const FIELD_FOR_LISTING	= ['mnu_id', 'mnu_name', 'mnu_icon', 'mnu_link', 'mnu_scron', 'mnu_target', 'mnu_type', 'mnu_position', 'mnu_create_time', 'mnu_active', 'mnu_order', 'mnu_staff_id'];
	const FIELD_FOR_DETAIL	= ['*'];
}
