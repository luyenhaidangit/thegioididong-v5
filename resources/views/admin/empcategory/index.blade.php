@extends('admin.empcategory.layout')
@section('content')
    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
        <th>STT</th>
        <th>Tiêu đề </th>
        <th>Mô tả</th>
{{--        <th>Xem chi tiết</th>--}}
        <th>Sửa</th>
        <th>Xóa</th>
        </thead>
        <tbody>
        @foreach($empcategory as $key => $emp)
            <tr>
                <td width="5%">{{$key + 1}}</td>
                <td>{!! $emp->name  !!}</td>
                <td width="500px" style="white-space: normal" >{!! $emp->description !!}</td>
{{--                <td>--}}
{{--                    @if($blog->status==1)--}}
{{--                        <a href="{{route('blog.changestatus',$blog->id)}}" class="btn btn-success"><i--}}
{{--                                    class="fa fa-unlock"></i></a>--}}
{{--                    @else--}}
{{--                        <a href="{{route('blog.changestatus',$blog->id)}}" class="btn btn-warning"> <i--}}
{{--                                    class="fa fa-lock"></i></a>--}}
{{--                    @endif--}}

{{--                </td>--}}
{{--                <td>--}}
{{--                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal{{$emp->id}}"><i class="fa fa-eye"></i></button>--}}
{{--                </td>--}}
                <td><a href="{{route('empcategory.edit', $emp->id)}}" class="btn btn-primary"><i
                                class="fa fa-edit"></i></a></td>
                <td>
                    <form action="{{route('empcategory.destroy', $emp->id)}}" method="POST">
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
