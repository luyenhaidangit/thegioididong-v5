<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Order_Details;
use App\Models\Customer;
use App\Models\Product;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Session;
use DB;
use App\Classes\Helper;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

        $this->middleware('CheckAdminLogin');
        $this->viewprefix='admin.order.';
        $this->index='order.index';
    }
    public function index(Request $request)
    {
        $customers = Shipping::all();

        $order_details = Order_Details::all();
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by==0){
                $sort='Đơn hàng đã hủy';
                $orders = Order::where('order_status','=',0)
                    ->join('shipping','order.shipping_id','=','shipping.shipping_id')->get();
            }elseif ($sort_by==2){
                $sort='Đơn hàng đã xác nhận';
                $orders = Order::where('order_status','=',2)
                    ->join('shipping','order.shipping_id','=','shipping.shipping_id')->get();
            }elseif ($sort_by==3){
                $sort='Đơn hàng đang vận chuyển';
                $orders = Order::where('order_status','=',3)
                    ->join('shipping','order.shipping_id','=','shipping.shipping_id')->get();
            }elseif ($sort_by==4){
                $sort='Đơn hàng đã giao thành công';
                $orders = Order::where('order_status','=',4)
                    ->join('shipping','order.shipping_id','=','shipping.shipping_id')->get();
            }elseif ($sort_by==5){
                $sort='Đơn hàng vượt số lượng tồn';
                $orders = Order::where('order_status','=',5)
                    ->join('shipping','order.shipping_id','=','shipping.shipping_id')->get();
            } else{
                $sort='Đơn hàng mới';
                $orders = Order::where('order_status','=',1)
                    ->join('shipping','order.shipping_id','=','shipping.shipping_id')->get();
            }
        }else{
            $sort='Đơn hàng mới';
            $orders = Order::where('order_status','=',1)
                ->join('shipping','order.shipping_id','=','shipping.shipping_id')->get();

        }
        $odr=Order::get();
        return view($this->viewprefix.'index', compact('odr','sort','orders','order_details','customers'));
    }

    public function view_order_detail($order_id){
        $ord_id=$order_id;

        $order_detail=DB::table('order_details')
            ->join('product','order_details.id','=','product.id')
            ->where('order_id','=',$order_id)->get();

        $order=Order::where('order_id','=',$order_id)->first();

            $customer_id=$order->shipping_id;
            $coupon_id=$order->coupon_id;
            $shipping_id=$order->shipping_id;

        $customer=Shipping::where('shipping_id',$customer_id)->first();
        $coupon=Coupon::where('coupon_id',$coupon_id)->first();

        return view('admin.order.view_order_detail', compact('order_detail','ord_id'
        ,'order','customer','coupon','shipping_id'));
    }

    public function order_status($order_id){
            Order::where('order_id', $order_id)
            ->update([
                'order_status'	=>	0,
            ]);
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($order_id)
    {
    }
    public function delete_order($order_id){
        $order=Order::where('order_id','=',$order_id)->first();
        if($order->order_status===5) {
            $detail = Order_Details::where('order_id', '=', $order->order_id)->get();
            foreach ($detail as $ord_del) {
                $product = Product::where('id', '=', $ord_del->id)->first();
                if ($ord_del->quantity === 0) {
                    $ord_del->delete();
                } else {
                    $product->update(['qty_inventory' => $product->qty_inventory + $ord_del->quantity]);
                    $ord_del->delete();
                }
            }
            $ship=$order->shipping_id;
            if(Order::where('order_id','=',$order_id)->delete()){
                Shipping::where('shipping_id','=',$ship)->delete();
            }

            return redirect()->back()->with('message','Xóa thành công!');
        }
    }
    public function changestatusorder($order_id) {
        if(DB::table('order')->where('order_id',$order_id)->update(['order_status'=>0])){
            $detail=Order_Details::where('order_id','=',$order_id)->get();
            foreach ($detail as $ord_del){
                $product = Product::where('id', '=', $ord_del->id)->first();
                $product->update(['qty_inventory' => $product->qty_inventory + $ord_del->quantity]);
            }
            return back()->with('message','Hủy đơn hàng thành công!');
        }else{
            return back()->with('message','Hủy đơn hàng không thành công!');
        }
    }
    public function changestatusorder_detail(Request $request) {
        $data=$request->all();
        DB::table('order')->where('order_id',$data['order_id'])->update(['order_status'=>$data['status']]);
        $order_detail=DB::table('order')->where('order_id',$data['order_id'])->first();

        if($data['status']==2){
            $status='Đơn hàng mã: #HDBH'. $order_detail->order_id .' của quý khách đã được xác nhận thành công và đang chờ xử lý.';
        }elseif ($data['status']==3){
            $status='Đơn hàng mã: #HDBH'. $order_detail->order_id .' của quý khách đang được vận chuyển.';
        }elseif ($data['status']==4){
            $status='Đơn hàng mã: #HDBH'. $order_detail->order_id .' đã được giao thành công.';
        }


        $shipping=Shipping::where('shipping_id','=',$order_detail->shipping_id)->first();

        require "app/PHPMailer-master/src/PHPMailer.php";  //nhúng thư viện vào để dùng, sửa lại đường dẫn cho đúng nếu bạn lưu vào chỗ khác
        require "app/PHPMailer-master/src/SMTP.php"; //nhúng thư viện vào để dùng
        require 'app/PHPMailer-master/src/Exception.php'; //nhúng thư viện vào để dùng
        $mail = new PHPMailer(true);  //true: enables exceptions
        try{
            $mail->SMTPDebug = 2;  // 0,1,2: chế độ debug. khi mọi cấu hình đều tớt thì chỉnh lại 0 nhé
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  //SMTP servers
            $mail->SMTPAuth = true; // Enable authentication
            $nguoigui = 'dinhtrongak123@gmail.com';
            $matkhau = 'Honghao170400';
            $tennguoigui = 'TLmobile';
            $mail->Username = $nguoigui; // SMTP username
            $mail->Password = $matkhau;   // SMTP password
            $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL
            $mail->Port = 465;  // port to connect to
            $mail->CharSet = 'UTF-8';
            $mail->setFrom($nguoigui, $tennguoigui);
            $to = $shipping->customer_email;
            $to_name = $shipping->customer_name;

            $mail->addAddress($to, $to_name); //mail và tên người nhận
            $mail->isHTML(true);  // Set email format to HTML
            $mail->Subject = "Thông tin đơn hàng (#HDBH". $order_detail->order_id .")";
            $noidungthu = "<p style='display: contents;'>Xin chào, </p> <b>".$shipping->customer_name."</b><br><p>". $status ."</p>
                           <p>Xin cảm ơn quý khách!</p>
                           <p style='font-style: italic;color: red'>Mọi chi tiết xin vui lòng liên hệ với chúng tôi qua hotline: 0327355517</p>";
            $mail->Body = $noidungthu;
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            if (!$mail->Send()) {
                return redirect()->back()->with('error','Gửi email thất bại.');
//
            } else {
                return redirect()->back()->with('success','Cập nhật trạng thái đơn hàng thành công!');
            }
        }catch (Exception $e) {
            return redirect()->back()->with('error','Đã có lỗi xảy ra! Gửi email thất bại');
        }
    }
}
