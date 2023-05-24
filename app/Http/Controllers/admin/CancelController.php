<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_Details;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cancle_Order;
use App\Models\AccountCustomer;
use Session;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class CancelController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckAdminLogin');
        $this->viewprefix='admin.cancel.';
        $this->viewnamespace='panel/cancel';
        $this->index='cancel.index';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $can=Cancle_Order::get();
        $customer=AccountCustomer::get();
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by==0){
                $sort='Yêu cầu đã duyệt';
                $cancel_order = Cancle_Order::where('status','=',0)->orderby('cancel_id','desc')->get();
            } else{
                $sort='Yêu cầu mới';
                $cancel_order = Cancle_Order::where('status','=',1)->orderby('cancel_id','desc')->get();
            }
        }else{
            $sort='Yêu cầu mới';
            $cancel_order = Cancle_Order::where('status','=',1)->orderby('cancel_id','desc')->get();
        }
        return view($this->viewprefix.'index' ,compact('can','sort','cancel_order','customer'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cancle=Cancle_Order::where('cancel_id',$id)->first();

        if($cancle->delete())
            Session::flash('success', 'Xóa thành công!');
        else
            Session::flash('error', 'Xóa thất bại!');
        return redirect()->route('cancel.index');
    }

    public function cancel($cancel_id){

        $cancel_order=Cancle_Order::where('cancel_id','=',$cancel_id)->first();
        $cancel_order->update(['status'=>0]);
        $customer=AccountCustomer::where('id','=',$cancel_order->customer_id)->first();
        $order=Order::where('order_id','=',$cancel_order->order_id)->first();
        if($order->order_status<3)
        {
            if(Order::where('order_id','=',$cancel_order->order_id)->update(['order_status'=>0])){
                $detail=Order_Details::where('order_id','=',$cancel_order->order_id)->get();
                foreach ($detail as $ord_del){
                    $product = Product::where('id', '=', $ord_del->id)->first();
                    $product->update(['qty_inventory' => $product->qty_inventory + $ord_del->quantity]);
                }

                Session::flash('success', 'Hủy đơn thành công!');

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
                    $to = $customer->email;
                    $to_name = $customer->name;

                    $mail->addAddress($to, $to_name); //mail và tên người nhận
                    $mail->isHTML(true);  // Set email format to HTML
                    $mail->Subject = "Thông tin đơn hàng (#HDBH". $cancel_order->order_id .")";
                    $noidungthu = "<p style='display: contents;'>Xin chào, </p> <b>".$customer->name."</b><br><p>Đơn đặt hàng của quý khách đã được hủy thành công.</p>
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
                        return redirect()->back()->with('error','Gửi email không thành công.');
                    }
                }catch (Exception $e) {
                    return redirect()->back()->with('error','Đã có lỗi xảy ra! Gửi email thất bại');
                }
            }else{
                Session::flash('error', 'Hủy đơn thất bại!');
            }
        }else{
            Session::flash('error', 'Hủy đơn thất bại - đơn hàng đang được vận chuyển!');
        }

        return redirect()->route('cancel.index');
    }
}
