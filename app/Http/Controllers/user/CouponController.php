<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Logo;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Auth;
use DB;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        //
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
        $coupons = Coupon::where('status',1)->where('coupon_qty','>',0)->get();
        return view('user.page.coupon', compact('wishlists','coupons','categorys','cate','logos'));
    }
//Thêm mã giảm giá
    public function AddCoupon(Request $request)
    {
        $data = $request->all();
        $coupon = Coupon::where('coupon_code', $data['coupon_code'])->first();
        if($coupon->status!=0 && $coupon->coupon_qty>0) {
            if ($coupon == true) {
                $count_coupon = $coupon->count();
                if ($count_coupon > 0) {
                    $coupon_session = Session::get('coupon');
                    if ($coupon_session == true) {

                        $is_avaiable = 0;
                        if ($is_avaiable == 0) {
                            $cou[] = array(
                                'coupon_code' => $coupon->coupon_code,
                                'coupon_qty' => $coupon->coupon_qty,
                                'coupon_money' => $coupon->coupon_money,
                            );
                            Session::put('coupon', $cou);
                        } else {
                            $cou[] = array(
                                'coupon_code' => $coupon->coupon_code,
                                'coupon_qty' => $coupon->coupon_qty,
                                'coupon_money' => $coupon->coupon_money,
                            );
                            Session::put('coupon', $cou);
                        }
                    } else {

                        $is_avaiable = 0;
                        if ($is_avaiable == 0) {
                            $cou[] = array(
                                'coupon_code' => $coupon->coupon_code,
                                'coupon_qty' => $coupon->coupon_qty,
                                'coupon_money' => $coupon->coupon_money,
                            );
                            Session::put('coupon', $cou);
                        } else {
                            $cou[] = array(
                                'coupon_code' => $coupon->coupon_code,
                                'coupon_qty' => $coupon->coupon_qty,
                                'coupon_money' => $coupon->coupon_money,
                            );
                            Session::put('coupon', $cou);
                        }
                    }
                    Session::save();
                }
            } else {
                return redirect()->back()->with('message', 'Mã giảm giá không đúng');
            }
        }else{
            return redirect()->back()->with('message', 'Mã giảm giá đã hết hạng!');
        }
    }
//Xóa mã giảm giá
    function DeleteCoupon(){
        $coupon=Session::get('coupon');
        if($coupon==true){
            Session::forget('coupon');
            return redirect()->back()->with('message','Xóa mã khuyến mãi thành công!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
