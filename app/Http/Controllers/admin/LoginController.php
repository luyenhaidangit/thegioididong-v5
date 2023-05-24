<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        
    }
    public function getLogin()
    {
        if (Auth::check()) {
            return view('admin.profile.index');
        } else {
            return view('admin.login');
        }
    }
    public function postLogin(request $request)
    {   
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'status'    =>1,
        ];

          if (Auth::attempt($login)) {
            return view('admin.profile.index');
          }
          else {
            return redirect()
              ->back()
              ->with('status', 'Email hoặc Password không chính xác');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return view('admin.login');
    }
}
?>