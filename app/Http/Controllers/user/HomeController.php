<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\AccountCustomer;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\City;
use App\Models\Empcategory;
use App\Models\Logo;
use App\Models\Product;
    use App\Models\Comment;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Employee;
use Auth;
use DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    //
    public function index(){
        // Logo
        $logos=Logo::first();

        // Category navigation
        $categorys=Category::where('category_status','<>',0)->orderby('category_position','asc')->limit(4)->get();

        // Category sidebar
        $cate=Category::orderby('category_position','asc')
            ->join('product','category.category_id','=','product.idcat')
            ->join('brands','product.brand_id','=','brands.brand_id')
            ->whereBetween('category_position',[0,10])
            ->get();

        //Hot deal
        $hot_deals = DB::table('product')
                ->selectRaw('*, (discount / price) * 100 AS discount_percent')
                ->where('status', '=', 1)
                ->orderBy('discount_percent', 'desc')
                ->limit(3)
                ->get();


        $dong_ho=Product::join('category','category.category_id','=','product.idcat')
            ->where('product.status','<>',0)
            ->where('category.category_name','like','%'.'điện thoại'.'%')
            ->orderby('view_number','desc')->limit(30)->get();

        $product_tag=Product::where('status','<>',0)->orderby('view_number','desc')->limit(8)->get();

        $old_phone=Product::join('category','category.category_id','=','product.idcat')
            ->where('product.status','<>',0)
            ->where('category.category_name','like','%'.'cũ'.'%')
            ->orderby('view_number','desc')->limit(30)->get();

        // Slide
        $sliders = Slider::all();

        $products = Product::where('status','<>',0)->orderby('id','desc')->limit(30)->get();
        $featured_phone=Product::join('category','category.category_id','=','product.idcat')
            ->where('product.status','<>',0)
            ->where('category.category_name','like','%'.'điện thoại'.'%')
            ->orderby('view_number','desc')->limit(30)->get();
        $phu_kien=Product::join('category','category.category_id','=','product.idcat')
            ->where('product.status','<>',0)
            ->where('category.category_name','like','%'.'điện tử'.'%')
            ->orderby('view_number','desc')->limit(60)->get();
        $featured_laptop=Product::join('category','category.category_id','=','product.idcat')
            ->where('product.status','<>',0)
            ->where('category.category_name','like','%'.'laptop'.'%')
            ->orderby('view_number','desc')->limit(30)->get();

        $blogs = Blog::all();
        $firsts=$blogs->first();

        $employee = Employee::all();
        $empcategory = Empcategory::all();

        if (Auth::guard('account_customer')->check()) {
            $wishlists = Wishlist::where('customer_id', Auth::guard('account_customer')->id())->get();
        }else{
            $wishlists=null;
        }
        $comments=Comment::all();
        return view('user.page.home.index', compact('comments','wishlists','logos','categorys','cate','hot_deals', 'dong_ho',
            'product_tag','old_phone','sliders','products','featured_phone','phu_kien','featured_laptop', 'blogs', 'firsts','employee','empcategory'));
    }

}
