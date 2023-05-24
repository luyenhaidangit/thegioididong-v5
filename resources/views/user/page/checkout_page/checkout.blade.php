@extends('user.theme.layout')
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{route('shopping.home')}}">Trang chủ</a></li>
                    <li><a href="{{route('shopping.cart')}}">Giỏ hàng</a></li>
                    <li class='active'>Đặt hàng</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content" style="margin-bottom: 20px;">
        <div class="container">
            @if (session('message'))
                <div class="alert alert-danger">
                    <p>{{ session('message') }}</p>
                </div>
            @endif
            <div class="checkout_form">
                <div class="checkout-box ">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel-group checkout-steps" id="accordion">
                                <!-- checkout-step-01  -->
                                <div class="panel panel-default checkout-step-01">
                                    <!-- panel-heading -->
                                    <div class="panel-heading" style="margin-bottom: 25px;">
                                        <h4 class="unicase-checkout-title">
                                            <a data-toggle="collapse" class="" data-parent="#accordion"
                                               href="#collapseOne">
                                                <span>*</span>Thông tin giao hàng
                                            </a>
                                        </h4>
                                    </div>
                                    <!-- panel-heading -->
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <form method="POST">
                                            <input type="hidden" name="_token" content="{{csrf_token()}}"
                                                   autocomplete="on">
                                            @if(Session::get('shipping'))

                                                @foreach(Session::get('shipping') as $key => $fee)
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6" style="padding-bottom: 15px;">
                                                        <label>Họ và tên <span style="color: red;">*</span></label>
                                                        <input type="text" class="fullname" required
                                                               style="display: block;padding: 0 15px;color: #373d54;width: 100%;background: #f8fafc;font-size: 14px;height: 40px;border: 1px solid #e0e4f6;transition: all 0.2s;"
                                                               value="{{$fee['name']}}">
                                                    </div>
                                                    <div class="col-md-6 col-sm-6" style="padding-bottom: 15px;">
                                                        <label>Số điện thoại <span style="color: red;">*</span></label>
                                                        <input type="number" class="phone" required
                                                               style="display: block;padding: 0 15px;color: #373d54;width: 100%;background: #f8fafc;font-size: 14px;height: 40px;border: 1px solid #e0e4f6;transition: all 0.2s;"
                                                               value="{{$fee['phone']}}">
                                                    </div>
                                                    <div class="col-md-12" style="padding-bottom: 15px;">
                                                        <label>Địa chỉ Email <span style="color: red;">*</span></label>
                                                        <input type="email" class="email" required
                                                               style="display: block;padding: 0 15px;color: #373d54;width: 100%;background: #f8fafc;font-size: 14px;height: 40px;border: 1px solid #e0e4f6;transition: all 0.2s;"
                                                               value="{{$fee['email']}}">
                                                    </div>
                                                    <div class="col-md-6 col-sm-6" style="padding-bottom: 15px;">
                                                        <label for="city">Tỉnh/Thành phố <span
                                                                style="color: red;">*</span></label>
                                                        <select name="city" id="city" class="choose city"
                                                                style="width: 100%;display: block;padding: 0 15px;color: #373d54;  background: #f8fafc;font-size: 14px;height: 40px;border: 1px solid #e0e4f6;transition: all 0.2s;">
                                                            <option
                                                                value="{{$thanhpho->matp}}">{{$thanhpho->name_city}}</option>
                                                            @foreach($city as $key=>$ci)
                                                                <option
                                                                    value='{{$ci->matp}}'>{{$ci->name_city}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6" style="padding-bottom: 15px;">
                                                        <label for="province">Quận/Huyện <span
                                                                style="color: red;">*</span></label>
                                                        <select name="province" id="province" class="province choose"
                                                                style="width: 100%;display: block;padding: 0 15px;color: #373d54;  background: #f8fafc;font-size: 14px;height: 40px;border: 1px solid #e0e4f6;transition: all 0.2s;">
                                                            <option
                                                                value='{{$quanhuyen->maqh}}'>{{$quanhuyen->name_quanhuyen}}</option>
                                                            @foreach($province as $key=>$prov)
                                                                <option
                                                                    value='{{$prov->maqh}}'>{{$prov->name_quanhuyen}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6" style="padding-bottom: 15px;">
                                                        <label for="wards">Xã/Phường <span
                                                                style="color: red;">*</span></label>
                                                        <select name="wards" id="wards" class="wards"
                                                                style="width: 100%;display: block;padding: 0 15px;color: #373d54;  background: #f8fafc;font-size: 14px;height: 40px;border: 1px solid #e0e4f6;transition: all 0.2s;">
                                                            <option
                                                                value='{{$xaphuong->xaid}}'>{{$xaphuong->name_xaphuong}}</option>
                                                            @foreach($wards as $key=>$wa)
                                                                <option
                                                                    value='{{$wa->xaid}}'>{{$wa->name_xaphuong}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6" style="padding-bottom: 15px;">
                                                        <label>Địa chỉ cụ thể <span style="color: red;">*</span></label>
                                                        <input type="text" class="address" required
                                                               style="display: block;padding: 0 15px;color: #373d54;width: 100%;background: #f8fafc;font-size: 14px;height: 40px;border: 1px solid #e0e4f6;transition: all 0.2s;"
                                                               value="{{$fee['address']}}">
                                                    </div>
                                                    <div class="col-md-12" style="padding-bottom: 15px;">
                                                        <div class="order-notes">
                                                            <label for="order_note">Ghi chú <span
                                                                    style="color: red;">*</span><span>(Không bắt buộc)</span></label>
                                                            <textarea
                                                                style="overflow: auto;height: 100px;width: 100%;border: 1px solid #e0e4f6;background: #f8fafc;padding: 15px 15px;"
                                                                id="order_note"
                                                                placeholder="Ghi chú về đơn đặt hàng của bạn."
                                                                class="note">{{$fee['note']}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6" style="padding-bottom: 15px;">
                                                        <div class="order_button">
                                                            <button type="button" name="calculate_order"
                                                                    class="calculate_delivery"
                                                                    style="width: 100%;display: block;border: none;transition: all 0.2s;font-weight: 600;background: #157ed2;padding: 10px 34px;color: #ffffff;letter-spacing: 0.01em;cursor: pointer;text-transform: uppercase;letter-spacing: 1px;font-size: 14px;">
                                                                Cập nhật thông tin
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            @else
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6" style="padding-bottom: 15px;">
                                                        <label>Họ và tên <span style="color: red;">*</span></label>
                                                        <input type="text" class="fullname" required
                                                               style="display: block;padding: 0 15px;color: #373d54;width: 100%;background: #f8fafc;font-size: 14px;height: 40px;border: 1px solid #e0e4f6;transition: all 0.2s;">
                                                    </div>
                                                    <div class="col-md-6 col-sm-6" style="padding-bottom: 15px;">
                                                        <label>Số điện thoại <span style="color: red;">*</span></label>
                                                        <input type="number" class="phone" required
                                                               style="display: block;padding: 0 15px;color: #373d54;width: 100%;background: #f8fafc;font-size: 14px;height: 40px;border: 1px solid #e0e4f6;transition: all 0.2s;">
                                                    </div>
                                                    <div class="col-md-12" style="padding-bottom: 15px;">
                                                        <label>Địa chỉ Email <span style="color: red;">*</span></label>
                                                        <input type="email" class="email" required
                                                               style="display: block;padding: 0 15px;color: #373d54;width: 100%;background: #f8fafc;font-size: 14px;height: 40px;border: 1px solid #e0e4f6;transition: all 0.2s;">
                                                    </div>
                                                    <div class="col-md-6 col-sm-6" style="padding-bottom: 15px;">
                                                        <label for="city">Tỉnh/Thành phố <span
                                                                style="color: red;">*</span></label>
                                                        <select name="city" id="city" class="choose city"
                                                                style="width: 100%;display: block;padding: 0 15px;color: #373d54;  background: #f8fafc;font-size: 14px;height: 40px;border: 1px solid #e0e4f6;transition: all 0.2s;">
                                                            <option value="">---Vui lòng chọn thành phố---</option>
                                                            @foreach($city as $key=>$ci)
                                                                <option
                                                                    value='{{$ci->matp}}'>{{$ci->name_city}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6" style="padding-bottom: 15px;">
                                                        <label for="province">Quận/Huyện <span
                                                                style="color: red;">*</span></label>
                                                        <select name="province" id="province" class="province choose"
                                                                style="width: 100%;display: block;padding: 0 15px;color: #373d54;  background: #f8fafc;font-size: 14px;height: 40px;border: 1px solid #e0e4f6;transition: all 0.2s;">
                                                            <option value=''>---Vui lòng chọn quận huyện---</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6" style="padding-bottom: 15px;">
                                                        <label for="wards">Xã/Phường <span
                                                                style="color: red;">*</span></label>
                                                        <select name="wards" id="wards" class="wards"
                                                                style="width: 100%;display: block;padding: 0 15px;color: #373d54;  background: #f8fafc;font-size: 14px;height: 40px;border: 1px solid #e0e4f6;transition: all 0.2s;">
                                                            <option value=''>---Vui lòng chọn xã phường---</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6" style="padding-bottom: 15px;">
                                                        <label>Địa chỉ cụ thể <span style="color: red;">*</span></label>
                                                        <input type="text" class="address" required
                                                               style="display: block;padding: 0 15px;color: #373d54;width: 100%;background: #f8fafc;font-size: 14px;height: 40px;border: 1px solid #e0e4f6;transition: all 0.2s;">
                                                    </div>
                                                    <div class="col-md-12" style="padding-bottom: 15px;">
                                                        <div class="order-notes">
                                                            <label for="order_note">Ghi chú <span
                                                                    style="color: red;">*</span><span>(Không bắt buộc)</span></label>
                                                            <textarea
                                                                style="overflow: auto;height: 100px;width: 100%;border: 1px solid #e0e4f6;background: #f8fafc;padding: 15px 15px;"
                                                                id="order_note"
                                                                placeholder="Ghi chú về đơn đặt hàng của bạn."
                                                                class="note"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6" style="padding-bottom: 15px;">
                                                        <div class="order_button">
                                                            <button type="button" name="calculate_order"
                                                                    class="calculate_delivery"
                                                                    style="width: 100%;display: block;border: none;transition: all 0.2s;font-weight: 600;background: #157ed2;padding: 10px 34px;color: #ffffff;letter-spacing: 0.01em;cursor: pointer;text-transform: uppercase;letter-spacing: 1px;font-size: 14px;">
                                                                Cập nhật thông tin
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </form>
                                    </div>
                                    <!-- panel-body  -->
                                </div><!-- row -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- checkout-progress-sidebar -->
                            <form method="POST" style="padding: 20px; background: #fff;margin-bottom: 30px;">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"
                                       autocomplete="on">
                                <h3 style="padding-bottom: 10px;margin: 0px 0px 25px 0px;">Đơn hàng của
                                    bạn</h3>
                                <div class="order_table table-responsive mb-30"
                                     style="border: none;margin-bottom: 0px;">
                                    <table style="margin-bottom: 20px;width: 100%;line-height: 1.7;">
                                        <thead>
                                        <tr>
                                            <th style="width: 70%; padding: 10px 15px;border: 1px solid #c4d8ec;">
                                                Sản phẩm
                                            </th>
                                            <th style="padding: 10px 15px;border: 1px solid #c4d8ec;">Thành
                                                tiền
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(Session::has('Cart') != null)
                                            @foreach(Session::get('Cart')->products as $item)
                                                <tr>
                                                    <td style="padding: 10px 15px;border: 1px solid #c4d8ec;"> {{$item['productInfo']->name}}
                                                        <strong>
                                                            × {{$item['quanty']}}</strong></td>
                                                    <td style="padding: 10px 15px;border: 1px solid #c4d8ec;">
                                                        {{number_format($item['price'],'0',',','.')}}đ
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                        <tfoot>
                                        @if(Session::has('Cart') != null)
                                            <tr>
                                                <th style="padding: 10px 15px;border: 1px solid #c4d8ec;">
                                                    TỔNG TIỀN
                                                </th>
                                                <td style="padding: 10px 15px;border: 1px solid #c4d8ec;">
                                                    <strong>
                                                        {{number_format(Session::get('Cart')->totalPrice,'0',',','.')}}đ
                                                    </strong>
                                                </td>
                                            </tr>
                                            @if(Session::get('fee'))
                                                <tr>
                                                    <th style="padding: 10px 15px;border: 1px solid #c4d8ec;">
                                                        PHÍ GIAO HÀNG
                                                    </th>
                                                    <td style="padding: 10px 15px;border: 1px solid #c4d8ec;">
                                                        <strong>
                                                            {{number_format(Session::get('fee'),'0',',','.')}}đ
                                                        </strong>
                                                    </td>
                                                </tr>
                                            @endif
                                            @if(Session::get('coupon'))
                                                @foreach(Session::get('coupon') as $key => $cou)
                                                    <tr>
                                                        <th style="padding: 10px 15px;border: 1px solid #c4d8ec;">
                                                            MÃ GIẢM GIÁ
                                                        </th>
                                                        <td style="padding: 10px 15px;border: 1px solid #c4d8ec;">
                                                            <strong>- {{number_format($cou['coupon_money'],0,',','.')}}
                                                                đ</strong>
                                                            <a href="javascripts:" class="delete_coupon"
                                                               style="color: red"> (xóa)</a>
                                                        </td>
                                                    </tr>
                                                    <tr class="order_total"
                                                        style="background-color: #fdd922;">
                                                        <th style="padding: 10px 15px;border: 1px solid #c4d8ec;">
                                                            TỔNG ĐƠN HÀNG
                                                        </th>
                                                        <td style="padding: 10px 15px;border: 1px solid #c4d8ec;">
                                                            <strong>
                                                                {{number_format(Session::get('Cart')->totalPrice + Session::get('fee') - $cou['coupon_money'],'0',',','.')}}
                                                                đ
                                                            </strong>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr class="order_total" style="background-color: #fdd922;">
                                                    <th style="padding: 10px 15px;border: 1px solid #c4d8ec;">
                                                        TỔNG ĐƠN HÀNG
                                                    </th>
                                                    <td style="padding: 10px 15px;border: 1px solid #c4d8ec;">
                                                        <strong>
                                                            {{number_format(Session::get('Cart')->totalPrice + Session::get('fee'),'0',',','.')}}
                                                            đ
                                                        </strong>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endif

                                        </tfoot>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="cart-coupon"
                                             style="float: left;width: 100%;display: block;position: relative;margin: 0 0 15px;">
                                            <input placeholder="Mã giảm giá của bạn" type="text" name="coupon"
                                                   class="coupon"
                                                   style="background: #f8fafc;display: block;height: 40px;border: 1px solid #e0e4f6;padding: 0 15px;color: #373d54;width: 80%;">
                                            <a class="cart-coupon-btn add_coupon"
                                               style="position: absolute;top: 0px;right: 0px;border: 1px solid #b3afaa;width: auto;height: 40px;background-color: #fdd922;display: block;transition: all 0.2s;">
                                                <img src="{!! asset('public\user\assets\img/ok.png') !!}"
                                                     alt="your coupon"
                                                     style="padding: 12px 12px;">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="panel-default" style="margin-bottom: 10px; float: right">
                                            <input id="payment" name="check_method" type="checkbox"
                                                   data-target="createp_account" class="check_payment">
                                            <label for="payment" data-toggle="collapse" data-target="#method"
                                                   aria-controls="method">Tôi đã đọc và đồng ý với <a href="{{route('shopping.dieukhoan')}}">điều khoản và điều kiện</a> của website</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="padding: 0px;">
                                        <div class="col-md-6 col-sm-6">

                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="payment_method" style="text-align: -webkit-right;">

                                                <input type="hidden" name="fee" class="fee"
                                                       value="{{Session::get('fee')}}">
                                                <div class="order_button" style="margin-bottom: 10px;">
                                                    <button type="button" name="checkout-btn" class="check_checkout"
                                                            style="width: 100%;display: block;border: none;transition: all 0.2s;font-weight: 600;background: #157ed2;padding: 10px 0px;color: #ffffff;letter-spacing: 0.01em;cursor: pointer;text-transform: uppercase;letter-spacing: 1px;font-size: 14px;">
                                                        Xác nhận đặt hàng
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if (session('message'))
                                    <div class="alert alert-success">
                                        <p>{{ session('message') }}</p>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
