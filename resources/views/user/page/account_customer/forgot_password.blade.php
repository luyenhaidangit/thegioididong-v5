@extends('user.theme.layout')
@section('content')
    <style>
        .forgot {
            background-color: #fff;
            padding: 0px 10px;
            border: 1px solid #dfdfdf
        }
        .form-forgot {
            background-color: #fff;
            padding: 10px 10px;
            border: 1px solid #dfdfdf;
            margin-top: 20px;
        }
        .forgot-password {
            padding: 0px 230px;
        }
        .forgot-form {
            padding: 20px 20px;
        }
        @media (max-width: 768px) {
            .forgot-password {
                padding: 0px;
            }
            .forgot-form {
                padding: 0px;
            }
        }

    </style>
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{route('shopping.home')}}">Trang chủ</a></li>
                    <li class="active">Lấy lại mật khẩu</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row forgot-password">
                    <div class="col-md-12 create-new-account">
                        @if(Session::has('success'))
                            <div class="alert alert-warning">
                                {{Session::get('success')}}<br>

                            </div
                        @endif
                            @if(Session::has('error'))
                                <div class="alert alert-danger">
                                    {{Session::get('error')}}<br>

                                </div
                            @endif
                        <div class="forgot-form">
                            <div class="forgot">
                                <h3>Quên mật khẩu?</h3>
                                <p style="text-align: left">Thay đổi mật khẩu của bạn trong ba bước đơn giản. Điều này sẽ giúp bạn bảo mật mật khẩu của mình!</p>
                                <ol class="list-unstyled">
                                    <li><span class="text-primary text-medium">1. </span>Nhập địa chỉ email của bạn vào bên dưới.</li>
                                    <li><span class="text-primary text-medium">2. </span>Hệ thống của chúng tôi sẽ gửi cho bạn một liên kết tạm thời.</li>
                                    <li><span class="text-primary text-medium">3. </span>Sử dụng liên kết để đặt lại mật khẩu của bạn.</li>
                                </ol>
                            </div>
                            <form class="form-forgot" action="{{route('customer.postemail')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="email-for-pass">Nhập địa chỉ email của bạn</label>
                                        <input type="email" style="margin: 5px 0px;border-radius: 0px;-webkit-box-shadow: none;box-shadow: none;" class="form-control" id="email-for-pass" name="email" required="">
                                        <span>Nhập địa chỉ email bạn đã sử dụng trong quá trình đăng ký trên TLmobile.xyz. Sau đó, chúng tôi sẽ gửi một liên kết đến địa chỉ này qua email.</span>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-success" type="submit">Lấy mật khẩu</button>
{{--                                    <button class="btn btn-danger" type="submit">Trở lại đăng nhập</button>--}}
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- create a new account -->
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <div id="brands-carousel" class="logo-slider wow fadeInUp">

                <div class="logo-slider-inner">
                    <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                        <div class="item m-t-15">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand1.png" src="assets\images\blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item m-t-10">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand2.png" src="assets\images\blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand3.png" src="assets\images\blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand4.png" src="assets\images\blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand5.png" src="assets\images\blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand6.png" src="assets\images\blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand2.png" src="assets\images\blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand4.png" src="assets\images\blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand1.png" src="assets\images\blank.gif" alt="">
                            </a>
                        </div><!--/.item-->

                        <div class="item">
                            <a href="#" class="image">
                                <img data-echo="assets/images/brands/brand5.png" src="assets\images\blank.gif" alt="">
                            </a>
                        </div><!--/.item-->
                    </div><!-- /.owl-carousel #logo-slider -->
                </div><!-- /.logo-slider-inner -->

            </div><!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div>
@stop
