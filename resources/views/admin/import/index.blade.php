@extends('admin.import.layout')
@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            <p>{{ session('message') }}</p>
        </div>
    @endif
    <div class="dropdown" style="top: -8px; display: -webkit-inline-flex">
        <button style="border-radius: 3px;" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{$sort}}
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{request()->fullUrlWithQuery(['sort_by'=>'1'])}}">Xem danh sách đã hủy</a>
            <a class="dropdown-item" href="{{request()->fullUrlWithQuery(['sort_by'=>'2'])}}">Xem danh sách hiển thị</a>
        </div>
    </div>
    @include('admin.import.model_import')
    <table id="datatable" class="table table-bordered dt-responsive nowrap"
           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
        <th>Mã Nhập</th>
        <th>Ngày nhập</th>
        <th>sản phẩm</th>
        <th>SL nhập</th>
        <th>Đơn giá</th>
        <th>Tổng tiền</th>
        <th>Sửa</th>
        <th>Xóa</th>
        </thead>
        <tbody>
        @foreach($import as $imp)
            <tr>
                <td>{{$imp->import_id}} </td>
                <td>{{date('d-m-Y',strtotime($imp->created_at))}}</td>
                <td width="400px" style="white-space: normal">
                    {{$imp->name}}
                </td>
                <td>{{$imp->import_qty}} </td>
                <td>{{number_format($imp->import_price,'0',',','.')}}đ</td>
                <td>{{number_format($imp->total_import,'0',',','.')}}đ</td>
                <td>
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal{{$imp->import_id}}"><i class="fa fa-edit"></i></button>
                </td>
                <td>
                    <form action="{{route('import.destroy',$imp->import_id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
        @endforeach
        </tbody>
    </table>
@stop
