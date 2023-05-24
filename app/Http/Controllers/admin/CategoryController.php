<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public $viewprefix;

  public $viewnamespace;

  public function __construct() {
    $this->middleware('CheckAdminLogin');
    $this->viewprefix = 'admin.category.';
    $this->viewnamespace = 'panel/category';
  }

  public function index() {
    //
    $categorys = Category::where('category_status','<>',0)->orderby('category_position','desc')->get();
    return view($this->viewprefix . 'index', compact('categorys'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    return view($this->viewprefix . 'create');
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   *
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {
    //
      $max=Category::max('category_position');
    $category = new Category;
    $request->validate([
      'name' => 'required',
      'category_content' => '',
        'status'=> 'required',
        'position'=> '',
        'icon' => ''
    ]);
    $category->category_name = $request->name;
    $category->category_content = $request->category_content;
    $category->category_status = $request->status;
        $category->category_icon = $request->icon;

      $category->category_position = $max+1;
      if ($category->save()) //if(Category::create($request->all()))
    {
      Session::flash('message', 'Thêm danh mục thành công!');
    }
    else {
      Session::flash('error', 'Thêm danh mục thất bại!');
    }
    return redirect()->route('category.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Category  $category
   *
   * @return \Illuminate\Http\Response
   */
  public function show($id) {
      $products = Product::where('idcat',$id)->where('status','<>','0')->orderby('id','desc')->get();
      return view('admin.category.productlist',compact('products'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Category  $category
   *
   * @return \Illuminate\Http\Response
   */
  public function edit(Category $category) {
    //
    return view('admin.category.edit', compact('category'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Category  $category
   *
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Category $category) {
    //

    $category->category_name = $request->name;
    $category->category_content = $request->category_content;
    $category->category_status = $request->status;
      $category->category_icon = $request->icon;
      $category->category_position = $request->position;
    if ($category->save()) //if(Category::create($request->all()))
    {
      Session::flash('message', 'Sửa thành công!');
    }
    else {
      Session::flash('error', 'Sửa thất bại!');
    }
    return redirect()->route('category.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Category  $category
   *
   * @return \Illuminate\Http\Response
   */
  public function destroy(Category $category) {
    //
    if ($category->update(['category_status'=>0])) {
      Session::flash('message', 'Xóa thành công!');
    }
    else {
      Session::flash('error', 'Xóa thất bại!');
    }
    return redirect()->route('category.index');
  }


}
