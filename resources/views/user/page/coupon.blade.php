@extends('user.theme.layout')
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{route('shopping.home')}}">Trang chủ</a></li>
                    <li class='active'>Mã Giảm giá</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container" style="margin-bottom: 30px">
            <div class="my-wishlist-page">
                <div class="row">
                    <div class="col-md-12 my-wishlist">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th colspan="4" class="heading-title">Voucher Hôm Nay</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($coupons as $key => $coupon)
                                    @if($coupon->status=='1')
                                    <tr style="border-top: 1px solid #ddd;">
                                        <td class="col-md-2"><img
                                                src="{!! asset('public\frontend\assets\images\products\voucher.jpg')!!}"
                                                alt="imga"></td>
                                        <td class="col-md-4">
                                            <div class="product-name"><a href="#">{{$coupon->coupon_name}}</a></div>
                                            <div class="price">Giảm: {{number_format($coupon->coupon_money,'0',',','.')}} VNĐ</div>
                                            <div class="coupon_qty"
                                                 style="margin-top: 10px; font-weight: bolder; color: red;">Số
                                                lượng: {{($coupon->coupon_qty)}}</div>
                                        </td>
                                        <td class="col-md-4" style="padding: 20px 30px;">
                                            <input type="text" class="form-control" name="contacts_name" id="myInput{{$key+1}}"
                                                   required="" value="{{$coupon->coupon_code}}" disabled>
                                        </td>
                                        <td class="col-md-2">
                                            <a href="javascript:" onclick="myFunction({{$key+1}})" class="btn-upper btn btn-primary">Sao chép mã</a>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
@stop
