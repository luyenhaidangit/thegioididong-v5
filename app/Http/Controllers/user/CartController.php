<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\City;
use App\Models\Coupon;
use App\Models\Logo;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Session;
use Auth;
use DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Cart view
    public function index()
    {
        $logos = Logo::first();
        $categorys = Category::where('category_status', 1)->orderby('category_position', 'asc')->limit(4)->get();
        $cate = Category::orderby('category_position', 'asc')
            ->join('product', 'category.category_id', '=', 'product.idcat')
            ->join('brands', 'product.brand_id', '=', 'brands.brand_id')
            ->whereBetween('category_position',[1,10])
            ->get();
        $brands = Brand::all();
        $coupons = Coupon::all();
        $city = City::orderby('matp', 'ASC')->get();
        if (Auth::guard('account_customer')->check()) {
            $wishlists = Wishlist::where('customer_id', Auth::guard('account_customer')->id())->get();
        } else {
            $wishlists = null;
        }
        if (Session::has('Cart')){
            return view('user.page.cart_page.cart', compact('wishlists', 'brands', 'cate', 'logos', 'categorys', 'coupons', 'city'));
        }else{
            return view('user.page.cart_page.view_cart', compact('wishlists', 'brands', 'cate', 'logos', 'categorys', 'coupons', 'city'));
        }
    }
}
