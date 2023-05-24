<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Điều hướng</li>
                <li>
                    <a href="{{route('dashboard.index')}}" class="waves-effect">
                        <i class="ion-md-speedometer"></i>
                        <span>  Dashboard  </span>
                        <span class="badge badge-info badge-pill float-right"></span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ion-md-phone-portrait"></i>
                        <span> Quản lý sản phẩm </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('product.index')}}">Tất cả Sản phẩm</a></li>
                        <li><a href="{{route('brand.index')}}">Thương hiệu sản phẩm</a></li>
                        <li><a href="{{route('category.index')}}">Danh mục sản phẩm</a></li>
                        <li><a href="{{route('import.index')}}">Quản lý nhập hàng</a></li>
                        <li><a href="{{route('admin.thong-ke')}}">Thống kê nhập hàng</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ion-md-book"></i>
                        <span> Quản lý bài viết </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('about.index')}}">Trang giới thiệu</a></li>
                        <li><a href="{{route('admin.dieukhoan')}}">Trang điều khoản</a></li>
                        <li><a href="{{route('blog.index')}}">Tin tức</a></li>
                        <li><a href="{{route('faq.index')}}">Câu hỏi thường gặp</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ion-md-images"></i>
                        <span> Quản lý hình ảnh </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('logo.index')}}">Logo</a></li>
                        <li><a href="{{route('slider.index')}}">Slider</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ion-ios-cart"></i>
                        <span> Quản lý đơn hàng </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('order.index')}}">Đơn hàng</a></li>
                        <li><a href="{{route('cancel.index')}}">Yêu cầu hủy đơn</a></li>
                        <li><a href="{{route('coupon.index')}}">Voucher giảm giá</a></li>
                        <li><a href="{{route('delivery.index')}}">Phí vận chuyển</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ion-ios-person"></i>
                        <span> Quản lý Nhân Sự </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('empcategory.index')}}">Danh mục nhân sự</a></li>
                        <li><a href="{{route('employee.index')}}">Nhân sự</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="ion-md-people"></i>
                        <span> Quản lý khách hàng </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('customer.index')}}">Thành viên</a></li>
                        <li><a href="{{route('contact.index')}}">Form liên hệ</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{route('user.index')}}" class="waves-effect">
                        <i class="ion-ios-eye"></i>
                        <span> Tài khoản quản trị </span>
                        {{--                        <span class="menu-arrow"></span>--}}
                    </a>
                </li>
                <li>
{{--                    <a href="{{route('filemanager.index')}}" class="waves-effect">--}}
{{--                        <i class="ion-ios-apps"></i>--}}
{{--                        <span> File manager </span>--}}
{{--                        --}}{{--                        <span class="menu-arrow"></span>--}}
{{--                    </a>--}}
                </li>



            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
