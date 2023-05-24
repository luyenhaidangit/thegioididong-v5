<div class="col-md-3 sidebar">
    <div class="sidebar-module-container">
        <div class="search-area outer-bottom-small">
            <form method="get" action="{{route('blog.search')}}">
                <div class="control-group">
                    <input name="search_key" placeholder="Từ khóa tìm kiếm..." class="search-field" required>
                    <button type="submit" class="search-button" style="display: contents"></button>
                </div>
            </form>
        </div>

        <div class="home-banner outer-top-n outer-bottom-xs">
            <img style="width: 100%;" src="{{asset('public/frontend/assets\images\banners\Thiet-ke-banner-quang-cao-dien-thoai-2.jpg')}}" alt="Image">
        </div>
        <!-- ==============================================CATEGORY============================================== -->
        <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
            <h3 class="section-title">Danh mục sản phẩm</h3>
            <div class="sidebar-widget-body m-t-10">
                <div class="accordion">
                    @foreach($cate->unique('category_id') as $key => $category)
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a href="#collapse{{$key}}" data-toggle="collapse"
                               class="accordion-toggle collapsed">
                                {{$category->category_name}}
                            </a>
                        </div><!-- /.accordion-heading -->
                        <div class="accordion-body collapse" id="collapse{{$key}}" style="height: 0px;">
                            <div class="accordion-inner">
                                <ul>
                                    @foreach($cate->unique('brand_id')->where('idcat',$category->category_id) as $brand)
                                    <li><a href="{{route('product.show-brand',$brand->brand_id)}}">{{$brand->brand_name}}</a></li>
                                    @endforeach
                                </ul>
                            </div><!-- /.accordion-inner -->
                        </div><!-- /.accordion-body -->
                    </div><!-- /.accordion-group -->
                    @endforeach
                </div><!-- /.accordion -->
            </div><!-- /.sidebar-widget-body -->
        </div><!-- /.sidebar-widget -->
        <!-- ============================================== CATEGORY : END ============================================== -->
        <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
            <h3 class="section-title">Tiện ích</h3>
            <ul class="nav nav-tabs">
                <li class="active"><a href="#popular" data-toggle="tab">Tin phổ biến</a></li>
                <li><a href="#recent" data-toggle="tab">Tin gần đây</a></li>
            </ul>
            <div class="tab-content" style="padding-left:0">
                <div class="tab-pane active m-t-20" id="popular">
                    @foreach($pho_bien as $blog)
                        @if($blog->status == '1')
                    <div class="blog-post inner-bottom-30 ">
                        <img class="img-responsive" src="{{asset('public/images/'.$blog->image)}}"
                             alt="">
                        <h5><a href="{{route('shopping.blog-detail',$blog->blog_id)}}">{{$blog->blog_title}}</a></h5>
                        <span class="review">6 Comments</span>
                        <span class="date-time">{{date('d-m-Y', strtotime($blog->blog_time))}}</span>
{{--                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>--}}
                    </div>
                        @endif
                    @endforeach
                </div>

                <div class="tab-pane m-t-20" id="recent">
                    @foreach($moi_nhat as $blog)
                        @if($blog->status == '1')
                            <div class="blog-post inner-bottom-30">
                        <img class="img-responsive" src="{{asset('public/images/'.$blog->image)}}"
                             alt="">
                        <h4><a href="{{route('shopping.blog-detail',$blog->blog_id)}}">{{$blog->blog_title}}</a></h4>
                        <span class="review">6 Comments</span>
                        <span class="date-time">{{date('d-m-Y', strtotime($blog->blog_time))}}</span>
{{--                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>--}}

                    </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <!-- ============================================== PRODUCT TAGS ============================================== -->
    @include('user.page.home.the-san-pham.product_tags')<!-- /.sidebar-widget -->
        <!-- ============================================== PRODUCT TAGS : END ============================================== -->
    </div>
</div>
