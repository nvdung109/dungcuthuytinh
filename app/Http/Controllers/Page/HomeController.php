<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\News;
use App\Models\Partner;
use App\Models\Slider;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\WebSetting;
use App\Models\NewCategory;
use App\Models\Banner;
use App\Models\Page;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\CommentRequest;
class HomeController extends Controller
{
    public function getSearch(Request $request)
    {
        $cate = Category::all();
        $product = Product::where('name', 'like','%'.$request->key.'%')->where('active',1);
        if ($request->cate_id > 0) {
            $product->where('cate_id', $request->cate_id);
        }
        $product = $product->get();
        return view('frontend.search', compact('product','cate'));
    }
    // public function getMenu($id, Request $request){
    //     $header = Websetting::all();
    //     $cate = Category::where('link', $request->link)->first();
    //     $menu = Page::where('type', 1)->get();
    //     $cate_new = NewCategory::all();
    //     return view('frontend.layouts.header',['header' => $header,
    //                                             'cate' => $cate,
    //                                             'menu' =>$menu,
    //                                             'cate_new'=> $cate_new,
    //                                         ]);
    // }
    public function getListProduct(Request $request){
        $cate = Category::all();
        $pro = Product::where('active',1)->paginate(12);
        return view('frontend.sanpham', compact('pro','cate'));
    }
    //lấy danh sách sản phẩm theo danh mục
    public function getCategory($id, Request $request){
        $cate = Category::all();
        //lấy thông tin danh mục sản phẩm
        $des_cate = Category::where('id', $request->id)->first();
        // dd($des_cate);
        //lấy sp theo danh mục
        $sanpham = Product::Where('cate_id', $request->id)->where('active',1)->paginate(16);
        // dd($sanpham);
        //sp có lượng xem nhiều
        $sanpham_hot = Product::Where('cate_id', $request->id)->where('active',1)->orderBy('view', 'desc')
        ->limit(3)->get();
        // dd($sp_theloai);
        return view('frontend.chitietdanhmuc', compact('cate', 'sanpham', 'des_cate', 'sanpham_hot'));
    }
        public function getDetail(Request $request, $id){
        $productKey = 'chitietsanpham' . $request->id;
        // Kiểm tra Session của sản phẩm có tồn tại hay không.
        // Nếu không tồn tại, sẽ tự động tăng trường view_count lên 1 đồng thời tạo session lưu trữ key sản phẩm.
        if (!Session::has($productKey)) {
            Product::Where('url', $request->url)->first()->increment('view');
            Session::put($productKey, 1);
        }
        $sanpham = Product::Where('url', $request->url)->first();
        // dd($sanpham);
        $sanpham_tt = Product::Where('cate_id', $sanpham->cate_id)->where('active',1)->limit(4)->get();
        $cmt_pro = Comment::where('new_id', $request->id)->paginate(5);
        // dd($comment);
        $sanpham_hot = Product::where('active',1)->orderBy('view', 'desc')
        ->limit(10)->get();
        // dd($sanpham_tt);
        return view('frontend.chitietsanpham', compact('sanpham', 'sanpham_tt', 'cmt_pro', 'sanpham_hot'));
    }
    // lấy thông tin ra trang chủ
	public function getListIndex(){
		$cate = Category::all();
        $loai_sp = Category::all();
        $pro_hot = Product::where('active',1)->orderBy('view', 'desc')
        ->limit(8)->get();
        $pro_hl = Product::where('active',1)->orderBy('date', 'desc')
        ->limit(8)->get();
        $news = News::where('active',1)->orderBy('date', 'desc')->get();
        $partner = Partner::all();
        $slide = Slider::where('active',1)->where('position','>=',1)->orderBy('position', 'asc')->get();
        $banner = Banner::where('active',1)->where('position','>=',1)->orderBy('position', 'asc')->limit(3)->get();
        return view('frontend.index', compact('pro_hot','pro_hl','cate', 'news', 'partner', 'slide', 'banner', 'loai_sp'));
	}

    public function detailPage(Request $request){
        $page_detail = Page::Where('id', $request->id)->first();
        $page = Page::all();
        return view('frontend.page', compact('page', 'page_detail'));
    }
    public function lienhe(){
        $contact = WebSetting::all();
        return view('frontend.lienhe', compact('contact'));
    }
    public function addContact(){
        $cont = Contact::all();
        return view('frontend.lienhe', compact('cont'));
    }
    public function saveContact(ContactRequest $request){
        $contact = new Contact(); 
        $contact->fill($request->all());
        $contact->save();
        return redirect()->route('lienhe')->with('flash_messange', 'Đã gửi góp ý thành công! Chúng tôi sẽ phản hồi ý kiến của bạn một cách sớm nhất !');
    }
    //lấy danh mục tin tức
    public function getCateNews($id, Request $request){
        $cate_new = NewCategory::all();
        $new = News::Where('new_id', $id)->where('active',1)->paginate(10);
        $des_new = NewCategory::where('id', $request->id)->first();
        $new_hot = News::Where('new_id', $id)->where('active',1)->orderBy('date', 'desc')
        ->limit(5)->get();
        // dd($sp_theloai);
        return view('frontend.chitiet_danhmuc_tintuc', compact('cate_new', 'new', 'des_new', 'new_hot'));
    }
    public function getListNews(){
        $news = News::where('active', 1)->paginate(10);
        $new_hot = News::where('active',1)->orderBy('date', 'desc')->limit(5)->get();
        $cate_new = NewCategory::all();
        // dd($sp_theloai);
        return view('frontend.tintuc', compact('news', 'new_hot', 'cate_new'));
    }
    public function getDetailNews(Request $request ){
        $cate_news = NewCategory::all();
        //lấy thông tin của 1 id cụ thể
        $news = News::Where('url', $request->url)->first();
        $cmt_news = Comment::where('pro_id', $request->id)->get();
        // dd($cmt_news);
        $news_tt = News::Where('new_id', $news->new_id)->where('active',1)->get();
        $new_hot = News::where('active',1)->orderBy('date', 'desc')->limit(5)->get();
        // foreach ($new_hot as $key => $value) {
        //     dd($value->url);
        // }
        // dd($sanpham_tt);
        return view('frontend.chitiet_tintuc', compact('news', 'cate_news', 'news_tt', 'cmt_news', 'new_hot'));
    }
    public function postCommentNews($id, CommentRequest $request){
        $new_id = $id;
        $total_new_active = News::where('active',1)->paginate(10)->count();
        $cmt = new Comment();
        $cmt->new_id = $new_id;
        // $cmt->id_user = Auth::user()->id;
        $cmt->name = $request->name;
        $cmt->telephone = $request->telephone;
        $cmt->content = $request->content;
        // $cmt->point = $request->point;
        $cmt->save();
        $lastInsertedId = $cmt->id;
        return redirect()->back()->with('Comment', 'Đã gửi bình luận thành công! Chúng tôi sẽ phản hồi ý kiến của bạn một cách sớm nhất !');
    }
        public function postComment($id, CommentRequest $request){
        $pro_id = $id;
        $total_product_active = Product::where('active',1)->get()->count();
        $cmt = new Comment();
        $cmt->pro_id = $pro_id;
        // $cmt->id_user = Auth::user()->id;
        $cmt->name = $request->name;
        $cmt->telephone = $request->telephone;
        $cmt->content = $request->content;
        // $cmt->point = $request->point;
        $cmt->save();
        $lastInsertedId = $cmt->id;
        return redirect()->back()->with('Comment', 'Đã gửi bình luận thành công! Chúng tôi sẽ phản hồi ý kiến của bạn một cách sớm nhất !');
    }
	
}
