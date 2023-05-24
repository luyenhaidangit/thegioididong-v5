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

  // Category view
  public function index() {
    $categorys = Category::where('category_status','<>',0)->orderby('category_position','desc')->get();
    return view($this->viewprefix . 'index', compact('categorys'));
  }

  // Create view
  public function create() {
    return view($this->viewprefix . 'create');
  }

  // Create
  public function store(Request $request) {
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
    if ($category->save()) 
      {
        Session::flash('message', 'Thêm danh mục thành công!');
      }
      else {
        Session::flash('error', 'Thêm danh mục thất bại!');
      }
      return redirect()->route('category.index');
  }

  // Detail view
  public function show($id) {
      $products = Product::where('idcat',$id)->where('status','<>','0')->orderby('id','desc')->get();
      return view('admin.category.productlist',compact('products'));
  }

  // Edit view
  public function edit(Category $category) {
    //
    return view('admin.category.edit', compact('category'));
  }

  // Update
  public function update(Request $request, Category $category) {
    $category->category_name = $request->name;
    $category->category_content = $request->category_content;
    $category->category_status = $request->status;
      $category->category_icon = $request->icon;
      $category->category_position = $request->position;
    if ($category->save()) 
    {
      Session::flash('message', 'Sửa thành công!');
    }
    else {
      Session::flash('error', 'Sửa thất bại!');
    }
    return redirect()->route('category.index');
  }

  
  // Delete
  public function destroy(Category $category) {
    if ($category->update(['category_status'=>0])) {
      Session::flash('message', 'Xóa thành công!');
    }
    else {
      Session::flash('error', 'Xóa thất bại!');
    }
    return redirect()->route('category.index');
  }
}
