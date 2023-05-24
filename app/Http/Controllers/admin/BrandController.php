<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{

    public $viewprefix;
    public $viewnamespace;
    public function __construct() {
        $this->middleware('CheckAdminLogin');
        $this->viewprefix = 'admin.brand.';
        $this->viewnamespace = 'panel/brand';
    }
    
    // Brand view
    public function index()
    {
        $brands = Brand::where('brand_status','<>',0)->orderby('brand_id','desc')->get();
        return view($this->viewprefix . 'index', compact('brands'));
    }

    // Create view
    public function create()
    {
        $categorys = Category::all();
        return view($this->viewprefix . 'create',compact( 'categorys',));
    }

    // Create
    public function store(Request $request)
    {
        //
        $brand = new Brand();
        $request->validate([
            'brand_name' => 'required',
            'brand_desc' => '',
            'brand_status' => 'required',
        ]);
        $brand->brand_name = $request->brand_name;
        $brand->brand_desc = $request->brand_desc;
        $brand->brand_status = $request->brand_status;
        if ($brand->save()) //if(Category::create($request->all()))
        {
            Session::flash('message', 'Thêm thành công!');
        }
        else {
            Session::flash('error', 'Thêm thất bại!');
        }
        return redirect()->route('brand.index');
    }

    // Product Brand view
    public function show($id)
    {
        //
        $products = Product::where('brand_id',$id)->where('status','<>','0')->orderby('id','desc')->get();
        return view('admin.brand.productlist',compact('products'));
    }

    // Edit
    public function edit(Brand $brand)
    {
        $categorys = Category::all();
        //
        return view('admin.brand.edit', compact('brand','categorys'));
    }

    // Update
    public function update(Request $request, Brand $brand)
    {
        //
        $brand->brand_name = $request->brand_name;
        $brand->brand_desc = $request->brand_desc;
        $brand->brand_status = $request->brand_status;
        if ($brand->save()) //if(Category::create($request->all()))
        {
            Session::flash('message', 'Sửa thành công!');
        }
        else {
            Session::flash('error', 'Sửa thất bại!');
        }
        return redirect()->route('brand.index');
    }

    // Delete
    public function destroy(Brand $brand)
    {
        if ($brand->update(['brand_status'=>0])) {
            Session::flash('message', 'Xóa thành công!');
        }
        else {
            Session::flash('error', 'Xóa thất bại!');
        }
        return redirect()->route('brand.index');
    }
}
