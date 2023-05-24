@extends('admin.empcategory.layout')
@section('content')
<form action="{{route('empcategory.update', $empcategory->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="blog_title">Tiêu đề </label>
        <input type="text" class="form-control" name="name" value="{{$empcategory->name}}">
    </div>
    <div class="form-group">
        <label for="blog_description">Mô tả:</label>
        <textarea class="form-control" id="data"  name="description" >{{$empcategory->description}}</textarea>

    </div>
{{--    <div class="form-group">--}}
{{--        <label for="exampleInputPassword1">Trạng thái</label>--}}
{{--        <select name="status" class="form-control input-sm m-bot15">--}}
{{--            <option value="1">Hiển Thị</option>--}}
{{--            <option value="0">Ẩn</option>--}}
{{--        </select>--}}
{{--    </div>--}}
    <button type="submit" name="btn_editblog"class="btn btn-primary">Thực Hiện</button>
 </form>
 @stop
