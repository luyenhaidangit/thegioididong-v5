@extends('admin.category.layout')
@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            <p>{{ session('message') }}</p>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            <p>{{ session('error') }}</p>
        </div>
    @endif
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <thead style="text-align: center">
  <th >STT</th>
    <th>Tên danh mục</th>
    <th>Trạng thái</th>
    <th>DS sản phẩm</th>
    <th>Sửa</th>
{{--    <th>Lock</th>--}}
    <th>Xóa</th>
  </thead>
  <tbody style="text-align: center">
  @foreach($categorys ?? '' as $category)
      <tr>
          <td>
              {{$category->category_position}}
          </td>
        <td>{{$category->category_name}} </td>
          @if($category->category_status==1)
              <td>Hiển thị</td>
          @else
              <td>Ẩn</td>
          @endif
        <td><a href="{{route('category.show', $category->category_id)}}" class="btn btn-outline-primary"><i class="fa fa-eye"></i></a></td>
        <td><a href="{{route('category.edit', $category->category_id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
        <td>
        <form action="{{route('category.destroy', $category->category_id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>


        </form>
        </td>
      </tr>
      @endforeach
  </tbody>
</table>
@stop
