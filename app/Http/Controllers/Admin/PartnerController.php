<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use Illuminate\Support\Facades\Session;

class PartnerController extends Controller
{
    public function listPartner(Request $request){
    	$kw = $request->keyword;
        $partner = new Partner();
        if($kw != "")$partner = $partner->where('name', 'like', "%$kw%");
        $partner = $partner->get();
    	return view('admin.partner.index', ['listPartner' => $partner]);
    }
    public function addPartner(){
    	$partner = Partner::all();
    	return view('admin.partner.add-partner');
    }
    public function saveAddPartner(Request $request){
    	$partner = new Partner;
    	$partner->fill($request->all());
    	if ($request->hasFile('image')) {
    		$path = $request->file('image')->storeAS('public/partner', $request->image->getClientOriginalName());
    		$partner->image = $request->image->getClientOriginalName();
    	}
    	$partner->save();
    	Session::flash('messange', "Thêm mới thành công");
    	return redirect()->route('admin.partner');
    }
    public function editPartner($id){
    	$partner = Partner::find($id);
    	if (!$partner) {
    		return redirect()->back();
    	}
    	return view('admin.partner.edit-partner', compact('partner'));
    }
    public function saveEditPartner(Request $request){
    	$partner = Partner::find($request->id);
    	$partner->fill($request->all());
    	if ($request->hasFile('image')) {
    		$path = $request->file('image')->storeAS('public/partner', $request->image->getClientOriginalName());
    		$partner->image = $request->image->getClientOriginalName();
    	}
    	$partner->save();
		Session()->flash('message', "Sửa thành công");
    	return redirect(route('admin.partner'));
    }
    public function destroy($id){
    	$partner = Partner::find($id);
    	$partner->delete();
    	Session::flash('message', "Xóa thành công");
    	return redirect(route('admin.partner'));
    }
}
