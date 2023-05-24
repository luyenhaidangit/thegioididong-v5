<?php

namespace App\Http\Controllers\admin;

use App\Classes\Helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

class UserController extends Controller {

  public $viewprefix;

  public $viewnamespace;

  public function __construct() {   //$this->middleware('CheckAdminLogin');
    $this->viewprefix = 'admin.user.';
    $this->viewnamespace = 'panel/user';
  }

  public function index() {
    $users = User::all();
    return view($this->viewprefix . 'index', compact('users'));

  }

  public function profile() {
    $user = User::all();
    return view('admin.profile.index',compact('user'));
  }

  public function getadd() {
    return view('admin.user.add');
  }

  // public function postadd(request $request) {

  //   $user = new User;
  //   $user->image = Helper::imageUpload($request);
  //   $user->name = $request->name;
  //   $user->email = $request->email;
  //   $user->password = Hash::make($request->password);
  //   $user->title = $request->title;
  //   $user->phone = $request->phone;
  //   $user->contact = $request->contact;
  //   $user->address = $request->address;
  //   $user->description = $request->description;

  //   $user->save();
  //   return redirect('panel/user');
  // }

  public function postadd(request $request) {

    $user = new User;
    $user->image = Helper::imageUpload($request);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->title = $request->title;
    $user->phone = $request->phone;
    $user->contact = $request->contact;
    $user->address = $request->address;
    $user->description = $request->description;

    $user->save();
    return response()->json('thanh cong', 200);
  }

  //  public function imageUpload(Request $request)
  //  {
  //    if ($request->hasFile('image')) {
  //      if ($request->file('image')->isValid()) {
  //        $this->validate($request,
  //          [
  //            //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
  //            'image' => 'mimes:jpg,jpeg,png,gif|max:2048',
  //          ],
  //          [
  //            //Tùy chỉnh hiển thị thông báo không thõa điều kiện
  //            'image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
  //            'image.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
  //          ]
  //        );
  //        $imageName = time().'.'.$request->image->extension();
  //        $request->image->move(public_path('images'), $imageName);
  //        return $imageName;
  //      }
  //    }
  //    return '';
  //  }
  public function getedit($id) {
    $user = User::findOrFail($id);
    return view($this->viewprefix . 'edit', compact('user'));
  }

  public function postedit($id, request $request) {
    $user = User::findOrFail($id);
    $this->validate($request, [
      'name' => 'required',
      'email' => 'required',
      'password' => 'required',

    ]);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->title = $request->title;
    $user->phone = $request->phone;
    $user->contact = $request->contact;
    $user->address = $request->address;
    $user->description = $request->description;
    $user['image'] = Helper::imageUpload($request);
    if ($user->save()) {
      Session::flash('message', 'successfully!');
    }
    else {
      Session::flash('message', 'Failure!');
    }
    return redirect('panel/user');
  }

  public function delete($id) {
    $user = User::findOrFail($id);
    if ($user->delete()) {
      Session::flash('message', 'successfully!');
    }
    else {
      Session::flash('message', 'Failure!');
    }
    return redirect('panel/user');
  }

  public function changestatus($id) {
    $user = User::find($id);
    $user->status = !$user->status;
    if ($user->save()) {
      return redirect()->back();
    }
    else {
      return redirect(route('changestatus'));
    }
  }

}
