@extends('admin.coupon.layout')
@section('content')
    <form action="{{route('coupon.update', $coupon->coupon_id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="coupon_name">Tên Voucher:</label>
            <input type="text" class="form-control" name="coupon_name" value="{{$coupon->coupon_name}}">
        </div>
        <div class="form-group">
            <label for="coupon_code">Mã Voucher:</label>
            <input type="text" class="form-control" name="coupon_code"value="{{$coupon->coupon_code}}">
        </div>
        <div class="form-group">
            <label for="coupon_money">Giá trị:</label>
            <input type="text" class="form-control" name="coupon_money"value="{{$coupon->coupon_money}}">
        </div>
        <div class="form-group">
            <label for="coupon_qty">Số lượng:</label>
            <input type="text" class="form-control" name="coupon_qty"value="{{$coupon->coupon_qty}}">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Trạng thái</label>
            <select name="status" class="form-control input-sm m-bot15">
                <option value="1">Hiển Thị</option>
                <option value="0">Ẩn</option>
            </select>
        </div>


        <button type="submit" name="btn_editcategory" class="btn btn-primary">Thực Hiện</button>
    </form>
    </div>
@stop
