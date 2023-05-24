<?php

namespace App\Http\Controllers\admin;

use App\Classes\Helper;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Session;

class SliderController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function __construct() {
    $this->middleware('CheckAdminLogin');
    $this->viewprefix = 'admin.slider.';
    $this->viewnamespace = 'panel/slider';
    $this->index = 'slider.index';
  }

  public function index() {
    $sliders = Slider::all();
    return view($this->viewprefix . 'index', compact('sliders'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    $sliders = Slider::all();
    return view($this->viewprefix . 'create', compact('sliders'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   *
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {
    $data = $request->validate([
      'image' => 'required',
      'slider_small_title' => '',
      'slider_big_title' => '',
      'highlight_text' => '',
      'slider_description' => '',
      'slider_link' => '',
      'slider_title_button' => '',
      'status' => 'required',
    ], [
      'image.required' => 'Hình ảnh không được để trống',
    ]);
    $data['image'] = Helper::imageUpload($request);
    if (Slider::create($data)) {
      Session::flash('message', 'successfully!');
    }
    else {
      return redirect()->back()->withErrors($data);
    }

    return redirect()->route($this->index);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Slider  $Slider
   *
   * @return \Illuminate\Http\Response
   */
  public function show(Slider $Slider) {

  }

  public function edit(Slider $slider) {
    return view($this->viewprefix . 'edit')->with('slider', $slider);
    // return view($this->viewprefix.'edit',compact('product'));
  }

  public function update(Request $request, Slider $slider) {
    $data = $request->validate([
      'image' => 'required',
      'slider_small_title' => '',
      'slider_big_title' => '',
      'highlight_text' => '',
      'slider_description' => '',
      'slider_link' => '',
      'slider_title_button' => '',
      'status' => 'required',
    ], [
      'image.required' => 'Hình ảnh không được để trống',
    ]);
    $data['image'] = Helper::imageUpload($request);
    if ($slider->update($data)) {
      Session::flash('message', ' Update successfully!');
    }
    else {
      return redirect()->back()->withErrors($data);
    }
    return redirect()->route('slider.index');
  }


  public function destroy(Slider $slider) {
    if ($slider->delete()) {
      Session::flash('message', 'successfully!');
    }
    else {
      Session::flash('message', 'Failure!');
    }
    return redirect()->route('slider.index');
  }

  public function changestatusslider($id) {
    $slider = Slider::find($id);
    $slider->status = !$slider->status;
    if ($slider->save()) {
      return redirect()->back();
    }
    else {
      return redirect(route('changestatusslider'));
    }
  }

}
