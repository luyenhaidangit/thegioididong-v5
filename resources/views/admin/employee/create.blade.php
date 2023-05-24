@extends('admin.employee.layout')
@section('content')
    <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group">
            <label for="name">Tên Nhân Viên: </label>
            <input type="text" class="form-control" name="name" >
        </div>
        <div class="form-group">
            <label for="idcat">Danh mục:</label>
            <select name="idcat" class="form-control">
                <option value=''>---Vui lòng chọn danh mục nhân sự ---</option>>
                @foreach ($empcategory as $key =>$cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control"name="image" value="" />
        </div>
        <div class="form-group">
            <label for="description">Mô tả:</label>
            <textarea class="form-control" id="data" name="description"></textarea>
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

@stop

