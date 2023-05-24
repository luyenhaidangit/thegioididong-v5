<?php

namespace App\Http\Controllers\user;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Logo;
use App\Models\Order_Detail;
use App\Models\Product;
use App\Models\Faq;
use App\Models\Wishlist;
use Auth;
use DB;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Collection;

class FaqController extends Controller {

  // Faq index
  public function index() {
      $logos = Logo::first();

      $categorys=Category::where('category_status',1)->orderby('category_position','asc')->limit(4)->get();
      $cate=Category::orderby('category_position','asc')
          ->join('product','category.category_id','=','product.idcat')
          ->join('brands','product.brand_id','=','brands.brand_id')
          ->whereBetween('category_position',[1,10])
          ->get();
        
      $faqs=Faq::where('status','=',1)->get();

      if (Auth::guard('account_customer')->check()) {
          $wishlists = Wishlist::where('customer_id', Auth::guard('account_customer')->id())->get();
      }else{
          $wishlists=null;
      }

      return view('user.page.faq',compact('wishlists','faqs','categorys','cate','logos'));
  }

}
