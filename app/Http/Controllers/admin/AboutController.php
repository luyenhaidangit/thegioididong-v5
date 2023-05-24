<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Classes\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\About;
use Session;
use DB;

class AboutController extends Controller
{
    public $viewprefix;
    public $viewnamespace;

    public function __construct()
    {
        $this->middleware('CheckAdminLogin');
        $this->viewprefix='admin.about.';
        $this->viewnamespace='panel/about';
        $this->index = 'about.index';
    }
  
    // About view
    public function index()
    {
        $count=About::where('about_status','<>',2)->count();
        $about=About::first();
        return view($this->viewprefix . 'index', compact('about','count'));
    }
    // Rule view
    public function dieukhoan()
    {
        $count=About::where('about_status','=',2)->count();
        $dieu_khoan=About::where('about_status','=',2)->first();
        return view('admin.dieu_khoan.index', compact('dieu_khoan','count'));
    }

    // Create
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $about = new About();
        $request->validate([
            'image' => 'required',
            'about_title' => 'required',
            'about_content' => 'required',
            'about_status' => 'required',
        ]);
        $about->about_image = $request->image;
        $about->about_image = $this->imageUpload($request);
        $about->about_title = $request->about_title;
        $about->about_content = $request->about_content;
        $about->about_status = $request->about_status;
        if ($about->save()) {
            return redirect()->back()->with('status','Thêm thành công!');
        } else {
            return redirect()->back()->with('error','Thêm thất bại!');
        }
    }

    // Upload
    public function imageUpload(Request $request)
    {
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $this->validate($request,
                    [
                        //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                        'image' => 'mimes:jpg,jpeg,png,gif|max:2048',
                    ],
                    [
                        //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                        'image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                        'image.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                    ]
                );
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('frontend/assets/images/about'), $imageName);
                return $imageName;
            }
        }
        return '';
    }

    // Edit
    public function update(Request $request, About $about)
    {
        if($request->image===null){
            $about->about_image = $request->about_image;
            $about->about_title = $request->about_title;
            $about->about_content = $request->about_content;
            $about->about_status = $request->about_status;
            if($about->save()){
                return redirect()->back()->with('success', 'Cập nhật thành công!');
            }else {
                return redirect()->back()->with('error', 'Cập nhật thất bại!');
            }
        }else{
            $data=$request->validate([
            'image' => 'required',
            'about_title' => 'required',
            'about_content' => 'required',
            'about_status' => 'required',
        ]);
        $data['about_image'] = Helper::imageUpload($request);
        if ($about->update($data)) {
            return redirect()->back()->with('success','Sửa thành công!');
        } else {
            return redirect()->back()->with('error','Sửa thất bại!');
        }
        }
    }
}
