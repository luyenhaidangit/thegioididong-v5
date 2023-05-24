@extends('user.theme.layout')
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{route('shopping.home')}}">Trang chủ</a></li>
                    <li class="active">Thông tin đơn hàng</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>
    <div class="body-content">
        <div class="container" style="margin-bottom: 30px">
            @if (session('message'))
                <div class="alert alert-success">
                    <p>{{ session('message') }}</p>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    <p>{{ session('error') }}</p>
                </div>
            @endif
            <div class="checkout-box faq-page">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-group checkout-steps" id="accordion">
                            @foreach($order as $key => $ord)
                                @if($key+1==1)
                            <!-- checkout-step-01  -->
                            <div class="panel panel-default checkout-step-{{$key+1}}">

                                <!-- panel-heading -->
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="collapsed" data-parent="#accordion"
                                           href="#collapse{{$key+1}}">
                                            @if($ord->order_status==1)
                                            <span>{{$key+1}}</span>MÃ HÓA ĐƠN: #HDBH{{$ord->order_id}} <i style="color: #0ba011;margin-left: 10px;font-size: 20px;" class="icon fa fa-spinner"></i>
                                            @elseif($ord->order_status==2)
                                                <span>{{$key+1}}</span>MÃ HÓA ĐƠN: #HDBH{{$ord->order_id}} <i style="color: #0ba011;margin-left: 10px;font-size: 20px;" class="icon fa fa-calendar-check-o"></i>
                                            @elseif($ord->order_status==3)
                                                <span>{{$key+1}}</span>MÃ HÓA ĐƠN: #HDBH{{$ord->order_id}} <i style="color: #0ba011;margin-left: 10px;font-size: 20px;" class="icon fa fa-truck"></i>
                                            @elseif($ord->order_status==4)
                                                <span>{{$key+1}}</span>MÃ HÓA ĐƠN: #HDBH{{$ord->order_id}} <i style="color: #0ba011;margin-left: 10px;font-size: 20px;" class="icon fa fa-check"></i>
                                            @elseif($ord->order_status==5)
                                                <span>{{$key+1}}</span>MÃ HÓA ĐƠN: #HDBH{{$ord->order_id}} <i style="color: #0ba011;margin-left: 10px;font-size: 20px;" class="icon fa fa-close"></i>
                                            @endif
                                        </a>
                                    </h4>
                                </div>
                                <!-- panel-heading -->

                                <div id="collapse{{$key+1}}" class="panel-collapse collapse" style="height: 0px;">

                                    <!-- panel-body  -->
                                    <div class="panel-body">
{{--                                        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
{{--                                        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>--}}
{{--                                        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>--}}
                                        <!------ Include the above in your HEAD tag ---------->

                                        <div class="row shop-tracking-status">

                                            <div class="col-md-12">
                                                <div class="well">

                                                    <h4>Trạng thái đơn đặt hàng của bạn:</h4>

                                                    <ul class="list-group">
                                                        <li class="list-group-item">
                                                            <span class="prefix">Ngày đặt hàng:</span>
                                                            <span class="label label-success">{{$ord->created_at}}</span>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <span class="prefix">Cập nhật lần cuối:</span>
                                                            <span class="label label-success">{{$ord->updated_at}}</span>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <span class="prefix">Trạng thái đơn hàng:</span>
                                                            @if($ord->order_status==1)
                                                            <span class="label label-success">Chờ xác nhận</span>
                                                            @elseif($ord->order_status==2)
                                                                <span class="label label-success">Đang được xử lý</span>
                                                            @elseif($ord->order_status==3)
                                                                <span class="label label-success">Đang vận chuyển</span>
                                                            @elseif($ord->order_status==4)
                                                                <span class="label label-success">Đã hoàn thành</span>
                                                            @elseif($ord->order_status==5)
                                                                <span class="label label-success">Đơn hàng lỗi</span>
                                                            @else
                                                            @endif
                                                        </li>
                                                        <li class="list-group-item">Xem chi tiết đơn hàng tại đây: <a class="label label-success" data-toggle="modal" data-target="#exampleModalCenter{{$key+1}}">click để xem chi tiết</a></li>
                                                    </ul>
                                                    @if($ord->order_status==3||$ord->order_status==4||$ord->order_status==5)
                                                    @else
                                                        <div class="form-horizontal">
                                                            <form action="{{route('customer.cancel-order')}}" method="POST">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" id="inputOrderTrackingID" name="cancel_content" value="" placeholder="Lý do bạn muốn hủy đơn hàng">
                                                                        <input style="display: none" type="text" class="form-control" name="customer_id" value="{{Auth::guard('account_customer')->id()}}" hidden>
                                                                        <input style="display: none" type="text" class="form-control" name="order_id" value="{{$ord->order_id}}" hidden>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <button style="float: right;" type="submit" id="shopGetOrderStatusID" class="btn btn-success">Gửi yêu cầu hủy đơn đặt hàng</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- panel-body  -->

                                </div><!-- row -->
                                <!-- Button trigger modal -->
                                <!-- Modal -->
                                @include('user.page.account_customer.model_order_detail')
                            </div>
                                @else
                                        <div class="panel panel-default checkout-step-{{$key+1}}">

                                            <!-- panel-heading -->
                                            <div class="panel-heading">
                                                <h4 class="unicase-checkout-title">
                                                    <a data-toggle="collapse" class="collapsed" data-parent="#accordion"
                                                       href="#collapse{{$key+1}}">
                                                        @if($ord->order_status==1)
                                                            <span>{{$key+1}}</span>MÃ HÓA ĐƠN: #HDBH{{$ord->order_id}} <i style="color: #0ba011;margin-left: 10px;font-size: 20px;" class="icon fa fa-spinner"></i>
                                                        @elseif($ord->order_status==2)
                                                            <span>{{$key+1}}</span>MÃ HÓA ĐƠN: #HDBH{{$ord->order_id}} <i style="color: #0ba011;margin-left: 10px;font-size: 20px;" class="icon fa fa-calendar-check-o"></i>
                                                        @elseif($ord->order_status==3)
                                                            <span>{{$key+1}}</span>MÃ HÓA ĐƠN: #HDBH{{$ord->order_id}} <i style="color: #0ba011;margin-left: 10px;font-size: 20px;" class="icon fa fa-truck"></i>
                                                        @elseif($ord->order_status==4)
                                                            <span>{{$key+1}}</span>MÃ HÓA ĐƠN: #HDBH{{$ord->order_id}} <i style="color: #0ba011;margin-left: 10px;font-size: 20px;" class="icon fa fa-check"></i>
                                                        @elseif($ord->order_status==5)
                                                            <span>{{$key+1}}</span>MÃ HÓA ĐƠN: #HDBH{{$ord->order_id}} <i style="color: #0ba011;margin-left: 10px;font-size: 20px;" class="icon fa fa-close"></i>
                                                        @endif
                                                    </a>
                                                </h4>
                                            </div>
                                            <!-- panel-heading -->

                                            <div id="collapse{{$key+1}}" class="panel-collapse collapse" style="height: 0px;">

                                                <!-- panel-body  -->
                                                <div class="panel-body">
                                                {{--                                        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
                                                {{--                                        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>--}}
                                                {{--                                        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>--}}
                                                <!------ Include the above in your HEAD tag ---------->

                                                    <div class="row shop-tracking-status">

                                                        <div class="col-md-12">
                                                            <div class="well">

                                                                <h4>Trạng thái đơn đặt hàng của bạn:</h4>

                                                                <ul class="list-group">
                                                                    <li class="list-group-item">
                                                                        <span class="prefix">Ngày đặt hàng:</span>
                                                                        <span class="label label-success">{{$ord->created_at}}</span>
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <span class="prefix">Cập nhật lần cuối:</span>
                                                                        <span class="label label-success">{{$ord->updated_at}}</span>
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <span class="prefix">Trạng thái đơn hàng:</span>
                                                                        @if($ord->order_status==1)
                                                                            <span class="label label-success">Chờ xác nhận</span>
                                                                        @elseif($ord->order_status==2)
                                                                            <span class="label label-success">Đang được xử lý</span>
                                                                        @elseif($ord->order_status==3)
                                                                            <span class="label label-success">Đang vận chuyển</span>
                                                                        @elseif($ord->order_status==4)
                                                                            <span class="label label-success">Đã hoàn thành</span>
                                                                        @elseif($ord->order_status==5)
                                                                            <span class="label label-success">Đơn hàng lỗi</span>
                                                                        @else
                                                                        @endif
                                                                    </li>
                                                                    <li class="list-group-item">Xem chi tiết đơn hàng tại đây: <a class="label label-success" data-toggle="modal" data-target="#exampleModalCenter{{$key+1}}">click để xem chi tiết</a></li>
                                                                </ul>
                                                                @if($ord->order_status==3||$ord->order_status==4||$ord->order_status==5)
                                                                @else
                                                                    <div class="form-horizontal">
                                                                        <form action="{{route('customer.cancel-order')}}" method="POST">
                                                                            @csrf
                                                                            <div class="form-group">
                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="form-control" id="inputOrderTrackingID" name="cancel_content" value="" placeholder="Lý do bạn muốn hủy đơn hàng">
                                                                                    <input style="display: none" type="text" class="form-control" name="customer_id" value="{{Auth::guard('account_customer')->id()}}" hidden>
                                                                                    <input style="display: none" type="text" class="form-control" name="order_id" value="{{$ord->order_id}}" hidden>
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                    <button style="float: right;" type="submit" id="shopGetOrderStatusID" class="btn btn-success">Gửi yêu cầu hủy đơn đặt hàng</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- panel-body  -->

                                            </div><!-- row -->
                                            <!-- Button trigger modal -->
                                            <!-- Modal -->
                                            @include('user.page.account_customer.model_order_detail')
                                        </div>
                                @endif
                            <!-- checkout-step-01  -->
                                @endforeach
                        </div><!-- /.checkout-steps -->
                    </div>
                </div><!-- /.row -->
            </div><!-- /.checkout-box -->
        </div><!-- /.container -->
    </div>
@stop
