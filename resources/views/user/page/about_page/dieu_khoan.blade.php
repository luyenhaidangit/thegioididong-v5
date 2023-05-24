@extends('user.theme.layout')
@section('content')
    {{--    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=617d60966fc5810019e086e6&product=inline-share-buttons" async="async"></script>    <div id="fb-root"></div>--}}
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{route('shopping.home')}}">Trang chủ</a></li>
                    <li class='active'>Điều khoản dịch vụ</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content" style="margin-bottom: 50px;">
        <div class="container">
            <div class="terms-conditions-page">
                <div class="row">
                    @if($dieu_khoan!=null)
                    <div class="col-md-12 terms-conditions">
                        <h2 style="text-align: center;border-bottom: 1px #e5e5e5 solid!important;font-weight: bold!important;padding-bottom: 10px;">{{$dieu_khoan->about_title}}</h2>
                        <div class="">
                            <p>{!! $dieu_khoan->about_content !!}</p>
                        </div>
                    </div>
                    @else
                    @endif
                </div><!-- /.row -->
                <div class="fb-share-button"
                     data-href="{{route('shopping.about')}}"
                     data-layout="button_count"
                     style="padding: 10px;line-height: normal;background: rgba(128,128,128,0.15);margin-top: 15px;border-radius: 5px;width: 100%;">
                </div>
                {{--                <div class="sharethis-inline-share-buttons"></div>--}}
            </div><!-- /.sigin-in-->
        </div>
    </div>
@stop
