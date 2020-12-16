<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\NewCategory;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AddNewRequest;
use App\Http\Requests\EditNewRequest;

class NewController extends Controller
{
    public function listNew(Request $request){
        $kw = $request->keyword;
        $news = new News();
        if($kw != "")$news = $news->where('title', 'like', "%$kw%");
        $news = $news->with(['category'])->paginate(15);
    	return view('admin.news.index', [ 'listNews' => $news ], compact('news'));

    }
    public function addNew(){
    	$new = News::all();
    	$newcate = NewCategory::all();
    	return view('admin.news.add-news', compact('new', 'newcate'));
    }
    public function saveAddNew(AddNewRequest $request){
    	$new = new News;
    	$new->fill($request->all());
        if ($request->hasFile('image')) {
		    $path = $request->file('image')
		            ->storeAs('public/news', $request->image->getClientOriginalName());
		    $new->image = $request->image->getClientOriginalName();
		}
        $new->save();
        return redirect()->route('admin.news')->with('message', "Thêm mới bài viết thành công");
    }
    public function editNew($id){
        $new = News::find($id);
        if (!$new) {
            return redirect()->route('news');
         }
        $newcate = NewCategory::all();
    	return view('admin.news.edit-news', compact('new', 'newcate'));
    }
    public function saveEditNew(EditNewRequest $request) {
         $new = News::find($request->id);
         $new->fill($request->all());
          if ($request->hasFile('image')) {
                $path = $request->file('image')->storeAs('public/news', $request->image->getClientOriginalName());
                $new->image = $request->image->getClientOriginalName();
            }
        $new->save();
        return redirect(route('admin.news'))->with('message', "Sửa bài viết thành công");
    }
    public function destroy($id)
    {
        $new = News::find($id);
        // dd( $product);
        $new->delete();
        // dd( $product->delete());
        Session::flash('message', "Xóa thành công");
        return redirect()->route('admin.news');
    }
}
