@extends('admin.order.layout')
@section('content')
    <div class="clearfix">
        <div class="float-left">
{{--            <h4 class="text-right"><img src="assets\images\logo-dark.png" height="18" alt="moltran"></h4>--}}
        </div>
        <div class="float-right">
            <h5>Mã hóa đơn: #HDBH{{$ord_id}}
            </h5>
        </div>
    </div>
    <hr style="margin-top: 0px">
    <div class="row">
        <div class="col-md-12">

            <div class="float-left mt-6">
                <address>
                    Tên khách hàng:<strong> {{$customer->customer_name}}.</strong><br>
                       Địa chỉ: {{$customer->customer_address}}, {{$customer->shipping_wards}}
                    , {{$customer->shipping_province}}, {{$customer->shipping_city}}<br>
                        Note: {{$customer->customer_note}}<br>
                    <abbr title="Phone">P:</abbr> {{$customer->customer_phone}}
                </address>
            </div>
            <div class="float-right mt-6">
                <p><strong>Ngày đặt hàng: </strong> {{date('d-m-Y',strtotime($order->created_at))}}</p>
                <p class="mt-2">
                    <strong>Tình trạng đơn hàng: </strong>
                    <select name="status" id="status" data-order_id="{{$order->order_id}}" class="badge badge-pink choose">
                        @if($order->order_status==0)
                            <option value='0'>Đã hủy</option>
                        @elseif($order->order_status==1)
                            <option value='1'>Đơn mới</option>
                            <option value='2'>Xác nhận đơn</option>
                        @elseif($order->order_status==2)
                            <option value='2'>Đang chờ xử lý</option>
                            <option value='3'>Vận chuyển</option>
                        @elseif($order->order_status==3)
                            <option value='3'>Đang vận chuyển</option>
                            <option value='4'>Hoàn thành</option>
                        @elseif($order->order_status==4)
                            <option value='4'>Đã hoàn thành</option>
                        @elseif($order->order_status==5)
                            <option value='5'>Đơn hàng lỗi</option>
                        @endif
                    </select>
                </p>
            </div>
        </div>
    </div>
    <div class="mt-5"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table mt-4">
                    <thead style="text-align: center;">
                    <tr>
                        <th>STT</th>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá bán</th>
                        <th>Tổng</th>
                    </tr>
                    </thead>
                    <tbody style="text-align: center;">
                    <?php
                        $total=0;
                        $i=1;
                        ?>
                    @foreach($order_detail as $value)
                        <?php
                        $subtotal = $value->total_price;
                        $total+=$subtotal;
                        ?>
                    <tr>
                        <td>{!! $i++ !!}</td>
                        <td style="text-align: left;">{{$value->name}}</td>
                        <td>{{$value->quantity}}</td>
                        <td>{{number_format($value->unit_price,0,',','.')}}</td>
                        <td>{{number_format($subtotal,0,',','.')}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row" style="border-radius: 0px">
        <div class="col-md-7 offset-md-12"></div>
        <div class="col-md-5 offset-md-12">
            <p class="text-right"><b>Tổng tiền: </b>{{number_format($total,0,',','.')}} VNĐ</p>
            <p class="text-right">Phí vận chuyển: {{number_format($customer->shipping_fee,0,',','.')}} VNĐ</p>
            @if($order->coupon_id==null)
            @else
                <p class="text-right">Phiếu giảm giá: -{{number_format($coupon->coupon_money,0,',','.')}} VNĐ</p>
            @endif
                <hr>
            <h4 class="text-right">Tổng cộng: {{number_format($order->order_total,0,',','.')}} VNĐ</h4>
        </div>
    </div>
    <hr>
    <div class="d-print-none">
        <div class="float-right">
            <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light mr-1"><i class="fa fa-print"></i></a>
            <a href="http://127.0.0.1:8000/panel/user/changestatusorder-detail?order_id={{$order->order_id}}&status={{$order->order_status}}&email=luyenhaidangit@gmail.com" class="btn btn-primary waves-effect waves-light">Submit</a>
        </div>
    </div>
 @stop
