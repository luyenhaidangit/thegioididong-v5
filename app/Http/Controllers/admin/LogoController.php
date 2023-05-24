<?php

namespace App\Http\Controllers\admin;

use App\Classes\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;
use Illuminate\Support\Facades\Session;
use DB;

class LogoController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckAdminLogin');
        $this->viewprefix='admin.logo.';
        $this->viewnamespace='panel/logo';
        $this->index='logo.index';
    }

    // Logo view
    public function index()
    {
        //
        $logo=Logo::first();
        $count_logo=Logo::all()->count();
        return view($this->viewprefix.'index' ,compact('logo','count_logo'));
    }

    // Create
    public function store(Request $request)
    {
        //
        $data=$request->validate([
            'logo_image' => 'required',
            'logo_status' => 'required',
        ]);

        $data['logo_image'] = Helper::background_imageUpload($request);

        if(Logo::create($data))
            Session::flash('message', 'Thành công!');
        else
            Session::flash('message', 'Thất bại!');
        return redirect()->route($this->index);
    }

    // Edit
    public function update(Request $request, Logo $logo)
    {
        if($request->logo_image===null){
            $logo->logo_image = $request->image;
            $logo->logo_status = $request->logo_status;
            if ($logo->save()) {
                return redirect()->route('logo.index')->with('message', 'Cập nhật thành công!');
            } else {
                return redirect()->route('logo.index')->with('message', 'Cập nhật thất bại!');
            }
        }else{
            $data=$request->validate([
                'logo_image' => '',
                'logo_status' => '',
            ]);
            $data['logo_image'] = Helper::background_imageUpload($request);
            if($logo->update($data))
                Session::flash('message', 'Cập nhật thành công!');
            else
                Session::flash('message', 'Thất bại!');
            return redirect()->route('logo.index');
        }

    }
}
