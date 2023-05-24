@extends('user.theme.layout')
@section('content')
    <style>
        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0, 0, 0); /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{route('shopping.home')}}">Trang chủ</a></li>
                    <li class='active'>Thông tin tài khoản</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="container bootstrap snippets bootdey" style="margin-bottom: 20px">
        @if (session('message'))
            <div class="alert alert-success" style="text-align: center">
                <p>{{ session('message') }}</p>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" style="text-align: center">
                <p>{{ session('error') }}</p>
            </div>
        @endif
        <div class="row">
            <div class="profile-nav col-md-3" style="margin-top: 0px">
                <div class="panel">
                    <div class="user-heading round" style="background: #157ed2;">
                        <a href="#">
                            @if($accountcustomer->image!=null)
                                <img src="{{asset('images/'. $accountcustomer->image)}}" alt="">
                            @else
                                <img src="{{asset('images/avatar-mac-dinh-1.png')}}" alt="">
                            @endif
                        </a>
                        <h1>{{$accountcustomer->name}}</h1>
                        <p>{{$accountcustomer->email}}</p>
                    </div>

                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a> <i class="fa fa-user"></i> Hồ sơ</a></li>
                        <li><a id="myBtn" href="javascript:"> <i class="fa fa-edit"></i> Chỉnh sửa hồ sơ</a></li>
                        <li><a href="{{route('customer.track-order')}}"> <i class="fa fa-calendar"></i> Đơn đặt hàng <span
                                    class="label label-warning pull-right r-activity">{{$order->where('order_status','<>',0)->count()}}</span></a></li>
                        @include('user.page.account_customer.create_profiles')
                    </ul>
                </div>
            </div>
            <div class="profile-info col-md-9" style="margin-top: 0px">
                <div style="height: 66px;border-radius: 4px 4px 0px 0px;background: #157ed2;">
                    <h4 style="font-weight: 600; color: white;margin: 0px;text-align: center;padding: 25px 0px 0px 0px;">THÔNG TIN TÀI KHOẢN</h4>
                </div>
                <div class="panel" style="border-radius: 0px 0px 4px 4px;">
                    <div class="panel-body bio-graph-info">

                        <div class="row">
                            <div class="bio-row">
                                <p><span>Ngày tạo</span>: {{date('d-m-Y', strtotime($accountcustomer->created_at))}}</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Địa chỉ nhà </span>: {{$accountcustomer->address}}</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Họ tên </span>: {{$accountcustomer->name}}</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Xã phường </span>: {{$name_wards}}</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Điện thoại </span>: {{$accountcustomer->phone}}</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Quận huyện </span>: {{$name_province}}</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Email </span>: {{$accountcustomer->email}}</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Thành phố </span>: {{$name_city}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel">
                                <div class="panel-body" style="height: 65px;">
                                    <div class="bio-chart">
                                        <div>
                                            <input class="knob" data-width="100" data-height="100"
                                                   data-displayprevious="true" data-thickness=".2"
                                                   value="{{$order->where('order_status','=',1)->count()}}"
                                                   data-fgcolor="#e06b7d" data-bgcolor="#e8e8e8"
                                                   style="width: 10px;position: absolute; vertical-align: middle; margin-top: 8px; margin-left: 0px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(224, 107, 125); padding: 0px; -webkit-appearance: none; background: none;" readonly>
                                        </div>
                                    </div>
                                    <div class="bio-desk" style="width: 100%;text-align: right;">
                                        <h4 class="red">Đơn hàng chờ xác nhận</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel">
                                <div class="panel-body" style="height: 65px;">
                                    <div class="bio-chart">
                                        <div>
                                            <input class="knob" data-width="100" data-height="100"
                                                   data-displayprevious="true" data-thickness=".2" value="{{$order->where('order_status','=',2)->count()}}"
                                                   data-fgcolor="#4CC5CD" data-bgcolor="#e8e8e8"
                                                   style="width: 10px;position: absolute; vertical-align: middle; margin-top: 8px; margin-left: 0px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(76, 197, 205); padding: 0px; -webkit-appearance: none; background: none;" readonly>
                                        </div>
                                    </div>
                                    <div class="bio-desk" style="width: 100%;text-align: right;">
                                        <h4 class="terques">Đơn hàng đang xử lý</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel">
                                <div class="panel-body" style="height: 65px;">
                                    <div class="bio-chart">
                                        <div>
                                            <input class="knob" data-width="100" data-height="100"
                                                   data-displayprevious="true" data-thickness=".2" value="{{$order->where('order_status','=',3)->count()}}"
                                                   data-fgcolor="#96be4b" data-bgcolor="#e8e8e8"
                                                   style="width: 10px;position: absolute; vertical-align: middle; margin-top: 8px; margin-left: 0px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(150, 190, 75); padding: 0px; -webkit-appearance: none; background: none;" readonly>
                                        </div>
                                    </div>
                                    <div class="bio-desk" style="width: 100%;text-align: right;">
                                        <h4 class="green">Đơn hàng đang vận chuyển</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel">
                                <div class="panel-body" style="height: 65px;">
                                    <div class="bio-chart">
                                        <div>
                                            <input class="knob" data-width="100" data-height="100"
                                                   data-displayprevious="true" data-thickness=".2" value="{{$order->where('order_status','=',4)->count()}}"
                                                   data-fgcolor="#cba4db" data-bgcolor="#e8e8e8"
                                                   style="width: 10px;position: absolute; vertical-align: middle; margin-top: 8px; margin-left: 0px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(203, 164, 219); padding: 0px; -webkit-appearance: none; background: none;" readonly>
                                        </div>
                                    </div>
                                    <div class="bio-desk" style="width: 100%;text-align: right;">
                                        <h4 class="purple">Đơn hàng đã hoàn thành</h4>
{{--                                        <p>Started : 15 July</p>--}}
{{--                                        <p>Deadline : 15 August</p>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
