<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">ưu đãi khủng</h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
        @foreach($hot_deals ?? '' as $product)
            <div class="item">
                <div class="products">
                    <div class="hot-deal-wrapper">
                        <div class="image">
                            <a href="{{route('product.viewProduct', $product->id)}}">
                                <img src="{!!asset('public/images/'. $product->image)!!}" alt="">
                            </a>
                            @if($product->qty_inventory==0)
                                <div style="position: absolute; top: 4em; right: 4em; width: 60%; background-color: #fff0;">
                                    <img src="{{asset('public/images/hethang.png')}}">
                                </div>
                            @else
                            @endif
                        </div>
                        <div class="sale-offer-tag"><span>Đến<br>
                            {{ number_format(($product->discount*100)/$product->price) }}%</span>
                        </div>
{{--                        <div class="timing-wrapper">--}}
{{--                            <div class="box-wrapper">--}}
{{--                                <div class="date box"><span class="key">120</span> <span class="value">NGÀY</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="box-wrapper">--}}
{{--                                <div class="hour box"><span class="key">20</span> <span class="value">GIỜ</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="box-wrapper">--}}
{{--                                <div class="minutes box"><span class="key">36</span> <span class="value">PHÚT</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="box-wrapper hidden-md">--}}
{{--                                <div class="seconds box"><span class="key">60</span> <span class="value">GIÂY</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                    <!-- /.hot-deal-wrapper -->

                    <div class="product-info text-left m-t-20">
                        <h3 class="name"><a href="{{route('product.viewProduct', $product->id)}}">{{ $product->name }}</a></h3>
                            <?php
                            $avg_star=round(DB::table('comment')->where('product_id',$product->id)->avg('star'));
                            ?>
                            @for($i=1;$i<=$avg_star;$i++)
                                <span class="fa fa-star checked"></span>
                            @endfor
                            @for($i=1;$i<=5-$avg_star;$i++)
                                <span class="fa fa-star"></span>
                            @endfor
                        <div class="product-price">
                            <span class="price-before-discount"> {{ number_format($product->price,'0',',','.') }} VNĐ</span>
                        </div>
                        <div class="product-price"><span
                                class="price">{{ number_format($product->price - $product->discount,'0',',','.') }} VNĐ</span>
                        </div>
                        <!-- /.product-price -->

                    </div>
                    <!-- /.product-info -->

                    @if($product->qty_inventory==0)
                    @else
                    <div class="cart clearfix animate-effect">
                        <div class="action">
                            <div class="add-cart-button btn-group" style="width: 100%;">
                                <button style="width: 20%;" class="btn btn-primary icon"
                                        onclick="AddCart({{$product->id}})" href="javascript:"
                                        data-text="Add To Cart" data-toggle="dropdown" type="button"><i
                                        class="fa fa-shopping-cart"></i></button>
                                <button class="btn btn-primary cart-btn" data-toggle="tooltip" type="button"
                                        title="+ giỏ hàng" onclick="AddCart({{$product->id}})" href="javascript:"
                                        data-text="Add To Cart" data-text="Add To Cart" style="width: 80%;">Thêm vào giỏ
                                    hàng
                                </button>
                            </div>
                        </div>
                        <!-- /.action -->
                    </div>
                @endif
                    <!-- /.cart -->
                </div>
            </div>
        @endforeach
    </div>
    <!-- /.sidebar-widget -->
</div>

