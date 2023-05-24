<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Session;
use App\Classes\Helper;
class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckAdminLogin');
        $this->viewprefix='admin.blog.';
        $this->viewnamespace='panel/blog';
        $this->index='blog.index';
    }
    
    // Blog index
    public function index()
    {
        $blogs = Blog::all();
        return view($this->viewprefix.'index' ,compact('blogs'));
    }

    // Create index
    public function create()
    {
        $blogs = Blog::all();
        return view($this->viewprefix.'create',compact('blogs'));
    }

    // Create
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

    // Edit index
    public function edit(Blog $blog)
    {
        return view($this->viewprefix.'edit')->with('blog', $blog);
    }
    
    // Edit
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
            Session::flash('message', ' Cập nhật thành công!');
        else
            Session::flash('message', 'Cập nhật thất bại!');
        return redirect()->route('blog.index');
    }

    // Delete
    public function destroy(Blog $blog)
    {
        if($blog->delete())
            Session::flash('message', 'Xoá thành công!');
        else
            Session::flash('message', 'Xoá thất bại!');
        return redirect()->route('blog.index');
    }

    // Change status
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
