{{--<!-- ============================================== SIDEBAR CATEGORY ============================================== -->--}}
{{--<div class="sidebar-widget wow fadeInUp">--}}
{{--    <h3 class="section-title">Lọc theo giá</h3>--}}

{{--    <div class="sidebar-widget-body">--}}
{{--        <div class="accordion">--}}
{{--            <div class="accordion-group">--}}
{{--                <div class="accordion-heading"> <a href="#collapseOne" data-toggle="collapse" class="accordion-toggle collapsed"> Camera </a> </div>--}}
{{--                <!-- /.accordion-heading -->--}}
{{--                <div class="accordion-body collapse" id="collapseOne" style="height: 0px;">--}}
{{--                    <div class="accordion-inner">--}}
{{--                        <ul>--}}
{{--                            <li><a href="#">gaming</a></li>--}}
{{--                            <li><a href="#">office</a></li>--}}
{{--                            <li><a href="#">kids</a></li>--}}
{{--                            <li><a href="#">for women</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <!-- /.accordion-inner -->--}}
{{--                </div>--}}
{{--                <!-- /.accordion-body -->--}}
{{--            </div>--}}
{{--            <!-- /.accordion-group -->--}}

{{--            <div class="accordion-group">--}}
{{--                <div class="accordion-heading"> <a href="#collapseTwo" data-toggle="collapse" class="accordion-toggle collapsed"> Desktops </a> </div>--}}
{{--                <!-- /.accordion-heading -->--}}
{{--                <div class="accordion-body collapse" id="collapseTwo" style="height: 0px;">--}}
{{--                    <div class="accordion-inner">--}}
{{--                        <ul>--}}
{{--                            <li><a href="#">gaming</a></li>--}}
{{--                            <li><a href="#">office</a></li>--}}
{{--                            <li><a href="#">kids</a></li>--}}
{{--                            <li><a href="#">for women</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <!-- /.accordion-inner -->--}}
{{--                </div>--}}
{{--                <!-- /.accordion-body -->--}}
{{--            </div>--}}
{{--            <!-- /.accordion-group -->--}}

{{--            <div class="accordion-group">--}}
{{--                <div class="accordion-heading"> <a href="#collapseThree" data-toggle="collapse" class="accordion-toggle collapsed"> Pants </a> </div>--}}
{{--                <!-- /.accordion-heading -->--}}
{{--                <div class="accordion-body collapse" id="collapseThree" style="height: 0px;">--}}
{{--                    <div class="accordion-inner">--}}
{{--                        <ul>--}}
{{--                            <li><a href="#">gaming</a></li>--}}
{{--                            <li><a href="#">office</a></li>--}}
{{--                            <li><a href="#">kids</a></li>--}}
{{--                            <li><a href="#">for women</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <!-- /.accordion-inner -->--}}
{{--                </div>--}}
{{--                <!-- /.accordion-body -->--}}
{{--            </div>--}}
{{--            <!-- /.accordion-group -->--}}

{{--            <div class="accordion-group">--}}
{{--                <div class="accordion-heading"> <a href="#collapseFour" data-toggle="collapse" class="accordion-toggle collapsed"> Bags </a> </div>--}}
{{--                <!-- /.accordion-heading -->--}}
{{--                <div class="accordion-body collapse" id="collapseFour" style="height: 0px;">--}}
{{--                    <div class="accordion-inner">--}}
{{--                        <ul>--}}
{{--                            <li><a href="#">gaming</a></li>--}}
{{--                            <li><a href="#">office</a></li>--}}
{{--                            <li><a href="#">kids</a></li>--}}
{{--                            <li><a href="#">for women</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <!-- /.accordion-inner -->--}}
{{--                </div>--}}
{{--                <!-- /.accordion-body -->--}}
{{--            </div>--}}
{{--            <!-- /.accordion-group -->--}}

{{--            <div class="accordion-group">--}}
{{--                <div class="accordion-heading"> <a href="#collapseFive" data-toggle="collapse" class="accordion-toggle collapsed"> Hats </a> </div>--}}
{{--                <!-- /.accordion-heading -->--}}
{{--                <div class="accordion-body collapse" id="collapseFive" style="height: 0px;">--}}
{{--                    <div class="accordion-inner">--}}
{{--                        <ul>--}}
{{--                            <li><a href="#">gaming</a></li>--}}
{{--                            <li><a href="#">office</a></li>--}}
{{--                            <li><a href="#">kids</a></li>--}}
{{--                            <li><a href="#">for women</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <!-- /.accordion-inner -->--}}
{{--                </div>--}}
{{--                <!-- /.accordion-body -->--}}
{{--            </div>--}}
{{--            <!-- /.accordion-group -->--}}

{{--            <div class="accordion-group">--}}
{{--                <div class="accordion-heading"> <a href="#collapseSix" data-toggle="collapse" class="accordion-toggle collapsed"> Accessories </a> </div>--}}
{{--                <!-- /.accordion-heading -->--}}
{{--                <div class="accordion-body collapse" id="collapseSix" style="height: 0px;">--}}
{{--                    <div class="accordion-inner">--}}
{{--                        <ul>--}}
{{--                            <li><a href="#">gaming</a></li>--}}
{{--                            <li><a href="#">office</a></li>--}}
{{--                            <li><a href="#">kids</a></li>--}}
{{--                            <li><a href="#">for women</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <!-- /.accordion-inner -->--}}
{{--                </div>--}}
{{--                <!-- /.accordion-body -->--}}
{{--            </div>--}}
{{--            <!-- /.accordion-group -->--}}

{{--        </div>--}}
{{--        <!-- /.accordion -->--}}
{{--    </div>--}}
{{--    <!-- /.sidebar-widget-body -->--}}
{{--</div>--}}
{{--<!-- /.sidebar-widget -->--}}

{{--<!-- ============================================== COLOR============================================== -->--}}
<div class="sidebar-widget wow fadeInUp" style="margin-bottom: 30px;">
    <h3 class="section-title">Lọc sản phẩm theo giá</h3>
    <div class="sidebar-widget-body">
        <ul class="list">
            <li><a href="{{request()->fullUrlWithQuery(['price'=>1])}}">Dưới 2.000.000đ</a></li>
            <li><a href="{{request()->fullUrlWithQuery(['price'=>2])}}">Từ 2.000.000đ - 4.000.000đ</a></li>
            <li><a href="{{request()->fullUrlWithQuery(['price'=>3])}}">Từ 4.000.000đ - 7.000.000đ</a></li>
            <li><a href="{{request()->fullUrlWithQuery(['price'=>4])}}">Từ 7.000.000đ - 13.000.000đ</a></li>
            <li><a href="{{request()->fullUrlWithQuery(['price'=>5])}}">Từ 13.000.000đ - 20.000.000đ</a></li>
            <li><a href="{{request()->fullUrlWithQuery(['price'=>6])}}">Từ 20.000.000đ - 30.000.000đ</a></li>
            <li><a href="{{request()->fullUrlWithQuery(['price'=>7])}}">Trên 30.000.000đ</a></li>
        </ul>
    </div>
    <!-- /.sidebar-widget-body -->
</div>
<!-- /.sidebar-widget -->
<!-- ============================================== COLOR: END ============================================== -->
