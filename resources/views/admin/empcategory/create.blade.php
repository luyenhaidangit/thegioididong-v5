@extends('admin.empcategory.layout')
@section('content')
    <form action="{{ route('empcategory.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Tên danh mục </label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label for="description">Mô tả:</label>
            <textarea class="form-control" id="data" name="description"></textarea>
        </div>


{{--        <div class="form-group">--}}
{{--            <label for="exampleInputPassword1">Trạng thái</label>--}}
{{--            <select name="status" class="form-control input-sm m-bot15">--}}
{{--                <option value="1">Hiển Thị</option>--}}
{{--                <option value="0">Ẩn</option>--}}
{{--            </select>--}}
{{--        </div>--}}
        <button type="submit" name="btn_addblog" class="btn btn-primary">Thực Hiện</button>
    </form>
    </div>
@stop

