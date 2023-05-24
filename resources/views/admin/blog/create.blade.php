@extends('admin.blog.layout')
@section('content')
    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{ csrf_field() }}
        <div class="form-group">
            <label for="image">Hình ảnh:</label>
            <input type="file" class="form-control" name="image" value=""/>
        </div>
        <div class="form-group">
            <label for="blog_title">Tiêu đề </label>
            <input type="text" class="form-control" name="blog_title">
        </div>
        <div class="form-group">
            <label for="blog_author">Người đăng</label>
            <input type="text" class="form-control" name="blog_author">
        </div>
        <div class="form-group">
            <label for="blog_time">Thời gian</label>
            <input class="form-control" type="datetime-local" id="blog_time"
                   name="blog_time">
        </div>
        <div class="form-group">
            <label for="blog_description">Mô tả:</label>
            <textarea class="form-control" id="data" name="blog_description"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Trạng thái</label>
            <select name="status" class="form-control input-sm m-bot15">
                <option value="1">Hiển Thị</option>
                <option value="0">Ẩn</option>
            </select>
        </div>
        <button type="submit" name="btn_addblog" class="btn btn-primary">Thực Hiện</button>
    </form>
    </div>
@stop

