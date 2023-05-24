<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Empcategory;
use Illuminate\Http\Request;
use Session;

class EmpcategoryController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function __construct() {
    $this->middleware('CheckAdminLogin');
    $this->viewprefix = 'admin.empcategory.';
    $this->viewnamespace = 'panel/empcategory';
    $this->index = 'empcategory.index';
  }

  public function index() {
    $empcategory = Empcategory::all();
    return view($this->viewprefix . 'index', compact('empcategory'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    $empcategory = Empcategory::all();
    return view($this->viewprefix . 'create', compact('empcategory'));
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
      'name' => 'required',
      'description' => 'required',
//      'status' => 'required',
    ]);
    if (Empcategory::create($data)) {
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
   * @param  int  $id
   *
   * @return \Illuminate\Http\Response
   */
  public function show($id) {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   *
   * @return \Illuminate\Http\Response
   */
  public function edit(Empcategory $empcategory) {
    return view($this->viewprefix . 'edit')->with('empcategory', $empcategory);
    // return view($this->viewprefix.'edit',compact('product'));
  }
  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   *
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Empcategory $empcategory) {
    $data = $request->validate([
      'name' => 'required',
      'description' => '',
//      'status' => 'required',
    ]);

    if ($empcategory->update($data)) {
      Session::flash('message', ' Update successfully!');
    }
    else {
      Session::flash('message', 'Failure!');
    }
    return redirect()->route('empcategory.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   *
   * @return \Illuminate\Http\Response
   */
  public function destroy(Empcategory $empcategory) {
    if($empcategory->delete())
      Session::flash('message', 'successfully!');
    else
      Session::flash('message', 'Failure!');
    return redirect()->route('empcategory.index');
  }

}
