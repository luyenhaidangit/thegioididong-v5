@extends('user.theme.layout')
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{route('shopping.home')}}">Trang chủ</a></li>
                    <li><a href="">Chi tiết sản phẩm</a></li>
                    <li class='active'>{{$products->name}}</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class='container' style="margin-bottom: 30px">
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
            <div class='row single-product'>
                <div class='col-md-3 sidebar'>
                    <div class="sidebar-module-container">
                        <div class="home-banner outer-top-n" style="margin: 0px 0px 30px 0px;">
                            <img src="{!! asset('public/frontend\assets\images\banners\Thiet-ke-banner-quang-cao-dien-thoai-1.jpg') !!}"
                                 alt="Image">
                        </div>
                        @include('user.page.home.hot_deals.hotdeals')

{{--                        @include('user.page.home.newsletter.newsletter')--}}

                        @include('user.page.employee.testimonials')
                    </div>
                </div><!-- /.sidebar -->
                <div class='col-md-9'>
                    <!-- ============================================== VIEW PRODUCT ============================================== -->
                    <div class="detail-block">
                        <div class="row  wow fadeInUp">
                            <div class="col-xs-12 col-sm-6 col-md-6 gallery-holder">
                                <ul id="imageGallery" style="width: 100%">
                                    @if(count($gallerys)>0)
                                        @foreach($gallerys as $key => $gal)
                                            <li data-thumb="{!! asset('public/frontend/assets/images/gallery/'.$gal->gallery_image) !!}"
                                                data-src="{!! asset('public/frontend/assets/images/gallery/'.$gal->gallery_image) !!}"
                                                style="width: 100%;padding: 10px;">
                                                <img style="width: 100%"
                                                     src="{!! asset('public/frontend/assets/images/gallery/'.$gal->gallery_image) !!}"/>
                                            </li>
                                        @endforeach
                                    @else
                                        <li data-thumb="{{asset('public/images/'.$products->image)}}"
                                            data-src="{{asset('public/images/'.$products->image)}}"
                                            style="width: 100%;padding: 10px;">
                                            <img src="{{asset('public/images/'.$products->image)}}"
                                                 style="width: 100%"/>
                                        </li>
                                    @endif

                                </ul>
                            </div><!-- /.gallery-holder -->
                            <div class='col-sm-6 col-md-6 product-info-block'>
                                <div class="product-info">
                                    <h3 class="name">{{$products->name}}</h3>
                                    <div class="rating-reviews m-t-20">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                @for($i=1;$i<=$star;$i++)
                                                    <span class="fa fa-star checked"></span>
                                                @endfor
                                                @for($i=1;$i<=5-$star;$i++)
                                                    <span class="fa fa-star"></span>
                                                @endfor
                                                <a style="margin-left: 10px;color: #666666;">({{$countcmt}} Đánh
                                                    Giá)</a>
                                            </div>

                                        </div><!-- /.row -->
                                    </div><!-- /.rating-reviews -->

                                    <div class="stock-container info-container m-t-10">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="stock-box">
                                                        <span class="label">Thương hiệu:
                                                            <a class="value" href="{{route('product.show-brand',$products->id)}}" style="background: aliceblue;border: 1px solid #e0e0e0;border-radius: 2px;padding: 0px 15px;font-weight: 600;color: #288ad6;">{!! $brand->brand_name !!}</a>
                                                        </span>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.stock-container -->
                                    @if($products->content!=null)
                                    <div class="description-container m-t-20" style="border: 1px solid #e0e0e0;">
                                        <p style="padding: 10px;background-color: #f6f6f6;border-bottom: 1px solid #e0e0e0;font-weight: 600;color: black;">CẤU HÌNH THIẾT BỊ</p>
                                        <div style="padding: 0px 10px;overflow: auto;max-height: 250px;">
                                        {!! $products->content !!}
                                        </div>
                                    </div><!-- /.description-container -->
                                    @endif

                                    <div class="price-container info-container m-t-20"
                                         style="padding: 0px;border-bottom: none">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="price-box">
                                                    <span class="price" style="padding: 0px 15px 0px 0px;">{{ number_format($products->price - $products->discount,'0',',','.') }} VNĐ</span>
                                                    @if(($products->discount*100)/$products->price >0)
                                                    <span class="price-before-discount" style="text-decoration: line-through;color: #d3d3d3;font-weight: 400;line-height: 30px;font-size: 15px;">{{ number_format($products->price,'0',',','.') }}VNĐ</span>
                                                    <span style="position: absolute;top: 10px">-{{ number_format(($products->discount*100)/$products->price) }}%</span>
                                                    @else
                                                    @endif
                                                </div>
                                            </div>

{{--                                            <div class="col-sm-3" style="text-align: right; padding-left: 0px;">--}}
{{--                                                <div class="favorite-button m-t-10">--}}

{{--                                                </div>--}}
{{--                                            </div>--}}

                                        </div><!-- /.row -->
                                    </div><!-- /.price-container -->

                                    <div class="quantity-container info-container" style="padding: 5px 0px">
                                        <div class="row" style="display: flex;">
                                            @if($products->qty_inventory==0)
                                                <div class="col-sm-6">
                                                    <h2 style="margin: 0px;font-weight: 900;color: #ff7878;">HẾT HÀNG</h2>
                                                </div>
                                            @else
                                            <div class="col-sm-6">
                                                <a href="javascripts:" onclick="AddCart({{$products->id}})"
                                                   class="btn btn-primary"><i
                                                        class="fa fa-shopping-cart inner-right-vs"></i> Thêm vào giỏ hàng</a>
                                            </div>
                                            @endif
                                            <div class="col-sm-6" style="padding: 0px;">
                                                <p class="prod-actions" style="margin: 0px;">
                                                    @if (Auth::guard('account_customer')->check())
                                                        @if(is_null(DB::table('wishlists')->where('customer_id', Auth::guard('account_customer')->id())->where('product_id','=',$products->id)->first()))
                                                            <a href="{{url('danh-sach-yeu-thich/them/'.$products->id)}}" class="prod-favorites" data-toggle="tooltip"
                                                               data-placement="top" title="Yêu thích" style="font-size: 25px; margin: 0px 12px;"><i
                                                                    class="icon fa fa-heart" style="color: #333;font-size: 32px;"></i>
                                                            </a>
                                                        @else
                                                            <a href="{{url('danh-sach-yeu-thich/them/'.$products->id)}}" class="prod-favorites" data-toggle="tooltip"
                                                               data-placement="top" title="Yêu thích" style="font-size: 25px; margin: 0px 12px;"><i
                                                                    class="icon fa fa-heart" style="color: rgb(255, 66, 79);font-size: 32px;"></i>
                                                            </a>
                                                        @endif
{{--                                                        @if(is_null(DB::table('comparisons')->where('customer_id', Auth::guard('account_customer')->id())->where('product_id','=',$products->id)->first()))--}}
{{--                                                            <a href="{{url('so-sanh-san-pham/them/'.$products->id)}}" class="prod-compare" data-toggle="tooltip"--}}
{{--                                                               data-placement="top" title="So sánh" style="font-size: 25px;"><i--}}
{{--                                                                    class="fa fa-bar-chart" style="color: #333;font-size: 32px;"></i>--}}
{{--                                                            </a>--}}
{{--                                                            @else--}}
{{--                                                                <a href="{{url('so-sanh-san-pham/them/'.$products->id)}}" class="prod-compare" data-toggle="tooltip"--}}
{{--                                                                   data-placement="top" title="So sánh" style="font-size: 25px;"><i--}}
{{--                                                                        class="fa fa-bar-chart" style="color: #157ed2;font-size: 32px;"></i>--}}
{{--                                                                </a>--}}
{{--                                                            @endif--}}
                                                    @else
                                                        <a href="javascript:" data-toggle="modal" data-target="#loginModal" class="prod-favorites"
                                                           data-placement="top" title="Yêu thích" style="font-size: 25px; margin: 0px 12px;"><i
                                                                class="icon fa fa-heart" style="color: #333;font-size: 32px;"></i>
                                                        </a>
{{--                                                        <a href="javascript:" data-toggle="modal" data-target="#loginModal" class="prod-compare" data-toggle="tooltip"--}}
{{--                                                           data-placement="top" title="So sánh" style="font-size: 25px;"><i--}}
{{--                                                                class="fa fa-bar-chart" style="color: #333;font-size: 32px;"></i>--}}
{{--                                                        </a>--}}
                                                    @endif

                                                </p>
                                            </div>


                                        </div><!-- /.row -->
                                    </div>
                                </div><!-- /.product-info -->
                            </div><!-- /.col-sm-7 -->
                        </div><!-- /.row -->
                    </div>
                    <!-- ============================================== VIEW PRODUCT ============================================== -->


                    <div class="tab" style="margin-top: 30px;">
                        <button class="tablinks" onclick="openCity(event, 'London')">Cấu hình</button>
                        <button class="tablinks" onclick="openCity(event, 'Paris')">Videos</button>
                        <button class="tablinks" onclick="openCity(event, 'Tokyo')" id="defaultOpen">Nhận xét</button>
                    </div>

                    <div id="London" class="tabcontent" style="max-height: 650px;overflow-x: auto;">
                        <p>{!! $products->describe !!}</p>
                    </div>

                    <div id="Paris" class="tabcontent">
                        @if($products->link!=null)
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$youtube_id}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        @else
                            <p style="text-align: center">Không có videos để hiển thị.</p>
                        @endif
                    </div>

                    <div id="Tokyo" class="tabcontent">
                        @if($countcmt>0)
                            @for($i=1;$i<=$star;$i++)
                                <span class="fa fa-star checked" style="font-size: 15px;"></span>
                            @endfor
                            @for($i=1;$i<=5-$star;$i++)
                                <span class="fa fa-star" style="font-size: 15px;"></span>
                            @endfor
                            <span> trung bình dựa trên {{$countcmt}} nhận xét từ khách hàng.</span>
                            <hr style="border:1px solid #f1f1f1;margin-top: 10px;margin-bottom: 5px;">

                            <div class="row" style="margin: auto;">
                                <div class="side">
                                    <div>
                                        @for($i=1;$i<=5;$i++)
                                            <span class="fa fa-star checked" style="font-size: 15px;"></span>
                                        @endfor
                                    </div>
                                </div>
                                <div class="middle">
                                    <div class="bar-container">
                                        <div class="bar-5"
                                             style="width:{{$comments->where('star',5)->count()*100/$countcmt}}%;">{{round($comments->where('star',5)->count()*100/$countcmt,1)}}
                                            %
                                        </div>
                                    </div>
                                </div>
                                <div class="side right">
                                    <div>{{$comments->where('star',5)->count()}} nhận xét</div>
                                </div>
                                <div class="side">
                                    <div>
                                        @for($i=1;$i<=4;$i++)
                                            <span class="fa fa-star checked" style="font-size: 15px;"></span>
                                        @endfor
                                    </div>
                                </div>
                                <div class="middle">
                                    <div class="bar-container">
                                        <div class="bar-4"
                                             style="width:{{$comments->where('star',4)->count()*100/$countcmt}}%;">{{round($comments->where('star',4)->count()*100/$countcmt,1)}}
                                            %
                                        </div>
                                    </div>
                                </div>
                                <div class="side right">
                                    <div>{{$comments->where('star',4)->count()}} nhận xét</div>
                                </div>
                                <div class="side">
                                    <div>
                                        @for($i=1;$i<=3;$i++)
                                            <span class="fa fa-star checked" style="font-size: 15px;"></span>
                                        @endfor
                                    </div>
                                </div>
                                <div class="middle">
                                    <div class="bar-container">
                                        <div class="bar-3"
                                             style="width:{{$comments->where('star',3)->count()*100/$countcmt}}%;">{{round($comments->where('star',3)->count()*100/$countcmt,1)}}
                                            %
                                        </div>
                                    </div>
                                </div>
                                <div class="side right">
                                    <div>{{$comments->where('star',3)->count()}} nhận xét</div>
                                </div>
                                <div class="side">
                                    <div>
                                        @for($i=1;$i<=2;$i++)
                                            <span class="fa fa-star checked" style="font-size: 15px;"></span>
                                        @endfor
                                    </div>
                                </div>
                                <div class="middle">
                                    <div class="bar-container">
                                        <div class="bar-2"
                                             style="width:{{$comments->where('star',2)->count()*100/$countcmt}}%;">{{round($comments->where('star',2)->count()*100/$countcmt,1)}}
                                            %
                                        </div>
                                    </div>
                                </div>
                                <div class="side right">
                                    <div>{{$comments->where('star',2)->count()}} nhận xét</div>
                                </div>
                                <div class="side">
                                    <div>
                                        @for($i=1;$i<=1;$i++)
                                            <span class="fa fa-star checked" style="font-size: 15px;"></span>
                                        @endfor
                                    </div>
                                </div>
                                <div class="middle">
                                    <div class="bar-container">
                                        <div class="bar-1"
                                             style="width:{{$comments->where('star',1)->count()*100/$countcmt}}%;">{{round($comments->where('star',1)->count()*100/$countcmt,1)}}
                                            %
                                        </div>
                                    </div>
                                </div>
                                <div class="side right">
                                    <div>{{$comments->where('star',1)->count()}} nhận xét</div>
                                </div>
                            </div>
                            <hr>

                            <div class="product-reviews" style="overflow: auto;max-height: 300px;}">
                                <h4 class="title">NHẬN XÉT CỦA KHÁCH HÀNG</h4>
                                @foreach($comments as $cmt)
                                    <div class="reviews" style="background: #f8f8f8;padding: 20px;margin-bottom: 10px;">
                                        <div class="review" style="margin-bottom: 5px;">
                                            <div class="review-title">
                                            <span class="summary" style="color: #666666;font-size: 14px;font-weight: normal;margin-right: 10px;font-style: italic;">
                                                {{$cmt->name}}
                                            </span>
                                                <span class="date">
                                                <i class="fa fa-calendar">
                                                </i>
                                            <span>  {{$datenow - date('d', strtotime($cmt->create_date))}} ngày trước</span></span>
                                            </div>
                                            <div class="text" style="line-height: 18px;word-break: break-all;">
                                                "{{$cmt->comment_content}}"
                                            </div>
                                        </div>
                                    </div><!-- /.reviews -->
                                @endforeach
                            </div>
                            <hr>
                        @endif
                        @if(Auth::guard('account_customer')->check())
                        <div class="wrapperReview">
                            <form action="{{ route('customer.postcomment') }}" method="post">
                                {{ csrf_field() }}
                                <div class="master">
                                    <h4>Hãy cho chũng tôi biết trải nghiệm của bạn về sản phẩm của chúng tôi?</h4>

                                    <div class="rating-component">
                                        <div class="status-msg">
                                            <label>
                                                <input class="rating_msg" type="hidden" name="rating_msg" value=""/>
                                            </label>
                                        </div>
                                        <div class="stars-box">
                                            <i class="star fa fa-star" title="1 star" data-message="Sản phẩm quá tệ"
                                               data-value="1"></i>
                                            <i class="star fa fa-star" title="2 stars" data-message="Chất lượng Kém"
                                               data-value="2"></i>
                                            <i class="star fa fa-star" title="3 stars" data-message="Chất lượng trung bình"
                                               data-value="3"></i>
                                            <i class="star fa fa-star" title="4 stars" data-message="Sản phẩm tốt"
                                               data-value="4"></i>
                                            <i class="star fa fa-star" title="5 stars" data-message="Rất tuyệt vời"
                                               data-value="5"></i>
                                        </div>
                                        <div class="starrate" style="align-self: center;font-size: 25px;">
                                            <label style="margin-bottom: 0px">
                                                <i class="fa fa-smile-o"></i>
                                                <input class="ratevalue" type="hidden" name="rate_value" value=""/>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="feedback-tags">
                                        <div class="tags-container" data-tag-set="1">
                                            <div class="question-tag">
                                                Tại sao trải nghiệm của bạn lại tồi tệ như vậy?
                                            </div>
                                        </div>
                                        <div class="tags-container" data-tag-set="2">
                                            <div class="question-tag">
                                                Tại sao trải nghiệm của bạn lại tồi tệ như vậy?
                                            </div>
                                        </div>
                                        <div class="tags-container" data-tag-set="3">
                                            <div class="question-tag">
                                                Tại sao bạn lại xếp hạng trung bình sản phẩm này?
                                            </div>
                                        </div>
                                        <div class="tags-container" data-tag-set="4">
                                            <div class="question-tag">
                                                Hãy cho tôi biết trải nghiệm của bạn tốt như thế nào?
                                            </div>
                                        </div>
                                        <div class="tags-container" data-tag-set="5">
                                            <div class="make-compliment">
                                                <div class="compliment-container">
                                                    Cảm ơn bạn! Hãy cho tôi biết trải nghiệm của bạn?
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tags-box">
                                            <input type="text" class="tag form-control" name="comment"
                                                   id="inlineFormInputName" placeholder="vui lòng để lại nhận xét..."
                                                   style="width: 250px;text-transform: none;font-size: 12px;" required>
                                            <input type="hidden" name="product_id" value="{{ $products->id }}"/>
                                        </div>

                                    </div>

                                    <div class="button-box">
                                        <input type="submit" class=" done btn btn-warning" value="Gửi đi"/>
                                    </div>

                                    <div class="submited-box">
                                        <div class="loader"></div>
                                        <div class="success-message"
                                             style="font-size: 15px;color: forestgreen;font-weight: 800;">
                                            Cảm ơn quý khách!
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                            @else
                                <h4 style="text-align: center">Đăng nhập để có thể để lại bình luận gói ý với chúng tôi! <a href="javascript:" data-toggle="modal" data-target="#loginModal">đăng nhập tại đây</a> </h4>
                            @endif
                    </div>


                    <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                    <section class="section featured-product wow fadeInUp" style="margin-top: 30px;">
                        <h3 class="section-title">Sản phẩm gợi ý</h3>
                        <div
                            class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
                            @foreach($related_product as $product)
                                <div class="item item-carousel">
                                    <div class="products">

                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image" style="border: 1px solid #e0e4f6;padding: 10px;">
                                                    <a href="{{route('product.viewProduct', $product->id)}}"><img
                                                            src="{{asset('public/images/'. $product->image)}}"
                                                            alt=""></a>
                                                    @if($product->qty_inventory==0)
                                                    <div style="position: absolute; top: 2em; right: 3em; width: 60%; background-color: #fff0;">
                                                        <img src="{{asset('public/images/hethang.png')}}">
                                                    </div>
                                                    @else
                                                    @endif
                                                </div><!-- /.image -->

                                                @if(($product->discount*100)/$product->price <=0)
                                                    <div class="tag new"><span>new</span></div>
                                                @elseif(($product->discount*100)/$product->price > 20)
                                                    <div class="tag hot"><span>Hot</span></div>
                                                @else
                                                    <div class="tag sale"><span>Sale</span></div>
                                                @endif
                                            </div><!-- /.product-image -->


                                            <div class="product-info text-left" s>
                                                <h3 class="name"><a
                                                        href="{{route('product.viewProduct', $product->id)}}">{{ $product->name }}</a>
                                                </h3>
                                                <?php
                                                $avg_star=round(DB::table('comment')->where('product_id',$product->id)->avg('star'));
                                                ?>
                                                @for($i=1;$i<=$avg_star;$i++)
                                                    <span class="fa fa-star checked"></span>
                                                @endfor
                                                @for($i=1;$i<=5-$avg_star;$i++)
                                                    <span class="fa fa-star"></span>
                                                @endfor
                                                @if($product->discount>0)
                                                    <div class="product-price">Giảm:
                                                        <span class="price-before-discount">{{ number_format($product->price,'0',',','.') }}đ</span>
                                                        <span style="position: absolute;">-{{ number_format(($product->discount*100)/$product->price) }}%</span>
                                                    </div>
                                                @else
                                                @endif
                                                <div class="product-price">
                                                    <span class="price">{{ number_format($product->price - $product->discount) }} VNĐ</span>
                                                </div><!-- /.product-price -->

                                            </div><!-- /.product-info -->
                                            @if($product->qty_inventory==0)
                                            @else
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        <li class="add-cart-button btn-group">
                                                            <button onclick="AddCart({{$product->id}})"
                                                                    href="javascript:" class="btn btn-primary icon" data-toggle="dropdown"
                                                                    type="button">
                                                                <i class="fa fa-shopping-cart"></i>
                                                            </button>
                                                        </li>

                                                        <li class="lnk wishlist">
                                                            @if (Auth::guard('account_customer')->check())
                                                                @if(is_null(DB::table('wishlists')->where('customer_id', Auth::guard('account_customer')->id())->where('product_id','=',$product->id)->first()))
                                                                    <a data-toggle="tooltip" class="add-to-cart" href="{{url('danh-sach-yeu-thich/them/'.$product->id)}}" title="Yêu thích">
                                                                        <i class="icon fa fa-heart"></i>
                                                                    </a>
                                                                @else
                                                                    <a data-toggle="tooltip" class="add-to-cart" href="{{url('danh-sach-yeu-thich/them/'.$product->id)}}" title="" data-original-title="Yêu thích">
                                                                        <i class="icon fa fa-heart" style="color: rgb(255, 66, 79);"></i>
                                                                    </a>
                                                                @endif
                                                            @else
                                                                <a href="javascript:" data-toggle="modal" data-target="#loginModal"
                                                                   title="Yêu thích">
                                                                    <i class="icon fa fa-heart"></i>
                                                                </a>
                                                            @endif
                                                        </li>

                                                    </ul>
                                                </div><!-- /.action -->
                                            </div><!-- /.cart -->
                                            @endif
                                        </div><!-- /.product -->

                                    </div><!-- /.products -->
                                </div><!-- /.item -->
                            @endforeach
                        </div><!-- /.home-owl-carousel -->
                    </section><!-- /.section -->
                    <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
                </div><!-- /.col -->

                <div class="clearfix"></div>

            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
    </div><!-- /.body-content -->
@stop
