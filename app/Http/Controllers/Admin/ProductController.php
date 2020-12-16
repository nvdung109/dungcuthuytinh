<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Brand;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use Validator;

class ProductController extends Controller
{
    public function productlist(Request $request){
        //search
        $kw = $request->keyword;
        $product = new Product();
        if($kw != "")$product = $product->where('name', 'like', "%$kw%");
        $product = $product->paginate(15);
    	return view('admin.product.index', ['listProduct' => $product], compact('product'));
    }
    public function addProduct(){
    	$cate = Category::all();
        $brand = Brand::all();
        $user = User::all();
        return view('admin.product.add-product', compact('cate', 'user', 'brand'));
    }
    public function saveAddProduct(AddProductRequest $request){
    	$product = new Product;
    	$product->fill($request->all());
        if ($request->hasFile('image')) {
		    $path = $request->file('image')
		            ->storeAs('public/products', $request->image->getClientOriginalName());
		    $product->image = $request->image->getClientOriginalName();
		}
        $product->save();
        return redirect()->route('admin.product')->with('message', "Đã thêm 1 sản phẩm mới");
    }
    public function editProduct($id){
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('product');
         }
         $cates = Category::all();
         $user = User::all();
         $brand = Brand::all();
        return view('admin.product.edit-product', compact('product','cates','brand','user'));
    }
    public function saveEditProduct(EditProductRequest $request) {
         $product = Product::find($request->id);
         $product->fill($request->all());
          if ($request->hasFile('image')) {
                $path = $request->file('image')->storeAs('public/products', $request->image->getClientOriginalName());
                $product->image = $request->image->getClientOriginalName();
            }
        $product->save();
        return redirect(route('admin.product'))->with('message', "Đã sửa thành công");;
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        // dd( $product);
        $product->delete();
        // dd( $product->delete());
        Session::flash('message', "Xóa thành công");
        return redirect()->route('admin.product');
    }
}
