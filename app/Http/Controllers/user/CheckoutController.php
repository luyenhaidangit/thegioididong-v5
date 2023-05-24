<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\City;
use App\Models\Coupon;
use App\Models\Feeship;
use App\Models\Logo;
use App\Models\Product;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\Order_Details;
use Auth;
use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    //
    public function index(){
        $logos=Logo::first();
        $categorys=Category::where('category_status',1)->orderby('category_position','asc')->limit(4)->get();
        $cate=Category::orderby('category_position','asc')
            ->join('product','category.category_id','=','product.idcat')
            ->join('brands','product.brand_id','=','brands.brand_id')
            ->get();
        $brands=Brand::all();
        $city=City::orderby('matp','ASC')->get();
        if(Session::get('shipping')) {
            foreach (Session::get('shipping') as $fee) {
                $province = Province::where('matp', $fee['fee_matp'])->orderby('maqh', 'ASC')->get();
                $wards = Wards::where('maqh', $fee['fee_maqh'])->orderby('xaid', 'ASC')->get();
                $thanhpho = City::where('matp', $fee['fee_matp'])->first();
                $quanhuyen = Province::where('maqh', $fee['fee_maqh'])->first();
                $xaphuong = Wards::where('xaid', $fee['fee_xaid'])->first();
            }
        }else{
            $province=Province::where('matp',Session::get('fee_matp'))->orderby('maqh','ASC')->get();
            $wards=Wards::where('maqh',Session::get('fee_maqh'))->orderby('xaid','ASC')->get();
            $thanhpho=City::where('matp',Session::get('fee_matp'))->first();
            $quanhuyen=Province::where('maqh',Session::get('fee_maqh'))->first();
            $xaphuong=Wards::where('xaid',Session::get('fee_xaid'))->first();
        }
        if (Auth::guard('account_customer')->check()) {
            $wishlists = Wishlist::where('customer_id', Auth::guard('account_customer')->id())->get();
        }else{
            $wishlists=null;
        }
        if(Session::has('Cart')){
            return view('user.page.checkout_page.checkout',compact('wishlists','city','thanhpho','quanhuyen','xaphuong',
                'categorys','logos','brands','province','wards','cate'));
        }else{
            return redirect()->route('shopping.home');
        }
    }

    // chọn địa điểm tính phí giao hàng
    public function select_delivery_home(Request  $request){
        $data = $request->all();//lấy tất cả dữ liệu đã gửi qua
        if ($data['action']) {//nếu có data-action
            $output = '';
            if ($data['action'] == 'city') {//nếu data-action = city
                $select_province = Province::where('matp', $data['ma_id'])->orderby('maqh', 'ASC')->get();//lấy tất cả quận huyện thuộc thành phố
                $output .= '<option value="">---Chọn quận huyện---</option>';
                foreach ($select_province as $key => $province) {
                    $output .= '<option value="' . $province->maqh . '">' . $province->name_quanhuyen . '</option>';
                }
            } else {
                $select_wards = Wards::where('maqh', $data['ma_id'])->orderby('xaid', 'ASC')->get();
                $output .= '<option value="">---Chọn xã phường---</option>';
                foreach ($select_wards as $key => $ward) {
                    $output .= '<option value="' . $ward->xaid . '">' . $ward->name_xaphuong . '</option>';
                }
            }
        }
        echo $output;
    }

    // Tính phí giao hàng
    public function calculate_fee(Request  $request){
        $data=$request->all();
        if($data['matp']){
            $feeship=Feeship::where('fee_matp',$data['matp'])->where('fee_maqh',$data['maqh'])->where('fee_xaid',$data['xaid'])->get();
            if($feeship){
                $count_feeship=$feeship->count();
                if($count_feeship>0){
                    foreach ($feeship as $Key=>$fee){
                        Session::put('fee',$fee->fee_feeship);
                        Session::save();
                        if(Session::get('fee')){
                            $shipping[]=array('fee_matp'=>$data['matp'],
                                'fee_maqh'=>$data['maqh'],
                                'fee_xaid'=>$data['xaid'],
                                'name'=>$data['name'],
                                'phone'=>$data['phone'],
                                'email'=>$data['email'],
                                'address'=>$data['address'],
                                'note'=>$data['note']);
                            Session::put('shipping',$shipping);
                            Session::save();
                        }
                    }
                }else{
                    $shipping[]=array('fee_matp'=>$data['matp'],
                        'fee_maqh'=>$data['maqh'],
                        'fee_xaid'=>$data['xaid'],
                        'name'=>$data['name'],
                        'phone'=>$data['phone'],
                        'email'=>$data['email'],
                        'address'=>$data['address'],
                        'note'=>$data['note']);
                    Session::put('fee',50000);
                    if(Session::get('fee')){
                        Session::put('shipping',$shipping);
//                        Session::put('fee_matp',$data['matp']);
//                        Session::put('fee_maqh',$data['maqh']);
//                        Session::put('fee_xaid',$data['xaid']);
//                        Session::put('name',$data['name']);
//                        Session::put('phone',$data['phone']);
//                        Session::put('email',$data['email']);
//                        Session::put('address',$data['address']);
//                        Session::put('note',$data['note']);
                        Session::save();
                    }
                    Session::save();
                }
            }
        }
    }

    public function checkout(Request $request){

        $shipping=new Shipping;
        foreach (Session::get('shipping') as $fee) {
            $city = City::where('matp', $fee['fee_matp'])->first();
            $province = Province::where('maqh', $fee['fee_maqh'])->first();
            $wards = Wards::where('xaid', $fee['fee_xaid'])->first();
            $shipping->shipping_city = $city->name_city;
            $shipping->shipping_province = $province->name_quanhuyen;
            $shipping->shipping_wards = $wards->name_xaphuong;
            $shipping->shipping_fee = Session::get('fee');
            $shipping->customer_name = $fee['name'];
            $shipping->customer_email = $fee['email'];
            $shipping->customer_address = $fee['address'];
            $shipping->customer_phone = $fee['phone'];
            $shipping->customer_note = $fee['note'];
        }
        if($shipping->save()){
            if(Auth::guard('account_customer')->check()){

            }else{
                Session::forget('shipping');
            }

            $shipping_id=$shipping->shipping_id;
            date_default_timezone_set('Asia/Ho_Chi_Minh');

            $order = new Order;
            $order->customer_id = null;
            $order->order_payment = 'Trả khi nhận hàng';
            if(Session::get('coupon')) {
                foreach (Session::get('coupon') as $key => $cou){
                    $coupon = Coupon::where('coupon_code', $cou['coupon_code'])->first();
                    $coupon_id = $coupon->coupon_id;
                    $coupon_money=$cou['coupon_money'];
                }

            }else{
                $coupon_id=null;
                $coupon_money=0;
            }
            $order_total=Session::get('Cart')->totalPrice + Session::get('fee')- $coupon_money;

            $order->order_total = $order_total;
            $order->coupon_id=$coupon_id;
            $order->shipping_id=$shipping_id;
            $order->order_status='1';
            if(Auth::guard('account_customer')->check()){
                $order->customer_id=Auth::guard('account_customer')->id();
            }else{
                $order->customer_id=null;
            }
            if($order->save()){
                if(Auth::guard('account_customer')->check()){

                }else{
                    Session::forget('fee');
                }
                Session::forget('coupon');
                $orders=Order::where('shipping_id','=',$shipping_id)->first();
                foreach (Session::get('Cart')->products as $value) {
                    $order_details = new Order_Details;
                    $order_details->order_id =$orders->order_id;
                    $order_details->id = $value['productInfo']->id;
                    $order_details->quantity = $value['quanty'];
                    $order_details->unit_price = $value['productInfo']->price - $value['productInfo']->discount;
                    $order_details->total_price = $value['quanty']*($value['productInfo']->price - $value['productInfo']->discount);
                    $order_details->save();
                    $pro=Product::where('id','=',$value['productInfo']->id)->first();
                    if($pro->qty_inventory>0&&$pro->qty_inventory>=$value['quanty']){
                        $pro->update(['qty_inventory'=>$pro->qty_inventory-$value['quanty']]);
                    }else{
                        Order_Details::where('id','=',$value['productInfo']->id)->where('order_id','=',$orders->order_id)
                            ->update(['quantity'=>0,'total_price'=>0]);
                        Order::where('order_id','=',$orders->order_id)->update(['order_status'=>5]);
                    }

                }
                if($coupon_id!=null){
                    $cou=Coupon::where('coupon_id',$coupon_id)->first();
                    $cou->update(['coupon_qty'=> $cou->coupon_qty - 1]);
                }

            }else{
                $shipping_id->delete();
            }
        }
        Session::forget('Cart');
    }

    public function thanh_cong()
    {
        if(Session::get('Cart'))
        {
            return redirect()->back()->with('message','Đặt hàng không thành công');
        }else{
            $logos = Logo::first();
            $categorys = Category::where('category_status', 1)->orderby('category_position', 'asc')->limit(4)->get();
            $cate = Category::orderby('category_position', 'asc')
                ->join('product', 'category.category_id', '=', 'product.idcat')
                ->join('brands', 'product.brand_id', '=', 'brands.brand_id')
                ->get();
            if (Auth::guard('account_customer')->check()) {
                $wishlists = Wishlist::where('customer_id', Auth::guard('account_customer')->id())->get();
            } else {
                $wishlists = null;
            }
            return view('user.page.check_checkout_page.check', compact('wishlists',  'cate', 'logos', 'categorys'));
        }
    }
}
