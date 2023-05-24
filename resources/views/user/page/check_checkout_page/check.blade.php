@extends('user.theme.layout')
@section('content')
    <style>
        .check_img {
            width: 30%;
        }
        .thanh-cong {
            background: #157ed2;
            border-radius: 3px;
            padding: 5px;
        }
        .thanh-cong:hover {
            background: #333;
        }
        @media (max-width: 768px) {
            .check_img {
                width: 100%;
            }
        }
    </style>
    <div class="body-content outer-top-bd" style="margin-top: 30px">
        <div class="container" >
            <div class="x-page inner-bottom-sm">
                <div class="row">
                    <div class="col-md-12 x-text text-center">
                        <img class="check_img" src="{!! asset('public\frontend\assets\images\banners\1_sfzYb5vo_niw6-psPdhUkw.gif') !!}">
                        <h3 style="font-weight: 700;color: #0e851d;">ĐẶT HÀNG THÀNH CÔNG</h3>
                        <p style="font-size: 15px;">Đơn hàng của bạn đã được lưu trong hệ thống. Chúng tôi sẽ liên hệ tới bạn trong thời gian sớm nhất.</p>
                        <p style="margin-bottom: 20px">Xin chân thành cảm ơn!</p>
                        <a class="thanh-cong" style="color: white;" href="{{route('shopping.home')}}"><i class="fa fa-home"></i> Quay trở lại cửa hàng.</a>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
@stop
