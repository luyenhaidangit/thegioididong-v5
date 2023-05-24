<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Logo;
use App\Models\Wishlist;
use App\Models\Comparison;
use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use function Sodium\compare;

class ComparisonController extends Controller
{
    //
    public function index()
    {
        $logos = Logo::first();
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
        $comparisons=Comparison::where('customer_id', Auth::guard('account_customer')->id())
            ->join('product','comparisons.product_id','=','product.id')->orderBy('comparison_id','desc')->get();
        if (Auth::guard('account_customer')->check()) {
            return view('user.page.comparison_page.comparison', compact('comparisons','wishlists', 'logos','cate','categorys'));
        }else{
            return Redirect()->route('shopping.home');
        }
    }

    public function addToComparison($product_id)
    {
        $count_col=Comparison::count();
        if($count_col<4) {
            $status = Comparison::where('customer_id', Auth::guard('account_customer')->id())->where('product_id', $product_id)->first();
            if (isset($status->customer_id) and isset($status->product_id)) {
                $status->delete();
                return Redirect()->back()->with('comparison', 'Đã bỏ sản phẩm ra khỏi danh sách so sánh!');
            } else {
                if (Auth::guard('account_customer')->check()) {
                    Comparison::insert([
                        'customer_id' => Auth::guard('account_customer')->id(),
                        'product_id' => $product_id,
                    ]);
                    return Redirect()->back()->with('comparison', 'Sản phẩm đã được thêm vào danh sách so sánh!');
                } else {
                    return Redirect()
                        ->route('shopping.login')
                        ->with('comparison', 'Hãy đăng nhập');
                }
            }
        }else{
            return Redirect()->back()->with('comparison', 'Số lượng sản phẩm so sánh đã đầy!');
        }
    }

    public function destroy($comparison_id)
    {
        Comparison::where('comparison_id', $comparison_id)->where('customer_id', Auth::guard('account_customer')->id())->delete();
        return Redirect()->back()->with('comparison', 'Sản phẩm đã được xóa khỏi danh sách so sánh!');
    }
}
