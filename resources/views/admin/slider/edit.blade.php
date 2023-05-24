@extends('admin.slider.layout')
@section('content')
    <form action="{{route('slider.update', $slider->slider_id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{--    <div class="form-group">--}}
        {{--        <label for="image">Image:</label>--}}
        {{--        <input type="file" class="form-control" name="image" value="{{$category->image}}"/>--}}
        {{--    </div>--}}
        {{--    <div class="form-group">--}}
        {{--     <label for="name">Name:</label>--}}
        {{--     <input type="text" class="form-control" name="name" value="{{$category->name}}">--}}
        {{--   </div>--}}
        {{--    <div class="form-group">--}}
        {{--        <label for="name">Name:</label>--}}
        {{--        <input type="text" class="form-control" name="category_name" value="{{$category->category_name}}">--}}
        {{--    </div>--}}
        {{--    --}}
        {{--    <div class="form-group">--}}
        {{--        <label for="content">Description:</label>--}}
        {{--        <textarea class="form-control" id="contents" name="category_desc" >{{$category->category_desc}}</textarea>--}}
        {{--        <script>CKEDITOR.replace('contents');</script>--}}
        {{--    </div>--}}
        {{--  <div class="form-group">--}}
        {{--    <label for="content">Content:</label>--}}
        {{--    <textarea class="form-control" id="contents" name="content">{{$category->content}}</textarea>--}}
        {{--    <script>CKEDITOR.replace('contents');</script>--}}
        {{--  </div>--}}

        <div class="form-group">
            <label for="image">Hình ảnh:</label>
            <input type="file" class="form-control" name="image" value="{{$slider->image}}"/>
            @error('image')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="slider_small_title">Tiêu đề nhỏ:</label>
            <input type="text" class="form-control" name="slider_small_title" value="{{$slider->slider_small_title}}">
        </div>
        <div class="form-group">
            <label for="slider_big_title">Tiêu đề lớn</label>
            <input type="text" class="form-control" name="slider_big_title" value="{{$slider->slider_big_title}}">
        </div>
        <div class="form-group">
            <label for="highlight_text">Highlight</label>
            <input type="text" class="form-control" name="highlight_text" value="{{$slider->highlight_text}}">
        </div>
        <div class="form-group">
            <label for="slider_link">Link</label>
            <input type="text" class="form-control" name="slider_link" value="{{$slider->slider_link}}">
        </div>
        <div class="form-group">
            <label for="slider_title_button">Tiêu đề button</label>
            <input type="text" class="form-control" name="slider_title_button" value="{{$slider->slider_title_button}}">
        </div>
        <div class="form-group">
            <label for="slider_description">Mô tả:</label>
            <textarea class="form-control" id="contents"
                      name="slider_description">{{$slider->slider_description}}</textarea>
            <script>CKEDITOR.replace('contents');</script>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Trạng thái</label>
            <select name="status" class="form-control input-sm m-bot15">
                <option value="1">Hiển Thị</option>
                <option value="0">Ẩn</option>
            </select>
        </div>


        <button type="submit" name="btn_editcategory" class="btn btn-primary">Thực Hiện</button>
    </form>
    </div>
@stop
