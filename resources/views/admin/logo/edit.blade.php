@extends('admin.slider.layout')
@section('content')
    <form action="{{route('slider.update', $logo->logo_id)}}" method="POST" enctype="multipart/form-data">
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
            <input type="file" class="form-control" name="logo_image" value="{{$logo->image}}"/>
        </div>
        <div class="form-group">
            <label for="status">Trạng thái:</label>
            <select name="logo_status" class="form-control" id="status">
                @if($logo->status==1)
                    <option value="1">true</option>
                    <option value="0">flase</option>
                @else
                    <option value="0">flase</option>
                    <option value="1">true</option>
                @endif
            </select>
        </div>


        <button type="submit" name="btn_editcategory" class="btn btn-primary">Thực Hiện</button>
    </form>
    </div>
@stop
