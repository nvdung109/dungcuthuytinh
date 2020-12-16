<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Http\Requests\AddBannerRequest;
use App\Http\Requests\EditBannerRequest;
use Session;

class BannerController extends Controller
{
    public function listBanner(Request $request){
    	$kw = $request->keyword;
        $banner = new Banner();
        if($kw != "") $banner = $banner->where('name', 'like', "%$kw%");
        $banner = $banner->get();
    	return view('admin.banner.index', ['listBanner' => $banner]);
    }
    public function addbanner(){
    	$banner = Banner::all();
    	return view('admin.banner.add-banner', compact('banner'));
    }
    public function saveAddBanner(AddBannerRequest $request){
    	$banner = new Banner;
    	$banner->fill($request->all());
    	if ($request->hasFile('image')) {
    		$path = $request->file('image')->storeAS('public/banner', $request->image->getClientOriginalName());
    		$banner->image = $request->image->getClientOriginalName();
    	}
    	$banner->save();
    	return redirect()->route('admin.banner');
    }
    public function editBanner($id){
    	$banner = Banner::find($id);
    	if (!$banner) {
    		return redirect()->back();
    	}
    	return view('admin.banner.edit-banner', compact('banner'));
    }
    public function saveEditBanner(EditBannerRequest $request){
    	$banner = Banner::find($request->id);
    	$banner->fill($request->all());
    	if ($request->hasFile('image')) {
    		$path = $request->file('image')->storeAS('public/banner', $request->image->getClientOriginalName());
    		$banner->image = $request->image->getClientOriginalName();
    	}
    	$banner->save();
    	return redirect(route('admin.banner'))->with('message', "Sửa thành công");
    }
    public function destroy($id){
    	$banner = Banner::find($id);
    	$banner->delete();
    	Session::flash('message', "Xóa thành công");
    	return redirect(route('admin.banner'));
    }
}
