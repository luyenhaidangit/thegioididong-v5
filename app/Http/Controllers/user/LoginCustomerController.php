<?php

namespace App\Http\Controllers\user;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Models\AccountCustomer;
use App\Models\Category;
use App\Models\Logo;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;
use Mail;
use Illuminate\Support\Collection;

class LoginCustomerController extends Controller {

  public function index() {
      $logos=Logo::first();
      $categorys=Category::all();
      return view('user.page.home.loginCustomer',compact('logos','categorys'));
  }
  public function postadd(request $request) {

    $user = new AccountCustomer();
      $request->validate([
          'name' => 'required',
          'phone' => 'required',
          'email' => 'required',
          'password' => 'required',
      ]);
      $email= $request->email;
      $accountcustomer=AccountCustomer::all();
      foreach ($accountcustomer as $acc){
          if($email==$acc->email){
              Session::flash('message', 'Email đã được đăng ký!');
              return redirect()
                  ->back();
          }
      }
      $user->name = $request->name;
      $user->phone = $request->phone;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);
      if ($user->save()) {
          $login = [
              'email' => $request->email,
              'password' => $request->password,
          ];

          if (Auth::guard('account_customer')->attempt($login)) {
              return redirect()->route('trang-chu');
          }
      }else{
          Session::flash('message', 'Tạo tài khoản thất bại!');
          return redirect()->back();
      }

//      //Kiểm tra mật khẩu có trùng khớp hay không
//    if($password==$confirm_password) {//nếu trùng khớp thì lưu
//        $user->name = $request->name;
//        $user->email = $request->email;
//        $user->password = Hash::make($request->password);
//        $user->phone = $request->phone;
//        if ($user->save()) {
//            $mail=$user->email;
//            $name=$user->name;
//
//            //Gửi mail thông báo
//            $to_name = "TLMobile";
//            $to_email = $mail;//send to this email
//            $data = array("name"=>"Bạn đã đăng ký tài khoản thành công tại TLMobile","body"=>'Được gửi từ tlmobile.xyz'); //body of mail.blade.php
//            Mail::send('user.page.send_mail',$data,function($message) use ($to_name,$to_email){
//                $message->to($to_email)->subject('Cảm ơn bạn đã đăng ký tài khoản tại TLMobile!');//send this mail with subject
//                $message->from($to_email,$to_name);//send from this mail
//            });
//
//            Session::flash('message', 'Tạo tài khoản thành công!');
//
//            //Đăng nhập
//            $login = [
//                'email' => $request->email,
//                'password' => $request->password,
//            ];
//
//            if (Auth::guard('account_customer')->attempt($login)) {
//                return redirect()->back();
//            }
//
//        }else {
//            Session::flash('message', 'Tạo tài khoản thất bại!');
//        }
//    }else{
//        Session::flash('message', 'Mật khẩu không trùng khớp!');
//        return redirect()->back();
//    }
  }

}
