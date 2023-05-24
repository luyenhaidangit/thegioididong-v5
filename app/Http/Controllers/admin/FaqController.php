<?php

namespace App\Http\Controllers\admin;

use App\Classes\Helper;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Faq;
use Illuminate\Http\Request;
use Session;

class FaqController extends Controller {
  public function __construct() {
    $this->middleware('CheckAdminLogin');
    $this->viewprefix = 'admin.faq.';
    $this->viewnamespace = 'panel/faq';
    $this->index = 'faq.index';
  }

  // Index view
  public function index() {
    $faqs = Faq::all();
    return view($this->viewprefix . 'index', compact('faqs'));
  }

  // Create view
  public function create() {
    $faqs = Faq::all();
    return view($this->viewprefix . 'create', compact('faqs'));
  }

  // Create
  public function store(Request $request) {
    $data = $request->validate([
      'faq_serial' => '',
      'faq_title' => 'required',
      'faq_description' => 'required',
      'status' => 'required',
    ]);
    if (Faq::create($data)) {
      Session::flash('message', 'Thành công!');
    }
    else {
      Session::flash('message', 'Thất bại!');
    }
    return redirect()->route($this->index);
  }

  // Edit view
  public function edit(Faq $faq) {
    return view($this->viewprefix . 'edit')->with('faq', $faq);
  }

  // Edit
  public function update(Request $request, Faq $faq) {
    $data = $request->validate([
      'faq_serial' => '',
      'faq_title' => 'required',
      'faq_description' => 'required',
      'status' => 'required',
    ]);
    $data['image'] = Helper::imageUpload($request);
    if ($faq->update($data)) {
      Session::flash('message', 'Cập nhật thành công!');
    }
    else {
      Session::flash('message', 'Cập nhật thất bại!');
    }
    return redirect()->route('faq.index');
  }

  // Delete
  public function destroy(Faq $faq)
  {
    if($faq->delete())
      Session::flash('message', 'Thành công!');
    else
      Session::flash('message', 'Thất bại!');
    return redirect()->route('faq.index');
  }

  // Change status
  public function changestatusfaq($id) {
    $faq = Faq::find($id);
    $faq->status = !$faq->status;
    if ($faq->save()) {
      return redirect()->back();
    }
    else {
      return redirect(route('changestatusfaq'));
    }
  }
}
