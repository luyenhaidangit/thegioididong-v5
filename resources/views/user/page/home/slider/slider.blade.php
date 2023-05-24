<div id="hero">
    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
        @foreach($sliders as $slider)
            @if($slider->status == '1')
            @if($slider->slider_title_button)
                <div class="item" style="background-image: url({!!asset('images/'. $slider->image) !!});">
                    <div class="container-fluid">
                        <div class="caption bg-color vertical-center text-left" style="text-align: center;">
                            <div class="slider-header fadeInDown-1">{{($slider->slider_small_title)}}</div>
                            <div class="big-text fadeInDown-1" style="font-size: 25px;"> {{$slider->slider_big_title}}
                                <span
                                    class="highlight">{{($slider->highlight_text)}}</span></div>
                            <div class="excerpt fadeInDown-2 hidden-xs"><span>{!! $slider->slider_description !!}</span>
                            </div>
                            <div class="button-holder fadeInDown-3"><a href="{{($slider->slider_link)}}"
                                                                       class="btn-lg btn btn-uppercase btn-primary shop-now-button">{{$slider->slider_title_button}}</a>
                            </div>
                        </div>
                        <!-- /.caption -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
            @else
                <div class="item" style="background-image: url({!!asset('images/'. $slider->image) !!});">
                    <div class="container-fluid">
                        <div class="caption bg-color vertical-center text-left" style="text-align: center;">
                            <div class="slider-header fadeInDown-1">{{($slider->slider_small_title)}}</div>
                            <div class="big-text fadeInDown-1" style="font-size: 25px;"> {{$slider->slider_big_title}}
                                <span
                                    class="highlight">{{($slider->highlight_text)}}</span></div>
                            <div class="excerpt fadeInDown-2 hidden-xs"><span>{!! $slider->slider_description !!}</span>
                            </div>

                        </div>
                        <!-- /.caption -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
            @endif
        @endif
    @endforeach
    <!-- /.item -->
    </div>
    <!-- /.owl-carousel -->
</div>
