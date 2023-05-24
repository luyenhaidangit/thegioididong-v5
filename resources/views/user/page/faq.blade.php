@extends('user.theme.layout')
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{route('shopping.home')}}">Trang chủ</a></li>
                    <li class="active">Hỗ trợ</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>
    <div class="body-content">
        <div class="container" style="margin-bottom: 30px">
            <div class="checkout-box faq-page">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="heading-title">Câu hỏi thường gặp</h2>
                        <div class="panel-group checkout-steps" id="accordion">
                            <div class="panel-group checkout-steps" id="accordion">
                            @foreach($faqs as $key => $faq)
                                <!-- checkout-step-01  -->
                                @if($key+1==1)
                                <div class="panel panel-default checkout-step-{{ $key + 1  }}">

                                    <!-- panel-heading -->
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">
                                            <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapse{{ $key + 1  }}">
                                                <span>{{ $key + 1  }}</span>{!! $faq->faq_title !!}?
                                            </a>
                                        </h4>
                                    </div>
                                    <!-- panel-heading -->

                                    <div id="collapse{{ $key + 1  }}" class="panel-collapse collapse in">

                                        <!-- panel-body  -->
                                        <div class="panel-body">
                                            {!! $faq->faq_description !!}
                                        </div>
                                        <!-- panel-body  -->

                                    </div><!-- row -->
                                </div>
                                @else
                                        <div class="panel panel-default checkout-step-{{ $key + 1  }}">
                                            <div class="panel-heading">
                                                <h4 class="unicase-checkout-title">
                                                    <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapse{{ $key + 1  }}">
                                                        <span>{{ $key + 1  }}</span>{!! $faq->faq_title !!}?
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse{{ $key + 1  }}" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    {!! $faq->faq_description !!}
                                                </div>
                                            </div>
                                        </div>
                                @endif
                            @endforeach
                                <!-- checkout-step-01  -->
                            </div>

                        </div><!-- /.checkout-steps -->
                    </div>
                </div><!-- /.row -->
            </div><!-- /.checkout-box -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
@stop
