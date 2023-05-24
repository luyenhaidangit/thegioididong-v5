@extends('user.theme.layout')
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{route('shopping.home')}}">Trang chủ</a></li>
                    <li class='active'>Giỏ hàng</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-bd" style="margin-top: 0px">
        <div class="container" >
            <div class="x-page inner-bottom-sm" style="background: #fff;margin-bottom: 30px;padding-bottom: 30px;">
                <div class="row">
                    <div class="col-md-12 x-text text-center" style="margin: 50px 0px;">
                        <i class="icon fa fa-shopping-cart" style="font-size: 150px;"></i>
                        <p style="font-size: 15px;margin-bottom: 20px;">Không có sản phẩm nào được thêm vào giỏ hàng. </p>

                        <a href="{{route('shopping.home')}}"><i class="fa fa-home"></i> Quay trở lại cửa hàng.</a>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
@stop
