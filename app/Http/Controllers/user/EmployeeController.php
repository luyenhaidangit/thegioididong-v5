<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use DB;

class EmployeeController extends Controller
{
    //
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
        if (Auth::guard('account_customer')->check()) {
            $wishlists = Wishlist::where('customer_id', Auth::guard('account_customer')->id())->get();
        } else {
            $wishlists = null;
        }
        $gioi_thieu=About::where('about_status','<>',0)->first();
        return view('user.page.about_page.gioi-thieu', compact('gioi_thieu','wishlists', 'brands', 'cate', 'logos', 'categorys'));
    }
}
