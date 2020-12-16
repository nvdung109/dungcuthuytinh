<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Product;
use App\Models\News;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
	public function listComment(Request $request){
        $news = News::all();
        $product = Product::all();
		$kw = $request->keyword;
        $cmt = new Comment();
        if($kw != "")$cmt = $cmt->where('name', 'like', "%$kw%");
        $cmt = $cmt->get();
		return view('admin.comment.index', ['listComment' => $cmt,
                                            'news' => $news,
                                            'product' => $product
                                        ]);
	}
	public function addComment(){
    	$cmt = Comment::all();
        $product = Product::all();
        $news = News::all();
        return view('admin.comment.add-comment', compact('cmt', 'product', 'news'));
    }
    public function saveAddComment(Request $request){
    	$cmt = new Comment;
    	$cmt->fill($request->all());
        $cmt->save();
        Session::flash('message', "Successfully created comment");
        return redirect()->route('admin.comment');
    }
    public function destroy($id)
    {
        $cmt = Comment::find($id);
        // dd( $cmt);
        $cmt->delete();
        // dd( $cmt->delete());
        Session::flash('message', "Xóa thành công");
        return redirect()->route('admin.comment');
    }
}
