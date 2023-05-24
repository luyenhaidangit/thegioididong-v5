<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Logo;
use App\Models\Wishlist;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use function Sodium\compare;

class WishlistController extends Controller
{

    public function index()
    {
        $logos = Logo::first();
        $categorys=Category::where('category_status',1)->orderby('category_position','asc')->limit(4)->get();
        $cate=Category::orderby('category_position','asc')
            ->join('product','category.category_id','=','product.idcat')
            ->join('brands','product.brand_id','=','brands.brand_id')
            ->whereBetween('category_position',[1,10])
            ->get();
        $wishlists = Wishlist::where('customer_id', Auth::guard('account_customer')->id())->latest()->get();
        if (Auth::guard('account_customer')->check()) {
            return view('user.page.wishlist_page.wishlist', compact('wishlists', 'logos','cate','categorys'));
        }else{
            return Redirect()->route('shopping.home');
        }
    }

    public function addToWishlist($product_id)
    {
        $status = Wishlist::where('customer_id', Auth::guard('account_customer')->id())->where('product_id', $product_id)->first();
        if (isset($status->customer_id) and isset($status->product_id)) {
            $status->delete();
            return Redirect()->back()->with('wishlist', 'Đã xóa sản phẩm khỏi danh sách yêu thích!');
        } else {
            if (Auth::guard('account_customer')->check()) {
                Wishlist::insert([
                    'customer_id' => Auth::guard('account_customer')->id(),
                    'product_id' => $product_id,
                ]);
                return Redirect()->back()->with('wishlist', 'Sản phẩm đã được thêm vào danh sách yêu thích!');
            } else {
                return Redirect()
                    ->route('shopping.login')
                    ->with('wishlist', 'Hãy đăng nhập');
            }
        }
    }

    public function destroy($wishlist_id)
    {
        Wishlist::where('id', $wishlist_id)->where('customer_id', Auth::guard('account_customer')->id())->delete();
        return Redirect()->back()->with('wishlist', 'Sản phẩm đã được xóa khỏi danh sách yêu thích!');
    }

}
