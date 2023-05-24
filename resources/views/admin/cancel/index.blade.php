@extends('admin.cancel.layout')
@section('content')
    <div class="dropdown" style="top: -8px; display: -webkit-inline-flex">
        <button style="border-radius: 3px;" class="btn btn-secondary dropdown-toggle" type="button"
                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{$cancel_order->count()}} - {{$sort}}
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item"
               href="{{request()->fullUrlWithQuery(['sort_by'=>'0'])}}">{{$can->where('status','=',0)->count()}} - Yêu cầu đã duyệt</a>
            <a class="dropdown-item"
               href="{{request()->fullUrlWithQuery(['sort_by'=>'1'])}}">{{$can->where('status','=',1)->count()}} -
                Yêu cầu mới</a>
        </div>
    </div>
    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
            @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{Session::get('error')}}
                </div>
            @endif
        <thead>
        <th>Tên khách hàng</th>
        <th>Mã đơn hàng</th>
        <th>Lý do hủy đơn hàng</th>
        <th>Duyệt</th>
        <th>Xóa</th>
        </thead>
        <tbody>
        @foreach($cancel_order as $can)
            <tr>
                @foreach($customer->where('id','=',$can->customer_id) as $cus)
                <td>{{$cus->name}}</td>
                @endforeach
                    <td>#HDBH{{$can->order_id}} <a href="{{route('chi-tiet-hoa-don', $can->order_id)}}" class="btn btn-primary"><i
                                class="fa fa-eye"></i></a></td>
                <td>{!! $can->content !!}</td>
                    <td>
                        @if($can->status==1)
                        <a href="{{route('admin.cancel-order', $can->cancel_id)}}" class="btn btn-primary"><i
                                class="fa fa-check"></i></a>
                        @else
                        @endif
                    </td>
                <td>
                    <form action="{{route('cancel.destroy', $can->cancel_id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
{{----}}
@stop
