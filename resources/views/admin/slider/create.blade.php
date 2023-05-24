@extends('admin.slider.layout')
@section('content')
    <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="image">Hình ảnh:</label>
            <input type="file" class="form-control" name="image" value=""/>
            @error('image')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="slider_small_title">Tiêu đề nhỏ:</label>
            <input type="text" class="form-control" name="slider_small_title">
        </div>
        <div class="form-group">
            <label for="slider_big_title">Tiêu đề lớn</label>
            <input type="text" class="form-control" name="slider_big_title">
        </div>
        <div class="form-group">
            <label for="highlight_text">Highlight</label>
            <input type="text" class="form-control" name="highlight_text">
        </div>
        <div class="form-group">
            <label for="slider_link">Link</label>
            <input type="text" class="form-control" name="slider_link">
        </div>
        <div class="form-group">
            <label for="slider_title_button">Tiêu đề button</label>
            <input type="text" class="form-control" name="slider_title_button">
        </div>
        <div class="form-group">
            <label for="slider_description">Mô tả:</label>
            <textarea class="form-control" id="contents" name="slider_description"></textarea>
            <script>CKEDITOR.replace('contents');</script>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Trạng thái</label>
            <select name="status" class="form-control input-sm m-bot15">
                <option value="1">Hiển Thị</option>
                <option value="0">Ẩn</option>
            </select>
        </div>
        <button type="submit" name="btn_addslider" class="btn btn-primary">Thực Hiện</button>
    </form>
    </div>
@stop

