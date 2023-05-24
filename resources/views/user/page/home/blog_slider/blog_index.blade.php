<section class="section latest-blog outer-bottom-vs wow fadeInUp">
    <h3 class="section-title">24h công nghệ</h3>
    <div class="blog-slider-container outer-top-xs">
        <div class="owl-carousel blog-slider custom-carousel">
            @foreach($blogs as $blog)
{{--                {{dd($blog->status)}}--}}
                @if($blog->status=='1')
                 <div class="item">
                <div class="blog-post">
                    <div class="blog-post-image">
                        <div class="image" ><a href="{{route('shopping.blog-detail',$firsts->blog_id)}}"><img
                                    src="{{asset('images/'. $blog->image)}}" alt="" style="height: 201px"></a></div>
                    </div>
                    <!-- /.blog-post-image -->
                    <div class="blog-post-info text-left">
                        <h3 class="name"><a href="{{route('shopping.blog-detail',$firsts->blog_id)}}">{!! $blog->blog_title !!}</a></h3>
                        <span class="info">{{$blog->blog_author}} &nbsp;|&nbsp; {{$blog->blog_time}} </span>
                        <a href="{{route('shopping.blog-detail',$blog->blog_id)}}" class="lnk btn btn-primary">Xem chi tiết</a></div>
                    <!-- /.blog-post-info -->

                </div>
                <!-- /.blog-post -->
            </div>
                @endif
            <!-- /.item -->
            @endforeach

        </div>
        <!-- /.owl-carousel -->
    </div>
    <!-- /.blog-slider-container -->
</section>
<!-- /.section -->
