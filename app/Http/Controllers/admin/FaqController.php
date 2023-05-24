<?php

namespace App\Http\Controllers\admin;

use App\Classes\Helper;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Faq;
use Illuminate\Http\Request;
use Session;

class FaqController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function __construct() {
    $this->middleware('CheckAdminLogin');
    $this->viewprefix = 'admin.faq.';
    $this->viewnamespace = 'panel/faq';
    $this->index = 'faq.index';
  }

  public function index() {
    $faqs = Faq::all();
    return view($this->viewprefix . 'index', compact('faqs'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    $faqs = Faq::all();
    return view($this->viewprefix . 'create', compact('faqs'));
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
      'faq_serial' => '',
      'faq_title' => 'required',
      'faq_description' => 'required',
      'status' => 'required',
    ]);
    if (Faq::create($data)) {
      Session::flash('message', 'successfully!');
    }
    else {
      Session::flash('message', 'Failure!');
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
  public function show(Faq $faq) {

  }

  public function edit(Faq $faq) {
    return view($this->viewprefix . 'edit')->with('faq', $faq);
    // return view($this->viewprefix.'edit',compact('product'));
  }

  public function update(Request $request, Faq $faq) {
    $data = $request->validate([
      'faq_serial' => '',
      'faq_title' => 'required',
      'faq_description' => 'required',
      'status' => 'required',
    ]);
    $data['image'] = Helper::imageUpload($request);
    if ($faq->update($data)) {
      Session::flash('message', ' Update successfully!');
    }
    else {
      Session::flash('message', 'Failure!');
    }
    return redirect()->route('faq.index');
  }

  public function destroy(Faq $faq)
  {
    if($faq->delete())
      Session::flash('message', 'successfully!');
    else
      Session::flash('message', 'Failure!');
    return redirect()->route('faq.index');
  }
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
