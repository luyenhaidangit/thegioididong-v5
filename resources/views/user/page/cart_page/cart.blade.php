@extends('user.theme.layout')
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{route('shopping.home')}}">Trang chủ</a></li>
                    <li class='active'>Giỏ hàng</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content outer-top-xs">
        <div class="container" style="margin-bottom: 30px">
            <div class="row " style="padding: 0px 20px;">
                <div class="shopping-cart">
                    <div class="shopping-cart-table " style="overflow: auto;max-height: 376px;">
                        <div class="table-responsive">
                            @if(Session::has('Cart') != null)
                                <table class="table">
                                    <thead style="border-bottom: 1px solid #e0e4f6;">
                                    <tr>
                                        <th class="cart-description item">HÌNH ẢNH</th>
                                        <th class="cart-product-name item">TÊN SẢN PHẨM</th>
                                        <th class="cart-qty item">SỐ LƯỢNG</th>
                                        <th class="cart-sub-total item">ĐƠN GIÁ</th>
                                        <th class="cart-total last-item">THÀNH TIỀN</th>
                                        <th class="cart-romove item">XÓA</th>
                                    </tr>
                                    </thead><!-- /thead -->

                                    <tbody>
                                    @foreach(Session::get('Cart')->products as $item)
                                        <tr style="border-bottom: 1px solid #e0e4f6;">
                                            <td class="cart-image">
                                                <a class="entry-thumbnail" href="{{route('product.viewProduct', $item['productInfo']->id)}}">
                                                    <img src="{{asset('images/'.$item['productInfo']->image)}}"
                                                         alt="">
                                                </a>
                                            </td>
                                            <td class="cart-product-name-info" style="text-align: center">
                                                <h4 class='cart-product-description'><a
                                                        href="{{route('product.viewProduct', $item['productInfo']->id)}}">{{$item['productInfo']->name}}</a>
                                                </h4>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <?php
                                                        $avg_star=round(DB::table('comment')->where('product_id',$item['productInfo']->id)->avg('star'));
                                                        ?>
                                                        @for($i=1;$i<=$avg_star;$i++)
                                                            <span class="fa fa-star checked"></span>
                                                        @endfor
                                                        @for($i=1;$i<=5-$avg_star;$i++)
                                                            <span class="fa fa-star"></span>
                                                        @endfor
                                                    </div>
{{--                                                    <div class="col-sm-5">--}}
{{--                                                        <div class="reviews">--}}
{{--                                                            ( có {{DB::table('comment')->where('product_id',$item['productInfo']->id)->count()}} nhận xét)--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
                                                </div><!-- /.row -->
                                            </td>
                                            <td class="cart-product-quantity">
                                                <div class="counter">
                                                    <span onclick="SaveListItemCart1({{$item['productInfo']->id}})" href="javascript:" style="padding-right: 10px;">-</span>
                                                    <input value="{{$item['quanty']}}" type="text" data-id="{{$item['productInfo']->id}}" id="quanty-item-{{$item['productInfo']->id}}" min="1" disabled>
                                                    <span onclick="SaveListItemCart({{$item['productInfo']->id}})" href="javascript:" style="padding-left: 10px">+</span>
                                                </div>
                                            </td>
                                            <td class="cart-product-sub-total"><span class="cart-sub-total-price">{{number_format($item['productInfo']->price - $item['productInfo']->discount,'0',',','.')}} VNĐ</span>
                                            </td>
                                            <td class="cart-product-grand-total"><span
                                                    class="cart-grand-total-price">{{number_format($item['price'],'0',',','.')}} VNĐ</span>
                                            </td>
                                            <td class="romove-item"><a
                                                    onclick="DeleteListItemCart({{$item['productInfo']->id}})"
                                                    href="javascript:" title="cancel" class="icon"><i
                                                        class="fa fa-trash-o"></i></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody><!-- /tbody -->
                                </table><!-- /table -->
                            @endif
                        </div>
                    </div><!-- /.shopping-cart-table -->

                    <div class="col-md-4 col-sm-12"></div>
                    <div class="col-md-4 col-sm-12 cart-shopping-total">
                        <table class="table" style="margin-bottom: 0px;">
                            <thead>
                            <tr>
                                <th style="padding: 20px;border-bottom: 2px solid white;">
                                    <div class="cart-grand-total">
                                        @if(Session::has('Cart') != null)
                                            TỔNG CỘNG:<span class="inner-left-md" style="color: #3a89cf;">{{number_format(Session::get('Cart')->totalPrice,'0',',','.')}} VNĐ</span>
                                        @else
                                            TỔNG CỘNG:<span class="inner-left-md" style="color: #3a89cf;">0 VNĐ</span>
                                        @endif
                                    </div>
                                </th>
                            </tr>
                            </thead><!-- /thead -->
                            <tbody>
                            <tr>
                                <td>
                                    <div class="cart-checkout-btn pull-right" style="width: 100%;text-align: center;">
                                        <button type="submit" class="btn btn-primary checkout-btn" style="background: #108bea;">
                                            <a href="{{route('shopping.checkout-page')}}"
                                               style="color: white;padding: 13px 15px;">THỦ TỤC ĐẶT HÀNG</a>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div><!-- /.cart-shopping-total -->
                    <div class="col-md-4 col-sm-12"></div>
                </div><!-- /.shopping-cart -->
            </div> <!-- /.row -->
        </div>
    </div>
@stop
