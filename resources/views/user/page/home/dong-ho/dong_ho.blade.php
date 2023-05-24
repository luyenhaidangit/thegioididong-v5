<div class="sidebar-widget outer-bottom-small wow fadeInUp">
    <h3 class="section-title">Điện thoại nổi bậc</h3>
    <div class="sidebar-widget-body outer-top-xs" style="margin-bottom: 0px;">
        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs" style="margin-bottom: 0px;">
            @foreach($dong_ho->chunk(3) as $chunk)
                <div class="item">
                    <div class="products special-product">
                        @foreach($chunk as $key => $product)
                                <div class="product" style="margin-bottom: 20px;">
                                    <div class="product-micro">
                                        <div class="row product-micro-row">
                                            <div class="col col-xs-5">
                                                <div class="product-image">
                                                    <div class="image"><a
                                                            href="{{route('product.viewProduct', $product->id)}}"> <img
                                                                src="{!!asset('images/'. $product->image)!!}" alt="">
                                                        </a>
                                                        @if($product->qty_inventory==0)
                                                            <div style="position: absolute; top: 2em; right: 3em; width: 60%; background-color: #fff0;">
                                                                <img src="{{asset('images/hethang.png')}}">
                                                            </div>
                                                        @else
                                                        @endif
                                                    </div>
                                                    <!-- /.image -->

                                                </div>
                                                <!-- /.product-image -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col col-xs-7">
                                                <div class="product-info" style="padding: 0px 15px 0px 0px;">
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
