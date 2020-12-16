<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Session;

class CartController extends Controller
{
	public function addCart(Request $req,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $req->session()->put('cart',$cart);
        return redirect()->back()->with('flash_messange', 'Đã thêm vào giỏ hàng thành công!');
    }

    public function removeCart(Request $request,$id){
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items)>0) {
            $request->session()->put('cart', $cart);
        }
        else{
            $request->session()->forget('cart');
        }
        return redirect()->back()->with('flash_mes_del', 'Đã xóa sản phẩm khỏi danh sách lưu!');
    }
}
