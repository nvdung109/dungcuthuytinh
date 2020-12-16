<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewCategory;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AddNewsCateRequest;
use App\Http\Requests\EditNewsCateRequest;

class NewCategoryController extends Controller
{
	public function listNewCategory(Request $request){
		$kw = $request->keyword;
        $newcate = new NewCategory();
        if($kw != "")$newcate = $newcate->where('name', 'like', "%$kw%");
        $newcate = $newcate->get();
		return view('admin.new_cate.index', ['ListCateNew' => $newcate]);
	}
	public function addCateNew(){
    	$newcate = NewCategory::all();
        return view('admin.new_cate.add-cate-new', compact('newcate'));
    }
    public function saveAddCateNew(AddNewsCateRequest $request){
    	$newcate = new NewCategory;
    	$newcate->fill($request->all());
        $newcate->save();
        return redirect()->route('admin.cate_news')->with('message', "Thêm danh mục tin tức thành công");
    }
    public function editCateNew($id){
        $newcate = NewCategory::find($id);
        if (!$newcate) {
            return redirect()->route('cate_news');
         }
        return view('admin.new_cate.edit-cate-new', compact('newcate'));
    }
    public function saveEditCateNew(EditNewsCateRequest $request) {
        $newcate = NewCategory::find($request->id);
        $newcate->fill($request->all());
        $newcate->save();
        return redirect(route('admin.cate_news'))->with('message', "Sửa danh mục tin tức thành công");
    }
    public function destroy($id)
    {
        $newcate = NewCategory::find($id);
        // dd( $category);
        $newcate->delete();
        // dd( $category->delete());
        Session::flash('message', "Xóa thành công");
        return redirect()->route('admin.cate_news');
    }
}
