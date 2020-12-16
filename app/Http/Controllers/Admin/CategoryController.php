<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
   public function listCategory(Request $request){
        $kw = $request->keyword;
        $cate = new Category();
        if($kw != "")$cate = $cate->where('name', 'like', "%$kw%");
        $cate = $cate->where('active',1)->paginate(10);
   	return view('admin.category.index', ['listCate' => $cate], compact('cate'));
   }
   public function addCategory(){
    	$cate = Category::all();
        return view('admin.category.add-category', compact('cate'));
    }
    public function saveAddCategory(AddCategoryRequest $request){
    	$category = new Category;
    	$category->fill($request->all());
        if ($request->hasFile('image')) {
		    $path = $request->file('image')
		            ->storeAs('public/category', $request->image->getClientOriginalName());
		    $category->image = $request->image->getClientOriginalName();
		    }
        $category->save();
        return redirect()->route('admin.category')->with('message', "Đã thêm thành công");
    }
    public function editCategory($id){
        $cate = Category::find($id);
        if (!$cate) {
            return redirect()->route('category');
         }
        return view('admin.category.edit-category', compact('cate'));
    }
    public function saveEditCategory(EditCategoryRequest $request) {
         $cate = Category::find($request->id);
         $cate->fill($request->all());
          if ($request->hasFile('image')) {
                $path = $request->file('image')->storeAs('public/category', $request->image->getClientOriginalName());
                $cate->image = $request->image->getClientOriginalName();
            }
        $cate->save();
        return redirect(route('admin.category'))->with('message', "Đã sửa thành công");
    }
    public function destroy($id)
    {
        $cate = Category::find($id);
        // dd( $category);
        $cate->delete();
        // dd( $category->delete());
        Session::flash('message', "Xóa thành công");
        return redirect()->route('admin.category');
    }
}
