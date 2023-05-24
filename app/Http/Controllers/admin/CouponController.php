<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Classes\Helper;
Session_start();

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('CheckAdminLogin');
        $this->viewprefix='admin.coupon.';
        $this->viewnamespace='panel/coupon';
        $this->index='coupon.index';
    }

    public function index()
    {
        //
        $coupons = Coupon::all();
        return view($this->viewprefix.'index' ,compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $coupons = Coupon::all();
        return view($this->viewprefix.'create',compact('coupons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'coupon_name' => 'required',
            'coupon_code' => 'required',
            'coupon_money' => 'required',
            'coupon_qty' => 'required',
            'status' => 'required',
        ]);
        $coupon=new Coupon();
        $coupon->coupon_name= $request->coupon_name;
        $coupon->coupon_code= $request->coupon_code;
        $coupon->coupon_money= $request->coupon_money;
        $coupon->coupon_qty= $request->coupon_qty;
        $coupon->status= $request->status;
        if($coupon->save())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route($this->index);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Coupon $coupon)
    {
        //
        return view($this->viewprefix.'edit')->with('coupon', $coupon);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Coupon $coupon)
    {
        //
        $coupon->coupon_name = $request->coupon_name;
        $coupon->coupon_code = $request->coupon_code;
        $coupon->coupon_money = $request->coupon_money;
        $coupon->coupon_qty = $request->coupon_qty;
        $coupon->status = $request->status;
        if ($coupon->save()) {
            Session::flash('message', 'successfully!');
        } else {
            Session::flash('message', 'Failure!');
        }
        return redirect()->route('coupon.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Coupon $coupon)
    {
        //

        if($coupon->delete())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('coupon.index');
    }
  public function changestatuscoupon($id) {
    $coupon = Coupon::find($id);
    $coupon->status = !$coupon->status;
    if ($coupon->save()) {
      return redirect()->back();
    }
    else {
      return redirect(route('changestatuscoupon'));
    }
  }
}
