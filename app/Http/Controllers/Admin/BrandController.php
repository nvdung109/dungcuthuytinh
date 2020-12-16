<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AddBrandRequest;
use App\Http\Requests\EditBrandRequest;
class BrandController extends Controller
{
	public function listBrand(Request $request){
		$kw = $request->keyword;
        $brand = new Brand();
        if($kw != "")$brand = $brand->where('name', 'like', "%$kw%");
        $brand = $brand->get();
    	return view('admin.brand.index',['listBrand' => $brand]);
	}
	public function addBrand(){
		$brand = Brand::all();
		return view('admin.brand.add-brand', compact('brand'));
	}
	public function saveAddBrand(AddBrandRequest $request){
		$brand = new Brand;
		$brand->fill($request->all());
        $brand->save();
        Session::flash('message', "Successfully created brand");
        return redirect()->route('admin.brand');
	}
	public function editBrand($id){
        $brand = Brand::find($id);
        if (!$brand) {
            return redirect()->route('brand');
         }
        return view('admin.brand.edit-brand', compact('brand'));
    }
    public function saveEditBrand(EditBrandRequest $request) {
         $brand = Brand::find($request->id);
         $brand->fill($request->all());
        $brand->save();
        return redirect(route('admin.brand'));
    }
    public function destroy($id)
    {
        $brand = Brand::find($id);
        // dd( $brand);
        $brand->delete();
        // dd( $brand->delete());
        Session::flash('message', "Xóa thành công");
        return redirect()->route('admin.brand');
    }

}
