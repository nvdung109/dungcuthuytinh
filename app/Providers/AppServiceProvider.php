<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Websetting;
use App\Models\NewCategory;
use App\Models\Menu;
use App\Models\Cart;
use App\Models\Page;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('frontend/index',function($view){
            $loai_sp = Category::all();
            $view->with('loai_sp',$loai_sp);
        });
        view()->composer('frontend/layouts/header',function($view){
            $header = Websetting::all();
            $cate = Category::all();
            $menu = Page::where('type', 1)->get();
            $cate_new = NewCategory::all();
            $view->with('header',$header);
            $view->with('menu',$menu);
            $view->with('cate',$cate);
            $view->with('cate_new',$cate_new);
        });
        view()->composer('frontend/layouts/footer',function($view){
            $stt = Websetting::all();
            $page = Page::where('type', 2)->get();
            $view->with('stt',$stt);
            $view->with('page',$page);
        });
        view()->composer('frontend/giohang',function($view){
            $oldCart = [];
            $arrCartData = [];
            if (Session::has('cart')) {
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);

                $arrCartData = ['cart'=>$oldCart,
                                'product_cart'=>$cart->items,
                                'totalPrice'=>$cart->totalPrice,
                                'totalQty'=>$cart->totalQty
                               ];
            }
            $view->with($arrCartData);
        });
    }
}
