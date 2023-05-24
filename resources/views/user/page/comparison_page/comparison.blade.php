@extends('user.theme.layout')
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{route('shopping.home')}}">Trang chủ</a></li>
                    <li class='active'>So sánh</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content outer-top-xs">
        <div class="container">
            @if(Session::has('comparison'))
                <div class="alert alert-danger">
                    {{Session::get('comparison')}}
                </div>
            @endif
            <div class="product-comparison">
                <div>
                    <h1 class="page-title text-center heading-title" style="margin: 0px 0px 15px 0px;">So sánh sản phẩm</h1>
                    <div class="table-responsive">
                        <table class="table compare-table inner-top-vs">
                            <tr>
                                <th style="text-align: center">Sản phẩm</th>
                                @foreach($comparisons as $col)
                                <td>
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <a href="{{route('product.viewProduct', $col->product_id)}}">
                                                    <img alt="" src="{{asset('public/images/'. $col->product->image)}}">
                                                </a>
                                            </div>

                                            <div class="product-info text-left">
                                                <h3 class="name"><a href="{{route('product.viewProduct', $col->product_id)}}">{{$col->product->name}}</a></h3>
                                                <div class="action">
                                                    <a style="width: 100%;max-width: 200px;" class="lnk btn btn-primary" onclick="AddCart({{$col->product->id}})" href="javascript:">Thêm vào giỏ hàng</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </td>
                                @endforeach
                            </tr>

                            <tr>
                                <th style="text-align: center">Đơn giá</th>
                                @foreach($comparisons as $col)
                                <td>
                                    <div class="product-price">
                                        <span class="price"> {{number_format($col->product->price - $col->product->discount,'0',',','.')}} VNĐ </span>
                                        <span class="price-before-discount">{{number_format($col->product->price,'0',',','.')}} VNĐ</span>
                                    </div>
                                </td>
                                @endforeach
                            </tr>

                            <tr>
                                <th style="text-align: center">Cấu hình</th>
                                @foreach($comparisons as $col)
                                <td>
                                    <p class="text">{!! $col->product->content !!}<p>
                                </td>
                                @endforeach
                            </tr>

                            <tr>
                                <th style="text-align: center">Đánh giá</th>
                                @foreach($comparisons as $col)
                                <td style="text-align: center;">
                                    <p><?php
                                        $avg_star=round(DB::table('comment')->where('product_id',$col->product->id)->avg('star'));
                                        ?>
                                        @for($i=1;$i<=$avg_star;$i++)
                                            <span class="fa fa-star checked"></span>
                                        @endfor
                                        @for($i=1;$i<=5-$avg_star;$i++)
                                            <span class="fa fa-star"></span>
                                        @endfor</p>
                                </td>
                                @endforeach

                            </tr>

                            <tr>
                                <th style="text-align: center">Xóa bỏ</th>
                                @foreach($comparisons as $col)
                                <td class='text-center'><a href="{{ url('so-sanh-san-pham/xoa/'.$col->comparison_id) }}" class="remove-icon"><i style="padding: 5px 8px;background: antiquewhite;" class="fa fa-times"></i></a>
                                </td>
                                @endforeach
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
