<?php

namespace App\Http\Controllers\admin;

use App\Classes\Helper;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Session;

class SliderController extends Controller {

  public function __construct() {
    $this->middleware('CheckAdminLogin');
    $this->viewprefix = 'admin.slider.';
    $this->viewnamespace = 'panel/slider';
    $this->index = 'slider.index';
  }

  // Slide view
  public function index() {
    $sliders = Slider::all();
    return view($this->viewprefix . 'index', compact('sliders'));
  }

  // Create view
  public function create() {
    $sliders = Slider::all();
    return view($this->viewprefix . 'create', compact('sliders'));
  }

  // Create
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
      Session::flash('message', 'Thành công!');
    }
    else {
      return redirect()->back()->withErrors($data);
    }

    return redirect()->route($this->index);
  }

  // Edit view
  public function edit(Slider $slider) {
    return view($this->viewprefix . 'edit')->with('slider', $slider);
  }

  // Edit
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
      Session::flash('message', ' Cập nhật thành công!');
    }
    else {
      return redirect()->back()->withErrors($data);
    }
    return redirect()->route('slider.index');
  }

  // Delete
  public function destroy(Slider $slider) {
    if ($slider->delete()) {
      Session::flash('message', 'Thành công!');
    }
    else {
      Session::flash('message', 'Thất bại!');
    }
    return redirect()->route('slider.index');
  }

  // Change status
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
