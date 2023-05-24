<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp" style="padding-bottom: 30px;">
    <div class="more-info-tab clearfix ">
        @if(Session::has('cart'))
            <div class="alert alert-success">
                {{Session::get('cart')}}
            </div>
        @endif
        <h3 class="new-product-title pull-left">Điện thoại nổi bật nhất</h3>
        <!-- /.nav-tabs -->
        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
            <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">Tất cả</a></li>
            @foreach($categorys as $cate)
                <li><a data-transition-type="backSlide" href="#{{$cate->category_id}}"
                       data-toggle="tab">{{$cate->category_name}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="tab-content outer-top-xs">

        <div class="tab-pane in active" id="all" style="margin-left: -7px;">
            <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                    <!-- riverse() là hàm đảo ngược -->
                    @foreach($products as $product)

                            <div class="item item-carousel">

                                <div class="products"
                                     style="margin-right: 5px; background-color: white; padding-bottom: 0px;">

                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image" style="margin: 10px;"><a
                                                    href="{{route('shopping.viewProduct', $product->id)}}"><img
                                                        src="{{asset('images/'. $product->image)}}" alt=""
                                                        style="height: auto;"></a></div>
                                            <!-- /.image -->
                                            @if(($product->discount*100)/$product->price <=0)
                                                <div class="tag new"><span>new</span></div>
                                            @elseif(($product->discount*100)/$product->price > 20)
                                                <div class="tag hot"><span>Hot</span></div>
                                            @else
                                                <div class="tag sale"><span>Sale</span></div>
                                            @endif
                                        </div>
                                        <hr>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left" style="margin: 10px;">
                                            <h3 class="name"><a
                                                    href="{{route('shopping.viewProduct', $product->id)}}">{{ $product->name }}</a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="product-price">
                                                Giảm: <span class="price-before-discount"> {{ number_format($product->price,'0',',','.') }}đ</span>
                                                <span style="position: absolute;">-{{ number_format(($product->discount*100)/$product->price) }}%</span>
                                            </div>
                                            <div class="product-price">
                                                <span class="price"> {{ number_format($product->price - $product->discount,'0',',','.') }} VNĐ</span>

                                            </div>
                                            <!-- /.product-price -->
                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button data-toggle="tooltip" class="btn btn-primary icon"
                                                                type="button" title="Add Cart">
                                                            <a onclick="AddCart({{$product->id}})"
                                                               href="javascript:"
                                                               data-text="Add To Cart" data-text="Add To Cart"><i
                                                                    class="fa fa-shopping-cart"></i></a>
                                                        </button>
                                                    </li>
                                                    <li class="lnk wishlist"><a data-toggle="tooltip"
                                                                                class="add-to-cart"
                                                                                href="{{ url('add/to-wishlist/'.$product->id) }}"
                                                                                title="Wishlist"> <i
                                                                class="icon fa fa-heart"></i> </a></li>
                                                    <li class="lnk"><a data-toggle="tooltip" class="add-to-cart"
                                                                       href="#"
                                                                       title="Compare"> <i class="fa fa-signal"
                                                                                           aria-hidden="true"></i>
                                                        </a></li>
                                                </ul>
                                            </div>
                                            <!-- /.action -->
                                        </div>
                                        <!-- /.cart -->
                                    </div>
                                    <!-- /.product -->
                                </div>
                                <!-- /.products -->

                            </div>

                @endforeach
                <!-- /.item -->
                </div>
                <!-- /.home-owl-carousel -->
            </div>
            <!-- /.product-slider -->
        </div>
        @foreach($categorys as $cate)
            <div class="tab-pane in active" id="{{$cate->category_id}}" style="margin-left: -7px;">
                <div class="product-slider">
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                        <!-- riverse() là hàm đảo ngược -->
                        @foreach($products as $product)
                            @if($product->idcat==$cate->category_id)
                                <div class="item item-carousel">

                                    <div class="products"
                                         style="margin-right: 5px; background-color: white; padding-bottom: 0px;">

                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image" style="margin: 10px;"><a
                                                        href="{{route('shopping.viewProduct', $product->id)}}"><img
                                                            src="{{asset('images/'. $product->image)}}" alt=""
                                                            style="height: auto;"></a></div>
                                                <!-- /.image -->
                                                @if(($product->discount*100)/$product->price <=0)
                                                    <div class="tag new"><span>new</span></div>
                                                @elseif(($product->discount*100)/$product->price > 20)
                                                    <div class="tag hot"><span>Hot</span></div>
                                                @else
                                                    <div class="tag sale"><span>Sale</span></div>
                                                @endif
                                            </div>
                                            <hr>
                                            <!-- /.product-image -->

                                            <div class="product-info text-left" style="margin: 10px;">
                                                <h3 class="name"><a
                                                        href="{{route('shopping.viewProduct', $product->id)}}">{{ $product->name }}</a>
                                                </h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="product-price">
                                                    Giảm: <span class="price-before-discount"> {{ number_format($product->price,'0',',','.') }}đ</span>
                                                    <span style="position: absolute;">-{{ number_format(($product->discount*100)/$product->price) }}%</span>
                                                </div>
                                                <div class="product-price">
                                                    <span class="price"> {{ number_format($product->price - $product->discount,'0',',','.') }} VNĐ</span>

                                                </div>
                                                <!-- /.product-price -->
                                            </div>
                                            <!-- /.product-info -->
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        <li class="add-cart-button btn-group">
                                                            <button data-toggle="tooltip" class="btn btn-primary icon"
                                                                    type="button" title="Add Cart">
                                                                <a onclick="AddCart({{$product->id}})"
                                                                   href="javascript:"
                                                                   data-text="Add To Cart" data-text="Add To Cart"><i
                                                                        class="fa fa-shopping-cart"></i></a>
                                                            </button>
                                                        </li>
                                                        <li class="lnk wishlist"><a data-toggle="tooltip"
                                                                                    class="add-to-cart"
                                                                                    href="{{ url('add/to-wishlist/'.$product->id) }}"
                                                                                    title="Wishlist"> <i
                                                                    class="icon fa fa-heart"></i> </a></li>
                                                        <li class="lnk"><a data-toggle="tooltip" class="add-to-cart"
                                                                           href="#"
                                                                           title="Compare"> <i class="fa fa-signal"
                                                                                               aria-hidden="true"></i>
                                                            </a></li>
                                                    </ul>
                                                </div>
                                                <!-- /.action -->
                                            </div>
                                            <!-- /.cart -->
                                        </div>
                                        <!-- /.product -->
                                    </div>
                                    <!-- /.products -->

                                </div>
                        @endif
                    @endforeach
                    <!-- /.item -->
                    </div>
                    <!-- /.home-owl-carousel -->
                </div>
                <!-- /.product-slider -->
            </div>
    @endforeach
    <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
</div>
<!-- /.scroll-tabs -->
