@extends('admin.employee.layout')
@section('content')
<form action="{{route('employee.update', $employee->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Tên Nhân Viên: </label>
        <input type="text" class="form-control" name="name" value="{{$employee->name}}">
    </div>
    <div class="form-group">
        <label for="idcat">Danh mục:</label>
        <select name="idcat" class="form-control">
            @foreach ($empcategory as $cate)
                @if($cate->id==$employee->idcat)
                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                @endif
            @endforeach
            @foreach ($empcategory as $cate)
                    @if($cate->id!=$employee->idcat)
                        <option value="{{$cate->id}}">{{$cate->name}}</option>
                    @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" class="form-control"name="image" value="" />
    </div>
    <div class="form-group">
        <label for="description">Mô tả:</label>
        <textarea class="form-control" id="data" name="description">{{$employee->description}}</textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Trạng thái</label>
        <select name="status" class="form-control input-sm m-bot15">
            <option value="1">Hiển Thị</option>
            <option value="0">Ẩn</option>
        </select>
    </div>

    <button type="submit" name="btn_editblog"class="btn btn-primary">Thực Hiện</button>
 </form>
 @stop
