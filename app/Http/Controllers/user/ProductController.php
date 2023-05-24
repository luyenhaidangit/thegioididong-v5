<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Cart;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Empcategory;
use App\Models\Employee;
use App\Models\Logo;
use App\Models\Product;
use App\Models\Brand;
use App\Models\AccountCustomer;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;

class ProductController extends Controller
{
    public function index($id){
        $logos=Logo::first();
        $categorys=Category::where('category_status',1)->orderby('category_position','asc')->limit(4)->get();
        $brands=Brand::all();
        $valible=0;
        $products = DB::table('product')->where('status','<>',0)->where('brand_id', $id)->paginate(9);
        $cate=Category::orderby('category_position','asc')
            ->join('product','category.category_id','=','product.idcat')
            ->join('brands','product.brand_id','=','brands.brand_id')
            ->whereBetween('category_position',[1,10])
            ->get();
        $product_tag=Product::where('status','<>',0)->orderby('view_number','desc')->limit(8)->get();
        if (Auth::guard('account_customer')->check()) {
            $wishlists = Wishlist::where('customer_id', Auth::guard('account_customer')->id())->get();
        }else{
            $wishlists=null;
        }
        $name_page='Sản phẩm';
        return view('user.page.product_page.index',compact('name_page','product_tag','wishlists','cate','product_tag','valible','categorys','products','logos','brands'));
    }
    public function search_product(Request $request){
        $logos=Logo::first();
        $categorys=Category::where('category_status',1)->orderby('category_position','asc')->limit(4)->get();
        $brands=Brand::all();
        $cate=Category::orderby('category_position','asc')
            ->join('product','category.category_id','=','product.idcat')
            ->join('brands','product.brand_id','=','brands.brand_id')
            ->whereBetween('category_position',[1,10])
            ->get();
        $product_tag=Product::where('status','<>',0)->orderby('view_number','desc')->limit(8)->get();
        if (Auth::guard('account_customer')->check()) {
            $wishlists = Wishlist::where('customer_id', Auth::guard('account_customer')->id())->get();
        }else{
            $wishlists=null;
        }
        $name_page=$_GET['search_key'];
        if(isset($_GET['price'])){
            $price =$_GET['price'];
            switch ($price){
                case 1:
                    $filter=[0,2000000];
                    break;
                case 2:
                    $filter=[2000000,4000000];
                    break;
                case 3:
                    $filter=[4000000,7000000];
                    break;
                case 4:
                    $filter=[7000000,13000000];
                    break;
                case 5:
                    $filter=[13000000,20000000];
                    break;
                case 6:
                    $filter=[20000000,30000000];
                    break;
                case 7:
                    $filter=[30000000,100000000];
                    break;
            }
        }else{
            $filter=[0,100000000];
        }
        if(isset($_GET['search_key'])) {
            if(isset($_GET['sort_by'])){
                $sort_by =$_GET['sort_by'];
                if($sort_by=='giam_dan'){
                    $sort='Giá cao đến thấp';
                    $products = DB::table('product')
                        ->where('status', '<>', 0)->whereBetween('price',$filter)
                        ->where('keywords', 'like', '%' . $request->search_key . '%')
                        ->orderby('price','desc')
                        ->paginate(9)->appends(request()->query());
                }elseif ($sort_by=='tang_dan'){
                    $products = DB::table('product')
                        ->where('status', '<>', 0)->whereBetween('price',$filter)
                        ->where('keywords', 'like', '%' . $request->search_key . '%')
                        ->orderby('price','asc')
                        ->paginate(9)->appends(request()->query());
                    $sort='Giá thấp đến cao';
                }elseif ($sort_by=='kytu_az'){
                    $sort='Ký tự từ A > Z';
                    $products = DB::table('product')
                        ->where('status', '<>', 0)->whereBetween('price',$filter)
                        ->where('keywords', 'like', '%' . $request->search_key . '%')
                        ->orderby('name','asc')
                        ->paginate(9)->appends(request()->query());
                }elseif ($sort_by=='kytu_za'){
                    $sort='Ký tự từ Z > A';
                    $products = DB::table('product')
                        ->where('status', '<>', 0) ->whereBetween('price',$filter)
                        ->where('keywords', 'like', '%' . $request->search_key . '%')
                        ->orderby('name','desc')
                        ->paginate(9)->appends(request()->query());
                }
                elseif ($sort_by=='pho_bien'){
                    $sort='Mức độ phổ biến';
                    $products = DB::table('product')
                        ->where('status', '<>', 0)->whereBetween('price',$filter)
                        ->where('keywords', 'like', '%' . $request->search_key . '%')
                        ->orderby('view_number','desc')
                        ->paginate(9)->appends(request()->query());
                }else{
                    $sort='Sắp xếp mặc định';
                    $products = DB::table('product')
                        ->where('status', '<>', 0)->whereBetween('price',$filter)
                        ->where('keywords', 'like', '%' . $request->search_key . '%')
                        ->orderby('id','desc')
                        ->paginate(9)->appends(request()->query());
                }
            }else{
                $sort='Sắp xếp mặc định';
                $products = DB::table('product')
                    ->where('status', '<>', 0)
                    ->whereBetween('price',$filter)
                    ->where('keywords', 'like', '%' . $request->search_key . '%')
                    ->orderby('id','desc')
                    ->paginate(9)->appends(request()->query());}
            if ($products == NULL) {
                return abort(404);
            }

            return view('user.page.product_page.index', compact('name_page','product_tag','wishlists','sort','cate','logos','categorys','brands', 'products'));
        }elseif (empty($_GET['search_key'])){
            $sort='Sắp xếp mặc định';
            $products = DB::table('product')
                ->where('status', '<>', 0)
                ->whereBetween('price',$filter)
                ->where('keywords', 'like', '%' . $request->search_key . '%')
                ->orderby('id','desc')
                ->paginate(9)->appends(request()->query());
            return view('user.page.product_page.index', compact('name_page','product_tag','products','wishlists','sort','cate','logos','categorys','brands'));
        }
    }
    public function show_brand($id){
        $logos=Logo::first();
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
        $product_tag=Product::where('status','<>',0)->orderby('view_number','desc')->limit(8)->get();
        $product_id=Product::find($id);
        $idcat=$product_id->idcat;
        $brand_id=$product_id->brand_id;
        $brand_name=Brand::find($brand_id);
        $name_page=$brand_name->brand_name;
        if(isset($_GET['price'])){
            $price =$_GET['price'];
            switch ($price){
                case 1:
                    $filter=[0,2000000];
                    break;
                case 2:
                    $filter=[2000000,4000000];
                    break;
                case 3:
                    $filter=[4000000,7000000];
                    break;
                case 4:
                    $filter=[7000000,13000000];
                    break;
                case 5:
                    $filter=[13000000,20000000];
                    break;
                case 6:
                    $filter=[20000000,30000000];
                    break;
                case 7:
                    $filter=[30000000,100000000];
                    break;
            }
        }else{
            $filter=[0,100000000];
        }
        if(isset($_GET['sort_by'])){
            $sort_by =$_GET['sort_by'];
            if($sort_by=='giam_dan'){
                $sort='Giá cao đến thấp';
                $products = Product::where('brand_id', $brand_id)->where('idcat',$idcat)->where('status','<>',0)->whereBetween('price',$filter)
                    ->orderby('price','desc')->paginate(9)->appends(request()->query());
            }elseif ($sort_by=='tang_dan'){
                $sort='Giá thấp đến cao';
                $products = Product::where('brand_id', $brand_id)->where('idcat',$idcat)->where('status','<>',0)->whereBetween('price',$filter)
                    ->orderby('price','asc')->paginate(9)->appends(request()->query());
            }elseif ($sort_by=='kytu_az'){
                $sort='Ký tự từ A > Z';
                $products = Product::where('brand_id', $brand_id)->where('idcat',$idcat)->where('status','<>',0)->whereBetween('price',$filter)
                    ->orderby('name','asc')->paginate(9)->appends(request()->query());
            }elseif ($sort_by=='kytu_za'){
                $sort='Ký tự từ Z > A';
                $products = Product::where('brand_id', $brand_id)->where('idcat',$idcat)->where('status','<>',0)->whereBetween('price',$filter)
                    ->orderby('name','desc')->paginate(9)->appends(request()->query());
            }
            elseif ($sort_by=='pho_bien'){
                $sort='Mức độ phổ biến';
                $products = Product::where('brand_id', $brand_id)->where('idcat',$idcat)->where('status','<>',0)->whereBetween('price',$filter)
                    ->orderby('view_number','desc')->paginate(9)->appends(request()->query());
            }else{
                $sort='Sắp xếp mặc định';
                $products = DB::table('product')->where('status','<>',0)->whereBetween('price',$filter)
                    ->orderby('id','desc')
                    ->where('brand_id', $brand_id)->where('idcat',$idcat)->paginate(9);
            }
        }else{
            $sort='Sắp xếp mặc định';
            $products = DB::table('product')->where('status','<>',0)->whereBetween('price',$filter)
                ->orderby('id','desc')
                ->where('brand_id', $brand_id)->where('idcat',$idcat)->paginate(9);
            if ($products == NULL) {
                return abort(404);
            }
        }
        return view('user.page.product_page.index',compact('name_page','product_tag','sort','wishlists','cate','categorys','products','logos'));
    }
    public function show_category($id){
        $logos=Logo::first();
        $categorys=Category::where('category_status',1)->orderby('category_position','asc')->limit(4)->get();
        $cate=Category::orderby('category_position','asc')
            ->join('product','category.category_id','=','product.idcat')
            ->join('brands','product.brand_id','=','brands.brand_id')
            ->whereBetween('category_position',[1,10])
            ->get();
        $cate_name=Category::find($id);
        $name_page=$cate_name->category_name;
        if (Auth::guard('account_customer')->check()) {
            $wishlists = Wishlist::where('customer_id', Auth::guard('account_customer')->id())->get();
        }else{
            $wishlists=null;
        }
        $product_tag=Product::where('status','<>',0)->orderby('view_number','desc')->limit(8)->get();
        if(isset($_GET['price'])){
            $price =$_GET['price'];
            switch ($price){
                case 1:
                    $filter=[0,2000000];
                    break;
                case 2:
                    $filter=[2000000,4000000];
                    break;
                case 3:
                    $filter=[4000000,7000000];
                    break;
                case 4:
                    $filter=[7000000,13000000];
                    break;
                case 5:
                    $filter=[13000000,20000000];
                    break;
                case 6:
                    $filter=[20000000,30000000];
                    break;
                case 7:
                    $filter=[30000000,100000000];
                    break;
            }
        }else{
            $filter=[0,100000000];
        }
        if(isset($_GET['sort_by'])){
            $sort_by =$_GET['sort_by'];
            if($sort_by=='giam_dan'){
                $sort='Giá cao đến thấp';
                $products = Product::where('idcat', $id)->where('status','<>',0)->whereBetween('price',$filter)
                    ->orderby('price','desc')->paginate(9)->appends(request()->query());
            }elseif ($sort_by=='tang_dan'){
                $sort='Giá thấp đến cao';
                $products = Product::where('idcat', $id)->where('status','<>',0)->whereBetween('price',$filter)
                    ->orderby('price','asc')->paginate(9)->appends(request()->query());
            }elseif ($sort_by=='kytu_az'){
                $sort='Ký tự từ A > Z';
                $products = Product::where('idcat', $id)->where('status','<>',0)->whereBetween('price',$filter)
                    ->orderby('name','asc')->paginate(9)->appends(request()->query());
            }elseif ($sort_by=='kytu_za'){
                $sort='Ký tự từ Z > A';
                $products = Product::where('idcat', $id)->where('status','<>',0)->whereBetween('price',$filter)
                    ->orderby('name','desc')->paginate(9)->appends(request()->query());
            }
            elseif ($sort_by=='pho_bien'){
                $sort='Mức độ phổ biến';
                $products = Product::where('idcat', $id)->where('status','<>',0)->whereBetween('price',$filter)
                    ->orderby('view_number','desc')->paginate(9)->appends(request()->query());
            }else{
                $sort='Sắp xếp mặc định';
                $products = DB::table('product')->where('status','<>',0)->whereBetween('price',$filter)
                    ->orderby('id','desc')
                    ->where('idcat', $id)->paginate(9);
            }
        }else{
            $sort='Sắp xếp mặc định';
            $products = DB::table('product')->where('status','<>',0)->whereBetween('price',$filter)
                ->orderby('id','desc')
                ->where('idcat', $id)->paginate(9);
            if ($products == NULL) {
                return abort(404);
            }
        }
        return view('user.page.product_page.index',compact('product_tag','name_page','sort','wishlists','cate','categorys','products','logos'));
    }

    public function viewProduct($id)
    {
        $logos=Logo::first();
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
        $product_tag=Product::where('status','<>',0)->orderby('view_number','desc')->limit(8)->get();
        $products = Product::find($id);
          $url = $products->link;
          preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
          $youtube_id = $match[1];
        $view=$products->view_number;
        $products->update(['view_number' => $view+1]);
        $gallerys=DB::table('gallery')->where('product_id','=',$id)->get();
        $hot_deals=Product::where('status','=',3)->orderby('discount','desc')->get();
        $member=DB::table('employee')->get();

        $employee = Employee::all();
        $empcategory = Empcategory::all();

        $brand_id=$products->brand_id;
        $brand=Brand::find($brand_id);
        $category_id=$products->idcat;
        $related_product=Product::where('idcat',$category_id)->where('brand_id',$brand_id)->whereNotIn('id',[$id])->orderby('id','desc')->get();//Lấy ra tất cả sp liên quan

        $comments=Comment::where('product_id',$id)->join('account_customers','comment.customer_id','=','account_customers.id')->get();//dùng để lấy tên account
        $comment=Comment::where('product_id',$id)->get();//get tất cả cmt của $id
        $countcmt=$comments->count();//đếm số lượng cmt
        $avgstar=$comments->avg('star');//Tính trung bình sao
        $star=round($avgstar);//Làm tròn số
        $avgs=round($avgstar,1);//Làm tròn số
        $datenow=Carbon::now()->day;//Lấy ngày hiện tại
        return view('user.page.product_detail_page.view-product', compact('product_tag','comment','member','wishlists','avgs','star','countcmt','datenow','comments','cate','brand','hot_deals','logos','categorys','gallerys','products','related_product','employee','empcategory','youtube_id'));

    }
}
