@extends('user.theme.layout')
@section('content')
    <!-- ============================================== HEADER : END ============================================== -->
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">
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

                    <!-- ================================== MENU DANH MỤC ================================== -->
                @include('user.page.home.category_menu.categorys_menu')
                <!-- /.side-menu -->
                    <!-- ================================== MENU DANH MỤC : END ================================== -->

                    <!-- ============================================== ƯU ĐÃI KHỦNG ============================================== -->
                @include('user.page.home.hot_deals.hotdeals')
                <!-- ============================================== ƯU ĐÃI KHỦNG: END ============================================== -->

                    <!-- ============================================== ĐỀ NGHỊ ĐẶC BIỆT ============================================== -->
                @include('user.page.home.dong-ho.dong_ho')
                <!-- ============================================== ĐỀ NGHỊ ĐẶC BIỆT : END ============================================== -->

                    <!-- ============================================== THẺ SẢN PHẨM ============================================== -->
                @include('user.page.home.the-san-pham.product_tags')
                <!-- ============================================== THẺ SẢN PHẨM : END ============================================== -->

                    <!-- ============================================== ƯU ĐÃI ĐẶC BIỆT ============================================== -->
                @include('user.page.home.old-phone.may_cu')
                <!-- ============================================== ƯU ĐÃI ĐẶC BIỆT : END ============================================== -->

                    <!-- ============================================== NEWSLETTER ============================================== -->

                    <!-- ============================================== NEWSLETTER: END ============================================== -->

                    <!-- ============================================== Testimonials============================================== -->
                @include('user.page.employee.testimonials')
                <!-- ============================================== Testimonials: END ============================================== -->

                    <div class="home-banner"><img src="{{asset('frontend/assets\images\banners\mau-thiet-ke-giam-gia-iphone.jpg')}}" alt="Image"></div>

                    <!-- /.sidemenu-holder -->
                    <!-- ============================================== SIDEBAR : END ============================================== -->
                </div>
                <!-- /.sidemenu-holder -->
                <!-- ============================================== SIDEBAR : END ============================================== -->

                <!-- ============================================== CONTENT ============================================== -->
                <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                    <!-- ========================================== SECTION – HERO ========================================= -->
                @include('user.page.home.slider.slider')
                <!-- ========================================= SECTION – HERO : END ========================================= -->

                    <!-- ============================================== INFO BOXES ============================================== -->

                    <div class="info-boxes wow fadeInUp">
                        <div class="info-boxes-inner">
                            <div class="row">
                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">Hoàn tiền</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Đảm bảo hoàn tiền trong 30 ngày</h6>
                                    </div>
                                </div>
                                <!-- .col -->

                                <div class="hidden-md col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">VẬN CHUYỂN SIÊU TỐC</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Giao hàng cực nhanh tên toàn quốc</h6>
                                    </div>
                                </div>
                                <!-- .col -->

                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">GIẢM GIÁ ĐẶC BIỆT</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Giảm thêm cho tất cả các mặt hàng</h6>
                                    </div>
                                </div>
                                <!-- .col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.info-boxes-inner -->
                    </div>
                    <!-- /.info-boxes -->
                    <!-- ============================================== INFO BOXES : END ============================================== -->

                    <!-- ============================================== SẢN PHẨM MỚI ============================================== -->

                @include('user.page.home.new-product.new_product')
                <!-- ============================================== SẢN PHẨM MỚI: END ============================================== -->

                    <!-- ============================================== BANNER SLIDE============================================== -->
                @include('user.page.home.banner.banner_slide')
                <!-- ============================================== BANNER SLIDE : END ============================================== -->

                    <!-- ============================================== ĐIỆN THOẠI NỔI BẬT ============================================== -->
                @include('user.page.home.featured-products.phone_products')
                <!-- ============================================== ĐIỆN THOẠI NỔI BẬT: END ============================================== -->

                    <!-- ============================================== BANNER ============================================== -->
                @include('user.page.home.banner.banner')
                <!-- /.wide-banners -->
                    <!-- ============================================== BANNER : END ============================================== -->

                    <!-- ============================================== PHỤ KIỆN ĐIỆN TỬ ============================================== -->
                @include('user.page.home.best_seller.best_seller')
                <!-- ============================================== PHỤ KIỆN ĐIỆN TỬ : END ============================================== -->

                    <!-- ============================================== BLOG SLIDER ============================================== -->
                @include('user.page.home.blog_slider.blog_index')
                <!-- ============================================== BLOG SLIDER : END ============================================== -->

                    <!-- ============================================== LAPTOP NỔI BẬT ============================================== -->
                @include('user.page.home.featured-products.laptop_products')
                <!-- ============================================== LAPTOP NỔI BẬT: END ============================================== -->
                </div>
                <!-- /.homebanner-holder -->
                <!-- ============================================== CONTENT : END ============================================== -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#top-banner-and-menu -->
@endsection
