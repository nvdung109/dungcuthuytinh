<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){

	}

	public function viewPage($dataContainer, $dataExtent = []){

		$dataView 	= [
						'HEADER'				=> view('admin.header'),
						'FOOTER'				=> view('admin.footer'),
						'CSS_HEADER_MORE'	=> '',
						'JS_HEADER_MORE'	=> '',
						'JS_FOOTER'			=> '',
						'CONTAINER'			=> $dataContainer
							];
		return view('admin.layouts')->with($dataView);
	}
}
