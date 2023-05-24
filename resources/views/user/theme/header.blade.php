<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">
    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        @if(Auth::guard('account_customer')->check())
                            <li><a class="login-trigger" style="padding: 0px 5px" href="{{route('customer.profiles')}}"><i
                                        class="icon fa fa-user"></i>Tài khoản</a>
                            </li>
{{--                            <li><a class="login-trigger" style="padding: 0px 5px"--}}
{{--                                   href="{{route('shopping.showWishlist')}}"><i class="icon fa fa-heart"></i>Yêu--}}
{{--                                    thích</a></li>--}}
{{--                            <li><a class="login-trigger" style="padding: 0px 5px" href="{{route('shopping.cart')}}"><i--}}
{{--                                        class="icon fa fa-shopping-cart"></i>Giỏ--}}
{{--                                    hàng</a></li>--}}
                            <li><a class="login-trigger" style="padding: 0px 5px" href="{{route('customer.change_pass')}}"><i
                                        class="icon fa fa-key"></i>Đổi mật khẩu</a></li>
                            <li><a class="login-trigger" style="padding: 0px 5px"
                                   href="{{ route('customer.getLogout') }}"><i class="icon fa fa-lock"></i>Đăng xuất</a>
                            </li>
                        @else
{{--                            <li><a class="login-trigger" style="padding: 0px 5px" class="btn btn-info btn-round"--}}
{{--                                   href="javascript:" data-toggle="modal" data-target="#loginModal"><i--}}
{{--                                        class="icon fa fa-heart"></i>Yêu--}}
{{--                                    thích</a></li>--}}
                            @include('user.page.home.popup_login')
{{--                            <li><a class="login-trigger" style="padding: 0px 5px" href="{{route('shopping.cart')}}"><i--}}
{{--                                        class="icon fa fa-shopping-cart"></i>Giỏ--}}
{{--                                    hàng</a></li>--}}

                            <li><a class="login-trigger" style="padding: 0px 5px" href="{{route('shopping.login')}}"><i
                                        class="icon fa fa-lock"></i>Đăng ký - đăng nhập</a></li>
                            <li><a class="login-trigger" style="padding: 0px 5px" href="{{route('customer.forgot')}}"><i
                                        class="icon fa fa-key"></i>Quên mật khẩu</a></li>
                        @endif
                    </ul>
                </div>
                <div class="clearfix-marquee">
                    <marquee> CHÀO MỪNG BẠN ĐÃ ĐẾN VỚI TLMOBILE!</marquee>
                </div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder" style="margin-top: 8px">
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo">
                        <a href="{{route('shopping.home')}}">
                            @if(isset($logos))
                            <img style="max-height: 46px; max-width: 200px" src="{{asset('public/images/'. $logos->logo_image)}}"alt="logo">
                            @else
                            @endif
                        </a>
                    </div>
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div>

                <div class="col-xs-12 col-sm-12 col-md-5 top-search-holder" style="margin-bottom: 10px;">
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form method="get" action="{{route('product.search')}}">
                            {{ csrf_field() }}
                            <div class="control-group" style="background: #fff;border-radius: 3px;">
                                <input class="search-field" name="search_key" placeholder="Tìm kiếm sản phẩm của bạn..."
                                       autocomplete="off" required>
                                <button type="submit" class="search-button">Tìm kiếm</button>
                            </div>
                        </form>
                    </div>
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div>

                <div class="col-xs-12 col-sm-12 col-md-4" style="padding-top: 8px;display: -webkit-inline-box;">
                    @if(Auth::guard('account_customer')->check())
                        <div class="col-ms-6" style="width: 60%;">
                            <a class="porto-sicon-box-link" href="{{route('customer.profiles')}}">
                                <div class="porto-sicon-box mb-0 style_1 default-icon"
                                     style="display: -webkit-inline-box;">
                                    <div class="porto-sicon-default">
                                        <div id="porto-icon-52133234061711ffb7901c" class="porto-just-icon-wrapper"
                                             style="text-align:center;">
                                            <div class="porto-icon advanced"
                                                 style="color:#ffffff;background:transparent;border-style:solid;border-color:rgba(244,244,244,0.5);border-width:1px;width:47px;height:47px;line-height:50px;border-radius:26px;font-size:25px;display:inline-block;">
                                                <i class="icon fa fa-user" style="font-size: 30px"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="porto-sicon-header" style="margin-left: 10px;">
                                        <h3 class="porto-sicon-title"
                                            style="margin: 7px 0px;font-weight:400;font-size:12px;line-height:12px;color:#ffffff;">
                                            Xin Chào!</h3>
                                        <p style="font-weight:700;font-size:13px;line-height:13px;color:#ffffff;">{{Auth::guard('account_customer')->user()->name}}</p>
                                    </div> <!-- header -->
                                </div><!-- porto-sicon-box -->
                            </a>
                        </div>

                        <div class="col-ms-3" style="width: 17%;text-align: center">
                            <a href="{{route('shopping.showWishlist')}}" title="Wishlist" class="my-wishlist"
                               style="float: right;color: #ffffff;background: transparent;border-style: solid;border-color: rgba(244,244,244,0.5);border-width: 1px;width: 47px;height: 47px;line-height: 50px;border-radius: 26px;font-size: 25px;display: inline-block;">
                                <i class="icon fa fa-heart" style="font-size: 30px;color: #ffffff;"></i>
                                <span id="update-wishlist" style="color: #333;border-radius: 100px;height: 18px;position: absolute;width: 18px;background: #fdd922;color: #0f6cb2;font-size: 11px;text-align: center;line-height: 19px;">
                                    {{$wishlists->count()}}
                                </span>
                            </a>
                        </div>
                    @else
                        <div class="col-ms-6" style="width: 60%;">
                            <a class="porto-sicon-box-link">
                                <div class="porto-sicon-box mb-0 style_1 default-icon"
                                     style="display: -webkit-inline-box;">
                                    <div class="porto-sicon-default">
                                        <div id="porto-icon-52133234061711ffb7901c" class="porto-just-icon-wrapper"
                                             style="text-align:center;">
                                            <div class="porto-icon advanced"
                                                 style="color:#ffffff;background:transparent;border-style:solid;border-color:rgba(244,244,244,0.5);border-width:1px;width:47px;height:47px;line-height:50px;border-radius:26px;font-size:25px;display:inline-block;">
                                                <i class="icon fa fa-user" style="font-size: 30px"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="porto-sicon-header" style="margin-left: 10px;">
                                        <h3 class="porto-sicon-title"
                                            style="margin: 7px 0px;font-weight:400;font-size:12px;line-height:12px;color:#ffffff;">
                                            Xin Chào!</h3>
                                        <p style="font-weight:700;font-size:13px;line-height:13px;color:#ffffff;">Tài
                                            khoản của tôi</p>
                                    </div> <!-- header -->
                                </div><!-- porto-sicon-box -->
                            </a>
                        </div>

                        <div class="col-ms-3" style="width: 17%;text-align: center">
                            <a href="javascript:" data-toggle="modal" data-target="#loginModal" title="Wishlist"
                               class="my-wishlist"
                               style="float: right;color: #ffffff;background: transparent;border-style: solid;border-color: rgba(244,244,244,0.5);border-width: 1px;width: 47px;height: 47px;line-height: 50px;border-radius: 26px;font-size: 25px;display: inline-block;">
                                <i class="icon fa fa-heart" style="font-size: 30px;color: #ffffff;"></i>
                                <span
                                    style="color: #333;border-radius: 100px;height: 18px;position: absolute;width: 18px;background: #fdd922;color: #0f6cb2;font-size: 11px;text-align: center;line-height: 19px;">
                                    0
                                </span>
                            </a>
                        </div>
                    @endif
                    <div class="col-ms-3 animate-dropdown top-cart-row" style="width: 23%;padding-top: 0px">
                        <div id="change-item-cart">
                            <div class="dropdown dropdown-cart">
                                <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown"
                                   style="background: none;border: none;">
                                    <div class="items-cart-inner" style="padding-right: 5px;">
                                        <div class="basket"
                                             style="border-right: none;text-align: center;padding: 0px;color: #ffffff;background: transparent;border-style: solid;border-color: rgba(244,244,244,0.5);border-width: 1px;width: 47px;height: 47px;line-height: 50px;border-radius: 26px;font-size: 25px;display: inline-block;">
                                            <i class="icon fa fa-shopping-cart" style="font-size: 30px;"></i>
                                        </div>
                                        <div class="basket-item-count" style="left: 35px;top: 1px;color: #333;">
                                                <span class="count">
                                                    @if(Session::has('Cart') != null)
                                                        {{Session::get('Cart')->totalQuanty}}
                                                    @else
                                                        0
                                                    @endif
                                                </span>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    @if(Session::has('Cart') != null)
                                        <li>
                                            <div class="clearfix">
                                                <span>{{Session::get('Cart')->totalQuanty}} SẢN PHẨM</span>
                                                <a class="text-v-dark pull-right" href="{{route('shopping.cart')}}">XEM GIỎ HÀNG</a>
                                            </div>
                                            <hr style="margin-top: 10px;margin-bottom: 10px;">
                                            @foreach(Session::get('Cart')->products as $item)
                                                <div class="cart-item product-summary">
                                                    <div class="row cart-detail" style="margin-bottom: 10px;">
                                                        <div class="col-xs-4">
                                                            <div class="image">
                                                                <a href="{{route('product.viewProduct', $item['productInfo']->id)}}"><img
                                                                        src="{{asset('public/images/'.$item['productInfo']->image)}}"
                                                                        alt=""></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-6" style="padding: 0px;">
                                                            <h3 class="name"><a
                                                                    href="{{route('product.viewProduct', $item['productInfo']->id)}}">{{$item['productInfo']->name}}</a>
                                                            </h3>
                                                            <div
                                                                class="price">{{number_format(($item['productInfo']->price - $item['productInfo']->discount),'0',',','.')}}
                                                                VNĐ
                                                                x {{$item['quanty']}}
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-2 action"
                                                             style="border-radius: 50%;box-shadow: 0 2px 6px 0 rgb(0 0 0 / 40%);text-align: center;width: 30px;height: 30px;line-height: 30px;margin-left: 10px;">
                                                            <a onclick="DeleteItemCart({{$item['productInfo']->id}})" href="javascript:"><i class="fa fa-trash"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <!-- <input hidden id="total-quanty-card" type="number" value="{{Session::get('Cart')->totalQuanty}}"> -->
                                            <hr style="margin-top: 10px;margin-bottom: 10px;">
                                            <div class="clearfix cart-total">
                                                <div class="pull-right">
                                                    <span class="text" style="font-size: 14px;font-weight: 700;">Tổng tiền:</span><span class='price'>{{number_format(Session::get('Cart')->totalPrice,'0',',','.')}} VNĐ</span>
                                                </div>
                                            </div>
                                            <a href="{{route('shopping.checkout-page')}}" class="btn btn-upper btn-primary btn-block m-t-20" style="color: #333333b5;background: #fdd922;padding: 10px 20px;margin-top: 10px;font-weight: 900">ĐẶT HÀNG NGAY</a>
                                            <!-- /.cart-total-->
                                    </li>
                                    @else
                                        <li>
                                            <div class="clearfix">
                                                <span>0 SẢN PHẨM</span>
                                                <a class="text-v-dark pull-right" href="{{route('shopping.cart')}}">XEM GIỎ HÀNG</a>
                                            </div>
                                            <hr>
                                            <div class="clearfix cart-total" style="text-align: center;">
                                                <span>Chưa có sản phẩm trong giỏ hàng.</span>
                                            </div>
                                        </li>
                                    @endif
                                </ul>
                                <!-- /.dropdown-menu-->
                            </div>
                            <!-- /.dropdown-cart -->
                            <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                            class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span></button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown yamm-fw">
                                    <a href="{{route('shopping.home')}}">Trang chủ</a>
                                </li>
                                <li class="dropdown"><a href="{{route('shopping.about')}}">Giới Thiệu</a></li>
                                <li class="dropdown mega-menu">
                                    <a href="#" data-hover="dropdown" class="dropdown-toggle"
                                       data-toggle="dropdown">Sản phẩm
{{--                                        <span class="menu-label new-menu hidden-xs">sale</span>--}}
                                    </a>
                                    <ul class="dropdown-menu container">
                                        <li>
                                            <div class="yamm-content">
                                                <div class="row">
                                                    @foreach($categorys as $key => $category)
                                                        <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                                                            <h2 class="title"><a
                                                                    href="{{route('product.show-category', $category->category_id)}}"
                                                                    style="padding:0px">{{$category->category_name}}</a>
                                                            </h2>
                                                            <ul class="links">
                                                                <?php
                                                                $list_brand = array();
                                                                ?>

                                                                @foreach($cate->where('idcat',$category->category_id) as $brand)
                                                                        <?php
                                                                        if(in_array($brand->brand_id, $list_brand)){

                                                                        }else{
                                                                            $list_brand[]=$brand->brand_id;
                                                                            echo "<li>
                                                                            <a href='".route('product.show-brand',$brand->id)."'>".$brand->brand_name."</a>
                                                                        </li>";
                                                                        }
                                                                        ?>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                @endforeach
                                                <!-- /.col -->
                                                    <div class="col-xs-12 col-sm-12 col-md-4 col-menu custom-banner"><a
                                                            href="#"><img alt=""
                                                                          src="{!! asset('public\frontend\assets\images\banners\img.png') !!}"></a>
                                                    </div>
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                            <!-- /.yamm-content --> </li>
                                    </ul>
                                </li>
                                <li class="dropdown hidden-sm"><a href="{{route('shopping.blog')}}">Tin Tức
{{--                                        <span class="menu-label hot-menu hidden-xs">hot</span> --}}
                                    </a>
                                </li>
                                <li class="dropdown"><a href="{{route('shopping.contact')}}">Liên hệ</a></li>
                                <li class="dropdown"><a href="{{route('shopping.faq')}}">Hỗ trợ</a></li>
                                <li class="dropdown  navbar-right special-menu"><a
                                        href="{{route('shopping.coupon')}}"><span
                                            class="menu-label hot-menu hidden-xs">hot</span>Mã giảm giá hôm nay</a></li>
                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->
</header>

