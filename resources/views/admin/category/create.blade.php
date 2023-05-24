@extends('admin.category.layout')
@section('content')
<form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group">
     <label for="name">Tên danh mục:</label>
     <input type="text" class="form-control" name="name">
   </div>
    <div class="form-group">
        <label for="icon">Icon:</label>
        <input type="text" class="form-control" name="icon">
    </div>
  <div class="form-group">
    <label for="content">Nội dung:</label>
    <textarea class="form-control" id="contents" name="category_content"></textarea>
      <script>CKEDITOR.replace('contents');</script>
  </div>
    <div class="form-group">
        <label for="status">Trạng thái:</label>
        <select name="status" class="form-control" id="status">
            <option value='1'>True</option>
            <option value='0'>False</option>
        </select>
    </div>
   <button type="submit" name="btn_addcategory"class="btn btn-primary">Thực Hiện</button>
 </form>
 </div>
 @stop

