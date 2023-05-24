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
                    <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                            src="https://maps.google.com/maps?width=100%25&amp;height=400&amp;hl=en&amp;q=10.7715174,106.70159678893364+(Flipmart)&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
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
                        <span class="contact-span">Nhà B, 65 Đường Huỳnh Thúc Kháng, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh</span>
                    </div>
                    <div class="clearfix phone-no">
                        <span class="contact-i"><i class="fa fa-mobile"></i></span>
                        <span class="contact-span">+(84) 91.1150.326<br>+(84) 32.7355.517</span>
                    </div>
                    <div class="clearfix email">
                        <span class="contact-i"><i class="fa fa-envelope"></i></span>
                        <span class="contact-span"><a href="#">tlmobile@tlmobile.top</a></span>
                    </div>
                </div>
            </div><!-- /.contact-page -->
        </div><!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div><!-- /.container -->
@stop
