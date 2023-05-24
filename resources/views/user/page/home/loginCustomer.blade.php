@extends('user.theme.layout')
@section('content')
    <style>
        .alert-success {
            text-align: center;
        }
        . alert-danger {
            text-align: center;
        }
    </style>
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{route('shopping.home')}}">Trang chủ</a></li>
                    <li class="active">Đăng ký/Đăng nhập</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>

    <div class="body-content">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success">
                    <p>{{ session('success') }}</p>
                </div>
            @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        <p>{{ session('error') }}</p>
                    </div>
                @endif
            <div class="sign-in-page">
                <div class="row">
                    <!-- Sign-in -->
                    <div class="col-md-6 col-sm-6 sign-in" style="margin-bottom: 50px;">
                        <h4 class="">Đăng nhập</h4>
                        <p class="">Xin chào, Chào mừng đến với tài khoản của bạn.</p>
                        <form class="register-form outer-top-xs" role="form" action="{{ route('customer.postLogin') }}"
                              method="post" style="border: 1px solid #d3ced2;border-radius: 5px;padding: 20px;">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="info-title" for="email">Địa chỉ Email <span>*</span></label>
                                <input class="form-control unicase-form-control text-input" type="email" name="email" placeholder="jonh@gmail.com"
                                       autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password">Mật khẩu <span>*</span></label>
                                <input class="form-control unicase-form-control text-input" type="password" name="password"
                                       placeholder="Enter your password" autocomplete="off">
                            </div>
                            @if (session('status'))
                                <div class="alert alert-danger">
                                    <p>{{ session('status') }}</p>
                                </div>
                            @endif
{{--                            <div class="radio outer-xs">--}}
{{--                                <label>--}}
{{--                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Ghi--}}
{{--                                    nhớ!--}}
{{--                                </label>--}}
{{--                                <a href="{{route('customer.forgot')}}" class="forgot-password pull-right">Quên mật khẩu?</a>--}}
{{--                            </div>--}}
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Đăng nhập
                            </button>
                            <a href="{{route('customer.forgot')}}" class="forgot-password pull-right" style="padding: 10px 0px">Quên mật khẩu?</a>
                        </form>
                    </div>

                    <!-- Sign-in -->

                    <!-- create a new account -->
                    <div class="col-md-6 col-sm-6 create-new-account">
                        <h4 class="checkout-subtitle">Tạo tài khoản mới</h4>
                        <p class="text title-tag-line">Tạo tài khoản mới của bạn.</p>
                        <form class="register-form outer-top-xs" role="form" action="{{route('customer.postadd')}}"
                              method="POST" enctype="multipart/form-data" style="border: 1px solid #d3ced2;border-radius: 5px;padding: 20px;">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="info-title" for="name">Họ và tên <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input"
                                       id="exampleInputEmail1" name="name" required>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="phone">Số điện thoại <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input"
                                       id="exampleInputEmail1" name="phone" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="email">Địa chỉ Email <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input"
                                       id="exampleInputEmail2" name="email" placeholder="jonh@gmail.com" required>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="password">Mật khẩu <span>*</span></label>
                                <input type="password" autocomplete="off"
                                       class="form-control unicase-form-control text-input" id="exampleInputEmail1"
                                       name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help is-danger" style="color: red">*{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Đăng ký
                            </button>
                        </form>

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
