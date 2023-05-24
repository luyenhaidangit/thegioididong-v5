<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Import;
use App\Models\Product;
use App\Models\Order;
use App\Models\Order_Details;
use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;
use DB;

class ImportController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckAdminLogin');
        $this->viewprefix = 'admin.import.';
        $this->viewnamespace = 'panel/import';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by==1){
                $sort='Xem danh sách đã hủy';
                $import=Import::join('product','import.product_id','=','product.id')->where('import_status','=',0)->get();
            }else{
                $sort='Xem danh sách hiển thị';
                $import=Import::join('product','import.product_id','=','product.id')->where('import_status','<>',0)->get();
            }
        }else{
            $sort='Xem danh sách hiển thị';
            $import=Import::join('product','import.product_id','=','product.id')->where('import_status','<>',0)->get();
        }
        return view('admin.import.index',compact('sort','import'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        $import=new Import();
        $request->validate([
            'product_id' => 'required',
            'import_qty' => 'required',
            'import_price' => 'required',
        ]);
        $import->product_id=$request->product_id;
        $import->import_qty=$request->import_qty;
        $import->import_price=$request->import_price;
        $import->total_import=$request->import_price * $request->import_qty;
        $import->import_status=1;
        if($import->save()){
            $product=Product::where('id','=',$import->product_id)->first();
            if($product->update(['qty_inventory'=>($request->import_qty + $product->qty_inventory)])){
                Session::flash('message', 'Tạo phiếu nhập thành công!');
            }else{
                $import->delete();
                Session::flash('message', 'Tạo phiếu thất bại!');
            }
        }else{
            Session::flash('message', 'Tạo phiếu nhập thất bại!');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Import $import)
    {
        //
        $inventory=$import->import_qty;
        $import->product_id=$request->product_id;
        $import->import_qty=$request->import_qty;
        $import->import_price=$request->import_price;
        $import->import_status=$request->status;
        $import->total_import=$request->import_qty * $request->import_price;
        if($import->save()){
            $product=Product::where('id',$request->product_id)->first();
            if($product->update(['qty_inventory'=>($product->qty_inventory-$inventory)+$request->import_qty])){
                Session::flash('message', 'Cập nhật thành công!');
            }else{
                Session::flash('message', 'Cập nhật thành công! && Cập nhật số lượng tồn thất bại!');
            }
        }
        else
            Session::flash('message', 'Cập nhật thất bại!');
        return redirect()->route('import.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Import $import)
    {
        if($import->delete()){
            $product=Product::where('id','=',$import->product_id)->first();
            if($product->update(['qty_inventory'=>$product->qty_inventory - $import->import_qty])){
                Session::flash('message', 'Xóa thành công!');
            }else{
                Session::flash('message', 'Xóa thành công! && Cập nhật số lượng tồn thất bại!');
            }
        }
        else
            Session::flash('message', 'Xóa thất bại!');
        return redirect()->route('import.index');
        //
    }

    public function thong_ke(){
        $monthnow = Carbon::now('Asia/Ho_Chi_Minh')->month;
        $yearnow = Carbon::now('Asia/Ho_Chi_Minh')->year;
        $product=Product::where('status','<>',0)->count();
        $import=Import::join('product','product.id','=','import.product_id')
            ->whereMonth('import.created_at', $monthnow)->whereyear('import.created_at', $yearnow)->get();
        $order=Product::join('order_details','order_details.id','product.id')
            ->join('order','order.order_id','order_details.order_id')
            ->where('order_status','<>',0)->where('order_status','<>',5)
            ->get();

        return view('admin.dashboard_import.layout',compact('order','product','import'));
    }

    public function search_thong_ke(Request $request){
        $product=Product::where('status','<>',0)->count();
        $import=Import::join('product','product.id','=','import.product_id')
            ->whereMonth('import.created_at', $request->value_month+1)->whereyear('import.created_at', $request->value_year)->get();
        $order=Product::join('order_details','order_details.id','product.id')
            ->join('order','order.order_id','order_details.order_id')
            ->where('order_status','<>',0)->where('order_status','<>',5)
            ->get();

        return view('admin.dashboard_import.layout',compact('order','product','import'));
    }
}
