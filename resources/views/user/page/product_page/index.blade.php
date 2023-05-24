@extends('user.theme.layout')
@section('content')
    <!-- ============================================== HEADER : END ============================================== -->
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{route('shopping.home')}}">Trang chủ</a></li>
                    <li class='active'>{{$name_page}}</li>
                </ul>
            </div>
            <!-- /.breadcrumb-inner -->
        </div>
        <!-- /.container -->
    </div>
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container" style="margin-bottom: 30px;">
            @if(Session::has('wishlist'))
                <div class="alert alert-success">
                    {{Session::get('wishlist')}}
                </div>
            @endif
            @if(Session::has('comparison'))
                <div class="alert alert-success">
                    {{Session::get('comparison')}}
                </div>
            @endif
            <div class="row">
                <!-- ============================================== SIDEBAR ============================================== -->
                <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                    <!-- ================================== TOP NAVIGATION ================================== -->
                @include('user.page.home.category_menu.categorys_menu')
                <!-- ================================== TOP NAVIGATION : END ================================== -->

                    <div class="sidebar-module-container">
                        <div class="sidebar-filter">
                        @include('user.page.product_page.search')
                        <!-- ============================================== COMPARE============================================== -->
{{--                            <div class="sidebar-widget wow fadeInUp outer-top-vs" style="margin-bottom: 30px;">--}}
{{--                                <h3 class="section-title">Compare products</h3>--}}
{{--                                <div class="sidebar-widget-body">--}}
{{--                                    <div class="compare-report">--}}
{{--                                        <p>You have no <span>item(s)</span> to compare</p>--}}
{{--                                    </div>--}}
{{--                                    <!-- /.compare-report -->--}}
{{--                                </div>--}}
{{--                                <!-- /.sidebar-widget-body -->--}}
{{--                            </div>--}}
                            <!-- /.sidebar-widget -->
                            <!-- ============================================== COMPARE: END ============================================== -->
                            <!-- ============================================== PRODUCT TAGS ============================================== -->
                        @include('user.page.home.the-san-pham.product_tags')
                            <!-- /.sidebar-widget -->
                            <!----------- Testimonials------------->
{{--                        @include('user.page.comment.testimonials')--}}

                            <!-- ============================================== Testimonials: END ============================================== -->
                        </div>
                        <!-- /.sidebar-filter -->
                    </div>
                </div>
                <!-- /.sidemenu-holder -->
                <!-- ============================================== CONTENT ============================================== -->
                <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                    <!-- ========================================== SECTION – HERO ========================================= -->
                @include('user.page.product_page.banner')
                <!-- ========================================= SECTION – HERO : END ========================================= -->
                @include('user.page.product_page.products')
                <!-- /.search-result-container -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#top-banner-and-menu -->
@endsection
