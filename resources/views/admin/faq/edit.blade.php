@extends('admin.faq.layout')
@section('content')
<form action="{{route('faq.update', $faq->faq_id)}}" method="POST" enctype="multipart/form-data">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @csrf
    @method('PUT')
{{--    <div class="form-group">--}}
{{--        <label for="faq_serial">Số thứ tự </label>--}}
{{--        <input type="text" class="form-control" name="faq_serial" value="{{$faq->faq_serial}}">--}}
{{--    </div>--}}
    <div class="form-group">
        <label for="faq_title">Tiêu đề </label>
        <input type="text" class="form-control" name="faq_title" value="{{$faq->faq_title}}">
    </div>
    <div class="form-group">
        <label for="faq_description">Mô tả:</label>
        <textarea class="form-control" id="data"  name="faq_description" >{{$faq->faq_description}}</textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Trạng thái</label>
        <select name="status" class="form-control input-sm m-bot15">
            <option value="1">Hiển Thị</option>
            <option value="0">Ẩn</option>
        </select>
    </div>
    <button type="submit" name="btn_editfaq"class="btn btn-primary">Thực Hiện</button>
 </form>
 </div>
 @stop
