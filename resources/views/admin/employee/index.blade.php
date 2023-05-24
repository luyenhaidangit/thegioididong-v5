@extends('admin.employee.layout')
@section('content')
    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
        <th>STT</th>
        <th>Hình ảnh </th>
        <th>Tên </th>
        <th>Mô tả</th>
        <th>Danh mục </th>
        <th>Trạng Thái</th>
{{--        <th>Xem chi tiết</th>--}}
        <th>Sửa</th>
        <th>Xóa</th>
        </thead>
        <tbody>
        @foreach($employee as $key => $employ)
            <tr>
                <td width="5%">{{$key + 1}}</td>
                <td ><img src="{{asset('public/images/'. $employ->image)}}" width="150px" height="100px"/></td>
                <td width="100px">{!! $employ->name  !!}</td>
                <td width="400px" style="white-space: normal" >{!! $employ->description !!}</td>
                <td>
                    @foreach ($empcategory as $category)
                        @if($category->id == $employ->idcat )
                            {{$category->name}}
                        @endif
                    @endforeach
                </td>
                <td>
                    @if($employ->status == 1)
                          <a href="{{route('employee.changestatus',$employ->id)}}" class="btn btn-success"><i
                                    class="fa fa-unlock"></i></a>
                    @else
                        <a href="{{route('employee.changestatus',$employ->id)}}" class="btn btn-warning"> <i
                                    class="fa fa-lock"></i></a>
                    @endif

                </td>
{{--                <td>--}}
{{--                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal{{$emp->id}}"><i class="fa fa-eye"></i></button>--}}
{{--                </td>--}}
                <td><a href="{{route('employee.edit', $employ->id)}}" class="btn btn-primary"><i
                                class="fa fa-edit"></i></a></td>
                <td>
                    <form action="{{route('employee.destroy', $employ->id)}}" method="POST">
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
