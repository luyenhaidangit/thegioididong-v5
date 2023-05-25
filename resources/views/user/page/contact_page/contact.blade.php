@extends('user.theme.layout')
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{route('shopping.contact')}}">Trang chủ</a></li>
                    <li class='active'>Liên hệ</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="container" style="margin-bottom: 50px;">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
            @if(Session::has('danger'))
                <div class="alert alert-danger">
                    {{Session::get('danger')}}
                </div>
            @endif
        <div class="contact-page">
            <div class="row">
                <div style="width: 100%;padding: 0px 15px;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3726.256043057065!2d106.05742777443204!3d20.94223039074651!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135a30555555555%3A0x39a8acd006ab8e69!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBTxrAgUGjhuqFtIEvhu7kgVGh14bqtdCBIxrBuZyBZw6puLCBDxqEgc-G7nyAy!5e0!3m2!1svi!2s!4v1684971042377!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <a href="https://www.maps.ie/draw-radius-circle-map/"></a></div>


                <div class="col-md-9 contact-form">
                    <h5 style="color: red; font-weight: bold">ĐĂNG KÝ NHẬN TIN</h5>

                    <form method="post" action="{{ route('shopping.addcontact') }}">
                        @csrf
                        <div class="form-group">
                            <label>Tên<span>*</span></label>
                            <input type="text" class="form-control" name="contacts_name" id="name" required=""
                                   placeholder="Tên của bạn">
                            <!-- Show error -->
                            @if ($errors->has('contacts_name'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('contacts_name') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Email<span>*</span></label>
                            <input type="email" class="form-control" name="contacts_email" id="email" required=""
                                   placeholder="example@gmail.com">
                            <!-- Show error -->
                            @if ($errors->has('contacts_email'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('contacts_email') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Tiêu đề<span>*</span></label>
                            <input type="text" class="form-control" name="contacts_title" id="phone"
                                   placeholder="Nhập tiêu đề" required="">
                            <!-- Show error -->
                            @if ($errors->has('contacts_title'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('contacts_title') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Bình luận<span>*</span></label>
                            <textarea class="form-control" name="contacts_comment" id="message" rows="5"></textarea>

                            <!-- Show error -->
                            @if ($errors->has('contacts_comment'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('contacts_comment') }}
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Gửi tin liên hệ
                        </button>
                    </form>
                </div>
                <div class="col-md-3 contact-info">
                    <div class="contact-title">
                        <h4>THÔNG TIN</h4>
                    </div>
                    <div class="clearfix address">
                        <span class="contact-i"><i class="fa fa-map-marker"></i></span>
                        <span class="contact-span">Thôn Chi Long, xã Ngọc Long, huyện Yên Mỹ, tỉnh Hưng Yên</span>
                    </div>
                    <div class="clearfix phone-no">
                        <span class="contact-i"><i class="fa fa-mobile"></i></span>
                        <span class="contact-span">0922002360<br>0877962002</span>
                    </div>
                    <div class="clearfix email">
                        <span class="contact-i"><i class="fa fa-envelope"></i></span>
                        <span class="contact-span"><a href="#">luyenhaidangit@gmail.com</a></span>
                    </div>
                </div>
            </div><!-- /.contact-page -->
        </div><!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div><!-- /.container -->
@stop
