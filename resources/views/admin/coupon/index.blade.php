@extends('admin.coupon.layout')
@section('content')
    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
        <th>Tên Voucher</th>
        <th>Mã Voucher</th>
        <th>Giá trị</th>
        <th>Số lượng</th>
        <th>Trạng Thái</th>
        <th>Sửa</th>
        <th>Xóa</th>
        </thead>
        <tbody>
        @foreach($coupons as $coupon)
            <tr>
                <td width="400px" style="white-space: normal">{{$coupon->coupon_name}} </td>
                <td>{{$coupon->coupon_code}}</td>
                <td>{{number_format($coupon->coupon_money)}}</td>
                <td>{{$coupon->coupon_qty}}</td>
                {{--                <td><a href="#" class="btn btn-outline-primary"><i class="fa fa-eye"></i></a>--}}
                {{--                    <a href="{{route('slider.edit', $slider->slider_id)}}" class="btn btn-primary"><i--}}
                {{--                                class="fa fa-edit"></i></a>--}}
                {{--                    <a href="" class="btn btn-warning"><i class="fa fa-lock"></i></a>--}}
                {{--                </td>--}}
                {{--                <td><a href="{{route('slider.edit', $slider->slider_id)}}" class="btn btn-primary"><i--}}
                {{--                                class="fa fa-edit"></i></a></td>--}}
                {{--                <td><a href="" class="btn btn-warning"><i class="fa fa-lock"></i></a></td>--}}
                <td>
                    @if($coupon->status==1)
                        <a href="{{route('coupon.changestatus',$coupon->coupon_id)}}" class="btn btn-success"><i
                                    class="fa fa-unlock"></i></a>
                    @else
                        <a href="{{route('coupon.changestatus',$coupon->coupon_id)}}" class="btn btn-warning"> <i
                                    class="fa fa-lock"></i></a>
                    @endif
                </td>
                <td><a href="{{route('coupon.edit', $coupon->coupon_id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                <td>
                    <form action="{{route('coupon.destroy', $coupon->coupon_id)}}" method="POST">
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
