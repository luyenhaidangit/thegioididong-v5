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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $logo=Logo::first();
        $count_logo=Logo::all()->count();
        return view($this->viewprefix.'index' ,compact('logo','count_logo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $logos = Logo::all();
        return view($this->viewprefix.'create',compact('logos'));
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
        $data=$request->validate([
            'logo_image' => 'required',
            'logo_status' => 'required',
        ]);
        $data['logo_image'] = Helper::background_imageUpload($request);
        if(Logo::create($data))
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
    public function show(Request $request,$id)
    {

    }

    public function hien_thi(Request $request)
    {

        $data = $request->all();
        Logo::where('logo_id', $data['id'])
            ->update([
                'logo_status'	=>	$data['result'],
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Logo $logo)
    {
        //
        return view($this->viewprefix.'edit')->with('logo', $logo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
                Session::flash('message', ' Update successfully!');
            else
                Session::flash('message', 'Failure!');
            return redirect()->route('logo.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logo $logo)
    {
        //
        if($logo->delete())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('logo.index');
    }
}
