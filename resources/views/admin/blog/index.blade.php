@extends('admin.blog.layout')
@section('content')

    @foreach($blogs as $blog)
        <div class="modal fade" id="exampleModal{{$blog->blog_id}}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Chi tiết bài viết
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                </thead>
                                <tbody>
                                <tr>
                                    <th style="width:200px">Tiêu đề: </th>
                                    <td width="500px" style="white-space: normal">{{$blog->blog_title}}</td>
                                </tr>
                                <tr>
                                    <th>Hình ảnh : </th>
                                    <td><img src="http://127.0.0.1:8000/images/{{ $blog->image }}" width="200px" height="180px"/></td>
                                </tr>
                                <tr>
                                    <th>Ngày tạo : </th>
                                    <td>{!! $blog->blog_time  !!}</td>
                                </tr>
                                <tr>
                                    <th>Người Tạo : </th>
                                    <td>{{$blog->blog_author}}</td>
                                </tr>
                                <tr>
                                    <th>Mô Tả: </th>
                                    <td>{!! $blog->blog_description !!}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    @endforeach


    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
        <th>Hình ảnh</th>
        <th>Tiêu đề </th>
        <th>Trạng Thái</th>
        <th>Khóa</th>
        <th>Xem chi tiết</th>
        <th>Sửa</th>
        <th>Xóa</th>
        </thead>
        <tbody>
        @foreach($blogs as $blog)
            <tr>
                <td width="5%"><img src="http://127.0.0.1:8000/images/{{ $blog->image }}" width="100px" height="70px"/></td>
                <td width="300px" style="white-space: normal" >{{$blog->blog_title}} </td>
                <td>{{$blog->blog_time}}</td>
                <td>
                    @if($blog->status==1)
                        <a href="{{route('blog.changestatus',$blog->blog_id)}}" class="btn btn-success"><i
                                    class="fa fa-unlock"></i></a>
                    @else
                        <a href="{{route('blog.changestatus',$blog->blog_id)}}" class="btn btn-warning"> <i
                                    class="fa fa-lock"></i></a>
                    @endif

                </td>
                <td>
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal{{$blog->blog_id}}"><i class="fa fa-eye"></i></button>
                </td>
                <td><a href="{{route('blog.edit', $blog->blog_id)}}" class="btn btn-primary"><i
                            class="fa fa-edit"></i></a></td>
                <td>
                    <form action="{{route('blog.destroy', $blog->blog_id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
