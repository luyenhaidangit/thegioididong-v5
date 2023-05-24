<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">Thẻ sản phẩm nổi bậc</h3>
    <div class="sidebar-widget-body outer-top-xs" style="margin-bottom: 0px;">

        <div class="tag-list">
            @foreach($product_tag as $product)
                <a class="item" title="Phone" href="{{route('product.viewProduct', $product->id)}}">{{ $product->name }}</a>
            @endforeach
        </div>
        <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>
<!-- /.sidebar-widget -->
