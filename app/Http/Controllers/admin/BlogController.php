<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Session;
use App\Classes\Helper;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('CheckAdminLogin');
        $this->viewprefix='admin.blog.';
        $this->viewnamespace='panel/blog';
        $this->index='blog.index';
    }
    public function index()
    {
        $blogs = Blog::all();
        return view($this->viewprefix.'index' ,compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blogs = Blog::all();
        return view($this->viewprefix.'create',compact('blogs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'blog_title' => 'required',
            'blog_author' => 'required',
            'blog_time' => 'required',
            'blog_description' => 'required',
            'status' => 'required',
        ]);
        $data['image'] = Helper::imageUpload($request);
        if(Blog::create($data))
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route($this->index);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $Slider
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {

    }
    public function edit(Blog $blog)
    {
        return view($this->viewprefix.'edit')->with('blog', $blog);
        // return view($this->viewprefix.'edit',compact('product'));
    }
    public function update(Request $request, Blog $blog)
    {
        $data=$request->validate([
          'blog_title' => 'required',
          'blog_author' => 'required',
          'blog_time' => 'required',
          'blog_description' => 'required',
          'status' => 'required',
        ]);
        $data['image'] = Helper::imageUpload($request);
        if($blog->update($data))
            Session::flash('message', ' Update successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('blog.index');
    }


    public function destroy(Blog $blog)
    {
        if($blog->delete())
            Session::flash('message', 'successfully!');
        else
            Session::flash('message', 'Failure!');
        return redirect()->route('blog.index');
    }
//
//
//
//    public function productlist($id){
//
//        $products = Slider::find($id)->product;
//        return view('admin.Slider.productlist', compact('products'));
//    }
//
//    public function changestatus($id)
//    {
//        $Slider= Slider::find($id);
//        $Slider->Slider_status=!$Slider->Slider_status;
//        if($Slider->save()){
//            return redirect()->back();
//        }
//        else
//        {
//            return redirect(route('changestatus'));
//        }
//    }
  public function changestatusblog($id) {
    $blog = Blog::find($id);
    $blog->status = !$blog->status;
    if ($blog->save()) {
      return redirect()->back();
    }
    else {
      return redirect(route('changestatusblog'));
    }
  }
}
