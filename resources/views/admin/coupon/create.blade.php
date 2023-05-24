@extends('admin.coupon.layout')
@section('content')
    <form action="{{ route('coupon.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="coupon_name">Tên Voucher:</label>
            <input type="text" class="form-control" name="coupon_name">
        </div>

        <div class="form-group">
            <label for="coupon_code">Mã Voucher:</label>
            <input type="text" class="form-control" name="coupon_code" value="<?php
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ;@#$5%^&*?/\|?><:!~';
            // Output: 54esmdr0qf
            echo substr(str_shuffle($permitted_chars), 0, 40);
    ?>" >
        </div>
        <div class="form-group">
            <label for="coupon_money">Giá trị:</label>
            <input type="text" class="form-control" name="coupon_money">
        </div>
        <div class="form-group">
            <label for="coupon_qty">Số lượng:</label>
            <input type="text" class="form-control" name="coupon_qty">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Trạng thái</label>
            <select name="status" class="form-control input-sm m-bot15">
                <option value="1">Hiển Thị</option>
                <option value="0">Ẩn</option>
            </select>
        </div>
        <button type="submit" name="btn_coupon" class="btn btn-primary">Thực Hiện</button>
    </form>
    </div>
@stop

