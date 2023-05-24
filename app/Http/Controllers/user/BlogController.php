<?php

namespace App\Http\Controllers\user;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Blog;
use App\Models\Logo;
use App\Models\Wishlist;
use Auth;
use DB;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Collection;

class BlogController extends Controller
{

    // Blog index
    public function index(Request $request)
    {
        $logos = Logo::first();

        $categorys=Category::where('category_status',1)->orderby('category_position','asc')->limit(4)->get();
        
        $cate=Category::orderby('category_position','asc')
            ->join('product','category.category_id','=','product.idcat')
            ->join('brands','product.brand_id','=','brands.brand_id')
            ->whereBetween('category_position',[0,10])
            ->get();

        $product_tag=Product::where('status','<>',0)->orderby('view_number','desc')->limit(8)->get();

        $pho_bien=DB::table('blog')->orderby('view','desc')->limit(2)->get();

        $moi_nhat = Blog::orderby('blog_id','desc')->limit(2)->get();

        if (Auth::guard('account_customer')->check()) {
            $wishlists = Wishlist::where('customer_id', Auth::guard('account_customer')->id())->get();
        }else{
            $wishlists=null;
        }

        if(isset($_GET['search_key'])) {
            $blogs = Blog::where('status','<>',0)->where('blog_title','like', '%' . $request->search_key . '%')->orderby('blog_id','desc')->paginate(3)->appends(request()->query());
        }else{
            $blogs = Blog::where('status','<>',0)->orderby('blog_id','desc')->paginate(3)->appends(request()->query());
        }

        return view('user.page.blog_page.blog', compact('moi_nhat','pho_bien','wishlists','logos','cate','categorys','product_tag','blogs'));
    }

    // Blog detail
    public function blogdetail(Request $request, $id)
    {
        $logos = Logo::first();

        $product_tag=Product::where('status','<>',0)->orderby('view_number','desc')->limit(8)->get();

        $blog_detail = Blog::find($id);

        $categorys=Category::where('category_status',1)->orderby('category_position','asc')->limit(4)->get();
        $cate=Category::orderby('category_position','asc')
            ->join('product','category.category_id','=','product.idcat')
            ->join('brands','product.brand_id','=','brands.brand_id')
            ->whereBetween('category_position',[1,10])
            ->get();

        if (Auth::guard('account_customer')->check()) {
            $wishlists = Wishlist::where('customer_id', Auth::guard('account_customer')->id())->get();
        }else{
            $wishlists=null;
        }

        $views=$blog_detail->view;

        $blog_detail->update(['view' => $views+1]);

        if(isset($_GET['search_key'])) {
            $blogs = Blog::where('status','<>',0)->where('blog_title','like', '%' . $request->search_key . '%')->orderby('blog_id','desc')->paginate(3)->appends(request()->query());
        }else{
            $blogs = Blog::where('status','<>',0)->orderby('blog_id','desc')->paginate(3)->appends(request()->query());
        }

        $pho_bien=Blog::where('status','<>',0)->orderby('view','desc')->limit(2)->get();

        $moi_nhat = Blog::where('status','<>',0)->orderby('blog_id','desc')->limit(2)->get();
        
        return view('user.page.blog_page.blog_details', compact('blogs','moi_nhat','pho_bien','wishlists','blog_detail','cate','categorys','logos','product_tag'));
    }
}
