<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Gallery;
use MongoDB\Driver\Session;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function add_gallery($product_id)
    {
        $pro_id = $product_id;

        return view('admin.gallery.add_gallery', compact('pro_id',));
    }

    public function insert_gallery(Request $request, $pro_id)
    {
        $get_image = $request->file('files');
        if ($get_image) {
            foreach ($get_image as $key => $image) {
                $get_name_image = $image->getClientOriginalName();
                $name_image = current(explode('.', $get_name_image));
                $new_image = $name_image . rand(0, 99) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('frontend/assets/images/gallery'), $new_image);
                $gallery = new Gallery();
                $gallery->gallery_name = $new_image;
                $gallery->gallery_image = $new_image;
                $gallery->product_id = $pro_id;
                $gallery->save();
            }
        }
//        Session::put('message','Thêm thư viện ảnh thành công');
        return redirect()->back();
    }

    public function select_gallery(Request $request)
    {
        $product_id = $request->pro_id;
        $gallery = Gallery::where('product_id', $product_id)->get();
        $gallery_count = $gallery->count();
        $output = '<form>
                    ' . csrf_field() . '
                    <table class="table table-bordered dt-responsive nowrap"
                               style="border-collapse: collapse; border-spacing: 0; width: 100%;text-align: center;">
                            <thead>
                            <th>Tên</th>
                            <th>Hình ảnh</th>
                            </thead>
                            <tbody>';
        if ($gallery_count > 0) {
            foreach ($gallery as $key => $gal) {
                $output .= '<tr>
                                <td contenteditable class="edit_gallery_name" data-gal_id="' . $gal->gallery_id . '">' . $gal->gallery_name . '</td>
                                <td><img src="' . url('/frontend/assets/images/gallery/' . $gal->gallery_image) . '" width="60"/></td>
                                <td>
                                <button type="button" data-gal_id="' . $gal->gallery_id . '"  class="btn btn-danger delete-gallery">Xóa</button>
                                </td>
                            </tr>';
            }
        } else {
            $output .= '<tr>
                            <td colspan="4">Sản phẩm này chưa có ảnh trong thư viện</td>
                        </tr>';
        }
        $output .= '</tbody>
                    </table>
                    </form>
';
        echo $output;
    }

    public function update_gallery(Request $request){
        $gal_id=$request->gal_id;
        $gal_text=$request->gal_text;
        $gallery=Gallery::find($gal_id);
        $gallery->gallery_name=$gal_text;
        $gallery->save();
    }

    public function delete_gallery(Request  $request){
        $gal_id=$request->gal_id;
        $gallery=Gallery::find($gal_id);
        url('/frontend/assets/images/gallery/'.$gallery->gallery_image);
        $gallery->delete();
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
