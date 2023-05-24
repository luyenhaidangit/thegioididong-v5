<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Logo;

use App\Models\Wishlist;
use Auth;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Session;

class ContactController extends Controller
{


    public function showForm(Request $request)
    {
        $logos = Logo::first();
        $categorys=Category::where('category_status',1)->orderby('category_position','asc')->limit(4)->get();
        $cate=Category::orderby('category_position','asc')
            ->join('product','category.category_id','=','product.idcat')
            ->join('brands','product.brand_id','=','brands.brand_id')
            ->whereBetween('category_position',[1,10])
            ->get();
        $contacts = Contact::all();
        if (Auth::guard('account_customer')->check()) {
            $wishlists = Wishlist::where('customer_id', Auth::guard('account_customer')->id())->get();
        }else{
            $wishlists=null;
        }
        return view('user.page.contact_page.contact', compact('wishlists','categorys','cate','contacts', 'logos'));
    }


    public function storeForm(Request $request)
    {

        $this->validate($request, [
            'contacts_name' => 'required',
            'contacts_email' => 'required|email',
            'contacts_title' => 'required',
            'contacts_comment' => '',
        ]);
        $lien_he=Contact::get();
        foreach ($lien_he as $contact) {
            if($contact->contacts_email === $request->contacts_email){
                return back()->with('danger', 'Đăng ký nhận tin không thành công. Tài khoản email đã tồn tại!');
            }
        }
        $name = $request->contacts_name;
        $email = $request->contacts_email;
        $title=$request->contacts_title;
        require "app/PHPMailer-master/src/PHPMailer.php";  //nhúng thư viện vào để dùng, sửa lại đường dẫn cho đúng nếu bạn lưu vào chỗ khác
        require "app/PHPMailer-master/src/SMTP.php"; //nhúng thư viện vào để dùng
        require 'app/PHPMailer-master/src/Exception.php'; //nhúng thư viện vào để dùng
        $mail = new PHPMailer(true);  //true: enables exceptions
        try {
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
            $to = $email;
            $to_name = $name;

            $mail->addAddress($to, $to_name); //mail và tên người nhận
            $mail->isHTML(true);  // Set email format to HTML
            $mail->Subject = "Mail xác nhận đã đăng ký liên hệ thành công";
            $noidungthu = "<p style='display: contents;'>Xin chào, </p> <b>".$name."</b><br>
                            <p>Cảm ơn bạn đã quan tâm đến TLmobile, chúng tôi sẽ liên hệ để hỗ trợ cho bạn sớm nhất.</p><p>Xin cảm ơn!</p>";
            $mail->Body = $noidungthu;
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            if (!$mail->Send()) {
                echo "<h1>Loi khi goi mail: " . $mail->ErrorInfo . '</h1>';
            } else {
                Contact::create($request->all());
                return back()->with('success', 'Gửi  yêu cầu liên hệ thành công. Cảm ơn quý khách!');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('danger', 'Đăng ký không thành công');
//            echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
        }
    }


}
