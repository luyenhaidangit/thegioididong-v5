
<div class="modal fade" id="exampleModalCenter{{$key+1}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 1000px;width: 800px">
        <div class="modal-content" style="width: 800px">
            <form method="POST" style="padding: 20px; background: #fff;border-radius: 10px;">
                <input type="hidden" name="_token" value="PbTeUIrL9fsBZW2IdEJGKIl2Rz4RdvKIdOBbukoB" autocomplete="on">
                <h4 style="margin: 0px 0px 5px 0px;">#HDBH{{$ord->order_id}} - {{$ord->created_at}}</h4>
                <div class="order_table table-responsive mb-30" style="border: none;margin-bottom: 0px;">
                    <table style="margin-bottom: 20px;width: 100%;line-height: 1.7;">
                        <thead>
                        <tr>
                            <th style="width: 20%; padding: 10px 15px;border: 1px solid #c4d8ec;text-align: center">
                                Hình ảnh
                            </th>
                            <th style="width: 60%; padding: 10px 15px;border: 1px solid #c4d8ec;">
                                Sản phẩm
                            </th>
                            <th style="width: 20%;padding: 10px 15px;border: 1px solid #c4d8ec;text-align: center">Thành
                                tiền
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order_detail->where('order_id','=',$ord->order_id) as $ord_detail)
                        <tr>
                            <td style="padding: 10px 15px;border: 1px solid #c4d8ec;text-align: center;">
                                <img src="{{asset('public/images/'. $ord_detail->image)}}" style="max-width: 50px;">
                            </td>
                            <td style="padding: 10px 15px;border: 1px solid #c4d8ec;"> {{$ord_detail->name}}
                                <strong>
                                    × {{$ord_detail->quantity}}</strong></td>
                            <td style="padding: 10px 15px;border: 1px solid #c4d8ec;">
                                {{number_format($ord_detail->unit_price,'0',',','.')}}đ
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th style="padding: 10px 15px;border: 1px solid #c4d8ec;border-right: 0px;">TỔNG TIỀN</th>
                            <th style="padding: 10px 15px;border: 1px solid #c4d8ec;border-left: 0px;"></th>
                            <td style="padding: 10px 15px;border: 1px solid #c4d8ec;">
                                <strong>
                                    {{number_format($order_detail->where('order_id','=',$ord->order_id)->sum('total_price'),'0',',','.')}}đ
                                </strong>
                            </td>
                        </tr>
                        <tr>
                            <th style="padding: 10px 15px;border: 1px solid #c4d8ec;border-right: 0px;">PHÍ GIAO HÀNG</th>
                            <th style="padding: 10px 15px;border: 1px solid #c4d8ec;border-left: 0px;"></th>
                            <td style="padding: 10px 15px;border: 1px solid #c4d8ec;">
                                <strong>

                                        @foreach($shipping->where('shipping_id','=',$ord->shipping_id) as $fee_ship)
                                                {{number_format($fee_ship->shipping_fee,'0',',','.')}}đ
                                            @endforeach
                                </strong>
                            </td>
                        </tr>

                        @foreach($coupon->where('coupon_id','=',$ord->coupon_id) as $cou)
                            @if(isset($cou))
                            <tr>
                                <th style="padding: 10px 15px;border: 1px solid #c4d8ec;border-right: 0px;">MÃ GIẢM GIÁ</th>
                                <th style="padding: 10px 15px;border: 1px solid #c4d8ec;border-left: 0px;"></th>
                                <td style="padding: 10px 15px;border: 1px solid #c4d8ec;">
                                    <strong>
                                        - {{number_format($cou->coupon_money,'0',',','.')}}đ
                                    </strong>
                                </td>
                            </tr>
                            @else
                            @endif
                        @endforeach

                        <tr class="order_total" style="background-color: #fdd922;">
                            <th style="padding: 10px 15px;border: 1px solid #c4d8ec;border-right: 0px;">TỔNG ĐƠN HÀNG</th>
                            <th style="padding: 10px 15px;border: 1px solid #c4d8ec;border-left: 0px;"></th>
                            <td style="padding: 10px 15px;border: 1px solid #c4d8ec;">
                                <strong>
                                    {{number_format($ord->order_total,'0',',','.')}}
                                    đ
                                </strong>
                            </td>
                        </tr>

                        </tfoot>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
