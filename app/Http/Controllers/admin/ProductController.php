<?php

namespace App\Http\Controllers\admin;

use App\Classes\Helper;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;

use App\Models\Import;
use App\Models\Product;
use App\Models\Gallery;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\Exception;
use Session;

class ProductController extends Controller
{
    public $viewprefix;
    public $viewnamespace;
    public function __construct()
    {
        $this->middleware('CheckAdminLogin');
        $this->viewprefix = 'admin.product.';
        $this->viewnamespace = 'panel/product';
    }

    // Product view
    public function index()
    {
        $categorys = Category::all();
        $products = Product::where('status','<>','0')->orderby('id','desc')->get();
        $import=Import::get();

        return view($this->viewprefix.'index', compact('products', 'categorys','import'));
    }

    // Create view
    public function create()
    {
        $brands=Brand::all();
        $categorys = Category::all();
        return view($this->viewprefix.'create', compact('categorys','brands'));
    }

    // Create
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $product = new Product;
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'price' => 'required',
            'status' => 'required',
            'idcat' => 'required',
            'brand_id' => 'required',
        ]);

        $product->name = $request->name;
        $product->image = $this->imageUpload($request);
        $product->price = $request->price;

        if($request->discount>=$request->price){
            return redirect()->back()->with('error', 'Giảm giá phải nhỏ hơn giá bán');
        }elseif($request->discount==null){
            $product->discount = 0;
        }else{
            $product->discount = $request->discount;
        }
        
        $product->content = $request->product_content;
        $product->describe = $request->describe;
        $product->status = $request->status;
        $product->idcat = $request->idcat;
        $product->brand_id = $request->brand_id;
        if($request->keywords===null){
            $product->keywords = $request->name;
        }else{
            $product->keywords = $request->keywords;
        }
        $product->link = $request->link;
        $product->view_number=0;
        if($request->import_qty===null){
            $product->qty_inventory=0;
        }else{
            $product->qty_inventory=$request->import_qty;
        }
        if ($product->save()) {
            if($request->import_qty!=null&&$request->import_price!=null&&$request->import_price>0&&$request->import_price<$request->price){
                $import=new Import();
                $import->product_id=$product->id;
                $import->import_qty=$request->import_qty;
                $import->import_price=$request->import_price;
                $import->total_import=$request->import_price * $request->import_qty;
                $import->import_status=1;
                if($import->save()){
                    Session::flash('message', 'Thêm sản phẩm thành công! && Tạo phiếu nhập thành công!');
                }else{
                    Session::flash('message', 'Thêm sản phẩm thành công! && Tạo phiếu nhập thất bại!');
                }
            }else{
                Session::flash('message', 'Thêm sản phẩm thành công! && Tạo phiếu nhập thất bại!');
            }
        } else {
            Session::flash('message', 'Thêm thất bại!');
            return redirect()->route('product.index');
        }

        $pro_id=$product->id;

        $get_image=$request->file('files');
        if($get_image){
            foreach ($get_image as $key=> $image)
            {
                $get_name_image=$image->getClientOriginalName();
                $name_image=current(explode('.',$get_name_image));
                $new_image=$name_image.rand(0,99).'.'.$image->getClientOriginalExtension();
                $image->move(public_path('frontend/assets/images/gallery'),$new_image);
                $gallery=new Gallery();
                $gallery->gallery_name=$new_image;
                $gallery->gallery_image=$new_image;
                $gallery->product_id=$pro_id;
                    $gallery->save();
            }
        }

        return redirect()->route('product.index');
    }

    // Upload image
    public function imageUpload(Request $request)
    {
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $this->validate($request,
                    [
                        //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
                        'image' => 'mimes:jpg,jpeg,png,gif|max:2048',
                    ],
                    [
                        //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                        'image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                        'image.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                    ]
                );
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images'), $imageName);
                return $imageName;
            }
        }
        return '';
    }

    // Edit view
    public function edit(Product $product)
    {
        $brands=Brand::all();
        $categorys = Category::all();

        return view('admin.product.edit', compact('product', 'categorys','brands'));
    }

    // Edit
    public function update(Request $request, Product $product)
    {
        if($request->image===null){
            $product->image = $request->product_image;
            $product->name = $request->name;
            $product->price = $request->price;
            if($request->discount>=$request->price){
                return redirect()->back()->with('error', 'Giảm giá phải nhỏ hơn giá bán');
            }elseif($request->discount==null){
                $product->discount = 0;
            }else{
                $product->discount = $request->discount;
            }
            $product->content = $request->product_content;

            $product->describe = $request->describe;
            $product->status = $request->status;
            $product->status = $request->status;
            $product->idcat = $request->idcat;
            $product->brand_id = $request->brand_id;
            if($request->keywords===null){
                $product->keywords = $request->name;
            }else{
                $product->keywords = $request->keywords;
            }
            $product->link = $request->link;
            $product->view_number = $request->view_number;
            $product->qty_inventory = $request->qty_inventory;

            if ($product->save()) {
                return redirect()->route('product.index')->with('message', 'Sửa thành công!');
            } else {
                return redirect()->back()->with('error', 'Sửa thất bại!');
            }

        }else{
            $data=$request->validate([
                'name' => 'required',
                'image' => 'required',
                'price' => 'required',
                'discount' => '',
                'product_content' => '',
                'describe' => '',
                'link' => '',
                'status' => 'required',
                'idcat' => 'required',
                'brand_id' => 'required',
                'keywords' => '',
                'view_number' => '',
                'qty_inventory' => '',
            ]);

            $data['image'] = $this->imageUpload($request);
            if($request->discount>=$request->price){
                return redirect()->back()->with('error', 'Giảm giá phải nhỏ hơn giá bán');
            }elseif($request->discount==null){
                $data['discount'] = 0;
            }else{
                $data['discount'] = $request->discount;
            }
            if($request->keywords===null){
                $data['keywords'] = $request->name;
            }else{
                $data['keywords'] = $request->keywords;
            }
            if($request->link===null){
                $data['link'] = null;
            }else{
                $data['link'] = $request->link;
            }
            if ($product->update($data)) {
                return redirect()->route('product.index')->with('message', 'Sửa thành công!');
            } else {
                return redirect()->back()->with('error', 'Sửa thất bại!');
            }
        }

    }

    // Delete
    public function destroy(Product $product)
    {
            $product_id=$product->id;
            $gallery=Gallery::where('product_id',$product_id)->get();
            if($gallery){
                $gallery->delete();
                if($product){
                    if($product->delete()){
                        return redirect()->route('product.index')->with('message','xóa sản phẩm thành công!');
                    }else{
                        return redirect()->route('product.index')->with('error','Không thể xóa sản phẩm này!');
                    }
                }else{
                    return redirect()->route('product.index')->with('error','Không thể xóa sản phẩm này!');
                }
            }
            if($product->delete()){
                return redirect()->route('product.index')->with('message','xóa sản phẩm thành công!');
            }else{
                return redirect()->route('product.index')->with('error','Không thể xóa sản phẩm này!');
            }
    }

    public function viewUploads()
    {
        $images1 = Product:: all();
        return view('view_uploads')->with('images', $images1);
    }

    // Change status
  public function changestatusproduct($id) {
    $product = Product::find($id);
    $product->status = !$product->status;
    if ($product->save()) {
      return redirect()->back();
    }
    else {
      return redirect(route('changestatusproduct'));
    }
  }

}
