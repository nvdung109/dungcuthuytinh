<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebSetting;
use Illuminate\Support\Facades\Session;

class WebSettingController extends Controller
{
   public function listSetting(Request $request){
   		$kw = $request->keyword;
        $set = new WebSetting();
        if($kw != "") $set = $set->where('name','like', "%$kw%")->orWhere('address', 'like', "%$kw%");
        $set = $set->get();
   		return view('admin.web_setting.index', ['listSetting' => $set]);
   }
   public function addSetting(){
   		$set = WebSetting::all();
   		return view('admin.web_setting.add-setting', compact('set'));
   }
   public function saveAddSetting(Request $request){
   		$set = new WebSetting;
   		$set->fill($request->all());
   		if ($request->hasFile('logo')) {
		    $path = $request->file('logo')
		            ->storeAs('public/setting', $request->logo->getClientOriginalName());
		    $set->logo = $request->logo->getClientOriginalName();
		}
   		$set->save();
   		Session::flash('message', "Thêm mới thành công");
   		return redirect()->route('admin.setting');
   }
   public function editSetting($id){
   		$set = WebSetting::find($id);
   		if (!$set) {
   			return redirect()->route('setting');
   		}
   		return view('admin.web_setting.edit-setting', compact('set'));
   }
   public function saveEditSetting(Request $request){
   		$set = WebSetting::find($request->id);
         $set->fill($request->all());
        if ($request->hasFile('logo')) {
		    $path = $request->file('logo')
		            ->storeAs('public/setting', $request->logo->getClientOriginalName());
		    $set->logo = $request->logo->getClientOriginalName();
		}
   		$set->save();
        Session::flash('message', "Sửa thành công");
        return redirect(route('admin.setting'));
   }
   public function destroy($id)
    {
        $set = WebSetting::find($id);
        $set->delete();
        Session::flash('message', "Xóa thành công");
        return redirect()->route('admin.setting');
    }
}
