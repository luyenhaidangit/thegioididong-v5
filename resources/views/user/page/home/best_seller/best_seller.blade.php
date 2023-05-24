<div class="best-deal wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">Phụ kiện điện tử</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
            @foreach($phu_kien->chunk(2) as $chunk)
                <div class="item">
                    <div class="products best-product">
                        @foreach($chunk as $key => $product)
                                <div class="product">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image"><a
                                                            href="{{route('product.viewProduct', $product->id)}}"> <img
                                                                src="{{asset('public/images/'. $product->image)}}"
                                                                alt=""> </a>
                                                        @if($product->qty_inventory==0)
                                                            <div style="position: absolute; top: 2em; right: 2em; width: 60%; background-color: #fff0;">
                                                                <img src="{{asset('public/images/hethang.png')}}">
                                                            </div>
                                                        @else
                                                        @endif
                                                    </div>
                                                    <!-- /.image -->

                                                </div>
                                                <!-- /.product-image -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col2 col-xs-7">
                                                <div class="product-info">
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
                                                    <div class="product-price"><span class="price">{{ number_format($product->price - $product->discount,'0',',','.') }} VNĐ</span>
                                                    </div>
                                                    <!-- /.product-price -->

                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.product-micro-row -->
                                    </div>
                                    <!-- /.product-micro -->

                                </div>

                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- /.sidebar-widget-body -->
</div>
<!-- /.sidebar-widget -->
