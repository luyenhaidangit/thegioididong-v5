@extends('admin.category.layout')
@section('content')
<form action="{{route('category.update', $category->category_id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
     <label for="name">Tên danh mục:</label>
     <input type="text" class="form-control" name="name" value="{{$category->category_name}}">
   </div>
    <div class="form-group">
        <label for="icon">Icon:</label>
        <input type="text" class="form-control" name="icon" value="{{$category->category_icon}}">
    </div>
  <div class="form-group">
    <label for="content">Mô tả:</label>
    <textarea class="form-control" id="contents" name="category_content">{{$category->category_content}}</textarea>
    <script>CKEDITOR.replace('contents');</script>
  </div>
    <div class="form-group">
        <label for="position">Thứ tự:</label>
        <input type="number" class="form-control" name="position" value="{{$category->category_position}}">
    </div>
    <div class="form-group">
        <label for="status">Trạng thái:</label>
        <select name="status" class="form-control" id="status">
            @if($category->category_status==1)
                <option value="1">Hiển thị</option>
                <option value="0">Ẩn</option>
            @else
                <option value="0">Ẩn</option>
                <option value="1">Hiển thị</option>
            @endif
        </select>
    </div>
   <button type="submit" name="btn_editcategory"class="btn btn-primary">Thực Hiện</button>
 </form>
 </div>
 @stop
