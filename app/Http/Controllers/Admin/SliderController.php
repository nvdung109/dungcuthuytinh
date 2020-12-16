<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AddSlideRequest;
use App\Http\Requests\EditSlideRequest;

class SliderController extends Controller
{
    public function listSlide(Request $request){
    	$kw = $request->keyword;
        $slide = new Slider();
        if($kw != "") $slide = $slide->where('title', 'like', "%$kw%");
        $slide = $slide->get();
    	return view('admin.slide.index', ['listSlide' => $slide]);
    }
    public function addSlide(){
    	$slide = Slider::all();
    	return view('admin.slide.add-slide');
    }
    public function saveAddSlide(AddSlideRequest $request){
    	$slide = new Slider;
    	$slide->fill($request->all());
    	if ($request->hasFile('image')) {
    		$path = $request->file('image')->storeAS('public/slider', $request->image->getClientOriginalName());
    		$slide->image = $request->image->getClientOriginalName();
    	}
    	$slide->save();
    	return redirect()->route('admin.slider')->with('message', "Thêm mới thành công");
    }
    public function editSlide($id){
    	$slide = Slider::find($id);
    	if (!$slide) {
    		return redirect()->back();
    	}
    	return view('admin.slide.edit-slide', compact('slide'));
    }
    public function saveEditSlide(EditSlideRequest $request){
    	$slide = Slider::find($request->id);
    	$slide->fill($request->all());
    	if ($request->hasFile('image')) {
    		$path = $request->file('image')->storeAS('public/slider', $request->image->getClientOriginalName());
    		$slide->image = $request->image->getClientOriginalName();
    	}
    	$slide->save();
    	return redirect(route('admin.slider'))->with('message', "Sửa thành công");
    }
    public function destroy($id){
    	$slide = Slider::find($id);
    	$slide->delete();
    	return redirect(route('admin.slider'))->with('message','Xóa thành công');
    }
}
