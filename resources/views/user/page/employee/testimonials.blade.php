<div class="sidebar-widget  wow fadeInUp outer-top-vs ">
    <div id="advertisement" class="advertisement">
        @foreach($employee as $emp)
            @if($emp->status == '1')
                <div class="item">
                    <div class="avatar"><img src="{!!asset('images/'. $emp->image)!!}" alt="Image"></div>
                    <div class="testimonials"><em>"</em>{!! $emp->description !!} <em>"</em></div>
                    <div class="clients_author">{!! $emp->name !!}
                        <span>
                            @foreach ($empcategory as $category)
                                @if($category->id == $emp->idcat )
                                    {{$category->name}}
                                @endif
                            @endforeach
                        </span>
                    </div>
                    <!-- /.container-fluid -->
                </div>
        @endif
    @endforeach
    <!-- /.item -->
        <!-- /.item -->

    </div>
    <!-- /.owl-carousel -->
</div>
