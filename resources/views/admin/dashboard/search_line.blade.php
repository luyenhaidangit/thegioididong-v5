

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>TLmobile | Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{!! asset('admin/assets/images/favicon.ico') !!}">

    <!-- third party css -->
    <link href="{!! asset('admin/assets/libs/datatables/dataTables.bootstrap4.min.css') !!}" rel="stylesheet" type="text/css">
    <link href="{!! asset('admin/assets/libs/datatables/buttons.bootstrap4.min.css') !!}" rel="stylesheet" type="text/css">
    <link href="{!! asset('admin/assets/libs/datatables/responsive.bootstrap4.min.css') !!}" rel="stylesheet" type="text/css">
    <link href="{!! asset('admin/assets/libs/datatables/select.bootstrap4.min.css') !!}" rel="stylesheet" type="text/css">

    <!-- App css -->
    <link href="{!! asset('admin/assets/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
    <link href="{!! asset('admin/assets/css/icons.min.css') !!}" rel="stylesheet" type="text/css">
    <link href="{!! asset('admin/assets/css/app.min.css') !!}" rel="stylesheet" type="text/css" id="app-stylesheet">
    <style>
        .canvasjs-chart-credit
        {
            display: none !important;
        }
        .canvasjs-chart-credit
        {
            display: none !important;
        }
        .custom-select {
            position: relative;
            font-family: Arial;
        }

        .custom-select select {
            display: none; /*hide original SELECT element:*/
        }

        .select-selected {
            background-color: DodgerBlue;
        }

        /*style the arrow inside the select element:*/
        .select-selected:after {
            position: absolute;
            content: "";
            top: 14px;
            right: 10px;
            width: 0;
            height: 0;
            border: 6px solid transparent;
            border-color: #fff transparent transparent transparent;
        }

        /*point the arrow upwards when the select box is open (active):*/
        .select-selected.select-arrow-active:after {
            border-color: transparent transparent #fff transparent;
            top: 7px;
        }

        /*style the items (options), including the selected item:*/
        .select-items div,.select-selected {
            color: #ffffff;
            padding: 8px 16px;
            border: 1px solid transparent;
            border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
            cursor: pointer;
            user-select: none;
        }

        /*style items (options):*/
        .select-items {
            position: absolute;
            background-color: DodgerBlue;
            top: 100%;
            left: 0;
            right: 0;
            z-index: 99;
        }

        /*hide the items when the select box is closed:*/
        .select-hide {
            display: none;
        }

        .select-items div:hover, .same-as-selected {
            background-color: rgba(0, 0, 0, 0.1);
        }
    </style>
    <script src="//cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
    <script>
        window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                data: [{
                    type: "pie",
                    indexLabel: "{label} ({y})",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            var chart1 = new CanvasJS.Chart("chartContainer1", {
                title: {
                    text: "  "
                },
                axisY: {
                    prefix: "VNĐ "
                },
                data: [{
                    type: "line",
                    dataPoints: <?php echo json_encode($dataPoints_order, JSON_NUMERIC_CHECK); ?>
                }]
            });
            var chart2 = new CanvasJS.Chart("chartContainer2", {
                animationEnabled: true,
                theme: "dark1",
                axisY: {
                    title: "Sản phẩm trong danh mục"
                },
                data: [{
                    type: "column",
                    yValueFormatString: "#,##0.## ",
                    dataPoints: <?php echo json_encode($dataPoints_category, JSON_NUMERIC_CHECK); ?>
                }]
            });

            chart.render();
            chart1.render();
            chart2.render();


        }
    </script>

</head>

<body>

<!-- Begin page -->
<div id="wrapper">
    @include('admin.theme.nav')

    @include('admin.theme.sidebar')

    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Dashboard</h4>
                            <div class="page-title-right">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive">
                                <h4 class="m-t-0 header-title mb-4"><b>Thống kê TLmobile</b></h4>
                                <div class="row">
                                    <div class="col-xl-3 col-sm-6">
                                        <div class="card bg-pink">
                                            <div class="card-body widget-style-2">
                                                <div class="text-white media">
                                                    <div class="media-body align-self-center">
                                                        <h2 class="my-0 text-white"><span data-plugin="counterup">{{$total_quantity}}</span></h2>
                                                        <p class="mb-0">Số lượng sản phẩm bán</p>
                                                    </div>
                                                    <i class="ion-ios-cart"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-sm-6">
                                        <div class="card bg-purple">
                                            <div class="card-body widget-style-2">
                                                <div class="text-white media">
                                                    <div class="media-body align-self-center">
                                                        <h2 class="my-0 text-white"><span
                                                                    data-plugin="counterup">{{number_format($total_order_money)}}</span></h2>
                                                        <p class="mb-0">Doanh thu bán (VNĐ)</p>
                                                    </div>
                                                    <i class="ion-md-paper-plane"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-sm-6">
                                        <div class="card bg-info">
                                            <div class="card-body widget-style-2">
                                                <div class="text-white media">
                                                    <div class="media-body align-self-center">
                                                        <h2 class="my-0 text-white"><span data-plugin="counterup">{{$count_order}}</span></h2>
                                                        <p class="mb-0">Hóa đơn bán</p>
                                                    </div>
                                                    <i class="ion-ios-pricetag"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-sm-6">
                                        <div class="card bg-primary">
                                            <div class="card-body widget-style-2">
                                                <div class="text-white media">
                                                    <div class="media-body align-self-center">
                                                        <h2 class="my-0 text-white"><span data-plugin="counterup">{{$count}}</span></h2>
                                                        <p class="mb-0">Tài khoản khách hàng</p>
                                                    </div>
                                                    <i class="mdi mdi-account-multiple-outline"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">

                                        <div class="card">
                                            <h4 class="header-title mb-4" style="margin-top: 10px; margin-left: 10px">Tìm kiếm doanh thu bán theo năm </h4>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <form action="{{route('order_line.search')}}" method="get" class="mb-3" style="margin-top: 5px">
                                                        <label class="size-label" style="margin-right: 5px; margin-left: 10px; font-size: 15px">Năm: </label>
                                                        <select id='date-dropdown'  name= "value_year" style="width: 120px; height: 30px ; margin-right: 10px"  ></select>
                                                        <button type="submit" name="submit_chose" class="btn btn-primary">Tìm kiếm</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="card-header py-3 bg-transparent">
                                                <div class="card-widgets">
                                                    <a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                                    <a data-toggle="collapse" href="#cardCollpase2" role="button" aria-expanded="false" aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                                                    <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                                                </div>
                                                <h1 class="header-title mb-0">Thống kê doanh thu bán năm {{$selected}}</h1>
                                            </div>
                                            <div id="cardCollpase2" class="collapse show">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div id="chartContainer1" style="height: 370px; width: 100%; "></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- end card-->
                                    </div>
                                    <!-- Donut Chart -->
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-header py-3 bg-transparent">
                                                <div class="card-widgets">
                                                    <a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                                    <a data-toggle="collapse" href="#cardCollpase3" role="button" aria-expanded="false" aria-controls="cardCollpase3"><i class="mdi mdi-minus"></i></a>
                                                    <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                                                </div>
                                                <h1 class="header-title mb-0">Danh mục sản phẩm  </h1>
                                            </div>
                                            <div id="cardCollpase3" class="collapse show">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div id="chartContainer2" style="height: 370px; width: 100%; "></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end card-->
                                    </div>
                                    <!-- Donut Chart -->
                                </div>
                                <div class="row">
                                    <!-- Area Chart -->
                                    <div class="col-xl-6">
                                        <div class="card">
                                            <div class="card-header py-3 bg-transparent">
                                                <div class="card-widgets">
                                                    <a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                                    <a data-toggle="collapse" href="#cardCollpase2" role="button" aria-expanded="false" aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                                                    <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                                                </div>
                                                <h5 class="header-title mb-0">Thông kê đơn hàng</h5>
                                            </div>
                                            <div id="cardCollpase2" class="collapse show">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div id="chartContainer" style="height: 350px; width: 100%; margin-top: -10px"></div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- end card-->
                                    </div>

                                    <!-- Donut Chart -->
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-header py-3 bg-transparent">
                                                <div class="card-widgets">
                                                </div>
                                                <h5 class="header-title mb-0"> Sản phẩm được mua nhiều nhất </h5>
                                            </div>
                                            <div id="cardCollpase4" class="collapse show">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-nowrap mb-0">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Tên Sản Phẩm</th>
                                                                <th>Lượt mua</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach ($topsales as $key => $item_top_order )
                                                                <tr>
                                                                    <td>{{$key+1}}</td>
                                                                    <td width="500px" style="white-space: normal">{{$item_top_order->name}}</td>
                                                                    <td>{{$item_top_order->total}}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- end card-->

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-header py-3 bg-transparent">
                                                <div class="card-widgets">
                                                </div>
                                                <h5 class="header-title mb-0"> Sản phẩm xem nhiều nhất </h5>
                                            </div>
                                            <div id="cardCollpase4" class="collapse show">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-nowrap mb-0">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Tên Sản Phẩm</th>
                                                                <th>Lượt xem</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach ($product_top_view as $key => $item_top_view)
                                                                @if($item_top_view->view_number > 0)
                                                                    <tr>
                                                                        <td>{{$key+1}}</td>
                                                                        <td width="500px" style="white-space: normal">{{$item_top_view->name}}</td>
                                                                        <td>{{$item_top_view->view_number}}</td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- end card-->

                                    </div>
                                    <!-- end col -->

                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-header py-3 bg-transparent">
                                                <div class="card-widgets">
                                                    {{--                                                    <a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>--}}
                                                    {{--                                                    <a data-toggle="collapse" href="#cardCollpase4" role="button" aria-expanded="false" aria-controls="cardCollpase4"><i class="mdi mdi-minus"></i></a>--}}
                                                    {{--                                                    <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a>--}}
                                                </div>
                                                <h5 class="header-title mb-0"> Bài viết xem nhiều nhất </h5>
                                            </div>
                                            <div id="cardCollpase4" class="collapse show">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-nowrap mb-0">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Tên bài viết </th>
                                                                <th>Lượt xem</th>
                                                                {{--                                                                <th>Due Date</th>--}}
                                                                {{--                                                                <th>Status</th>--}}
                                                                {{--                                                                <th>Assign</th>--}}
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach ($blog_view as $key => $item_blog )
                                                                @if($item_blog->view > 0 )
                                                                    <tr>
                                                                        <td>{{$key+1}}</td>
                                                                        <td width="500px" style="white-space: normal">{{$item_blog->blog_title}}</td>
                                                                        <td>{{$item_blog->view}}</td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- end card-->

                                    </div>
                                    <!-- end col -->

                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header border-0">
                                                <div class="d-flex justify-content-between">
                                                    <h3 class="card-title">Thống kê truy cập</h3>
                                                    {{--                                                    <a href="javascript:void(0);">View Report</a>--}}
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <p class="d-flex flex-column">
                                                        {{--                                                        <span class="text-bold text-lg">820</span>--}}
                                                        {{--                                                        <span>Visitors Over Time</span>--}}
                                                    </p>
                                                    <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
{{--                      <i class="fas fa-arrow-up"></i>--}}
                    </span>
                                                        {{--                                                        <span class="text-muted">Since last week</span>--}}
                                                    </p>
                                                </div>
                                                <!-- /.d-flex -->

                                                <div class="position-relative mb-4">
                                                    <canvas id="visitors-chart" height="200"></canvas>
                                                </div>

                                                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Người dùng
                  </span>

                                                    <span>
                    <i class="fas fa-square text-gray"></i> Lượt xem trang
                  </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-header py-3 bg-transparent">
                                                <div class="card-widgets">
                                                    <a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                                    <a data-toggle="collapse" href="#cardCollpase4" role="button" aria-expanded="false" aria-controls="cardCollpase4"><i class="mdi mdi-minus"></i></a>
                                                    <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                                                </div>
                                                <h5 class="header-title mb-0"> Trình duyệt truy cập hàng đầu </h5>
                                            </div>
                                            <div id="cardCollpase4" class="collapse show">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-nowrap mb-0">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Trình duyện</th>
                                                                <th>Phiên truy cập</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach ($topBrowers as $key => $item )
                                                                <tr>
                                                                    <td>{{$key+1}}</td>
                                                                    <td>{{$item['browser']}}</td>
                                                                    <td>{{$item['sessions']}}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- end card-->

                                    </div>
                                    <!-- end col -->

                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-header py-3 bg-transparent">
                                                <div class="card-widgets">
                                                    <a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                                    <a data-toggle="collapse" href="#cardCollpase4" role="button" aria-expanded="false" aria-controls="cardCollpase4"><i class="mdi mdi-minus"></i></a>
                                                    <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                                                </div>
                                                <h5 class="header-title mb-0"> Trang được truy cập hàng đầu  </h5>
                                            </div>
                                            <div id="cardCollpase4" class="collapse show">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-nowrap mb-0">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Trang (URL) </th>
                                                                <th>Lượt truy cập</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach ($topViewPage as $key => $item )
                                                                <tr>
                                                                    <td>{{$key+1}}</td>
                                                                    <td>{{$item['url']}}</td>
                                                                    <td>{{$item['pageViews']}}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- end card-->

                                    </div>
                                    <!-- end col -->

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="header-title mb-4">Tìm kiếm hóa đơn theo ngày</h4>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <form class="form-inline" action="{{route('order.search')}}" method="GET">
                                                            @csrf
                                                            <div class="form-group mr-3">
                                                                <label>Từ: </label>
                                                                <input type="date" class="form-control" name="start_date">
                                                            </div>
                                                            <div class="form-group mr-3">
                                                                <label>Đến: </label>
                                                                <input type="date" class="form-control" name="end_date">
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @if(isset($date_start) and isset($date_end))
                                                <p class="name-date">Hóa đơn từ ngày {{   $date_start}} đến {{   $date_end}} </p>

                                            @endif
                                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                <th>Mã Hóa Đơn</th>
                                                <th>Tên Khách Hàng</th>
                                                <th>Ngày Đặt</th>
                                                {{--        <th>Mô tả</th>--}}
                                                {{--        <th>Option</th>--}}
                                                {{--        <th>Edit</th>--}}
                                                {{--        <th>Lock</th>--}}
                                                {{--        <th>Delete</th>--}}
                                                </thead>

                                                <tbody>

                                                @if(isset($orders_search))
                                                    @foreach($orders_search as $order)
                                                        {{--            {{dump($order)}}--}}

                                                        <tr>
                                                            <td>HĐBH{{$order->order_id}}</td>
                                                            <td>@foreach ($customers as $customer)
                                                                    @if($customer->shipping_id==$order->shipping_id)
                                                                        {{$customer->customer_name}}
                                                                    @endif
                                                                @endforeach</td>
                                                            <td>Ngày {{date_format($order->created_at,'d-m-Y H:i:s')}}</td>
                                                            {{--                <td>--}}
                                                            {{--                    <form action="{{route('blog.destroy', $blog->blog_id)}}" method="POST">--}}
                                                            {{--                        @csrf--}}
                                                            {{--                        @method('DELETE')--}}
                                                            {{--                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>--}}
                                                            {{--                        <a href="#" class="btn btn-outline-primary"><i class="fa fa-eye"></i></a>--}}
                                                            {{--                        <a href="{{route('blog.edit', $blog->blog_id)}}" class="btn btn-primary"><i--}}
                                                            {{--                                    class="fa fa-edit"></i></a>--}}
                                                            {{--                        <a href="" class="btn btn-warning"><i class="fa fa-lock"></i></a>--}}
                                                            {{--                    </form>--}}
                                                            {{--                </td>--}}

                                                        </tr>
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Footer Start -->
        <!-- end Footer -->

    </div>

</div>


<script src="{!! asset('admin/assets/js/vendor.min.js') !!}"></script>

<!-- Required datatable js -->
<script src="{!! asset('admin/assets/libs/datatables/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('admin/assets/libs/datatables/dataTables.bootstrap4.min.js') !!}"></script>
<!-- Buttons examples -->
<script src="{!! asset('admin/assets/libs/datatables/dataTables.buttons.min.js') !!}"></script>
<script src="{!! asset('admin/assets/libs/datatables/buttons.bootstrap4.min.js') !!}"></script>
<script src="{!! asset('admin/assets/libs/jszip/jszip.min.js') !!}"></script>
<script src="{!! asset('admin/assets/libs/pdfmake/pdfmake.min.js') !!}"></script>
<script src="{!! asset('admin/assets/libs/pdfmake/vfs_fonts.js') !!}"></script>
<script src="{!! asset('admin/assets/libs/datatables/buttons.html5.min.js') !!}"></script>
<script src="{!! asset('admin/assets/libs/datatables/buttons.print.min.js') !!}"></script>

<!-- Responsive examples -->
<script src="{!! asset('admin/assets/libs/datatables/dataTables.responsive.min.js') !!}"></script>
<script src="{!! asset('admin/assets/libs/datatables/responsive.bootstrap4.min.js') !!}"></script>

<script src="{!! asset('admin/assets/libs/datatables/dataTables.keyTable.min.js') !!}"></script>
<script src="{!! asset('admin/assets/libs/datatables/dataTables.select.min.js') !!}"></script>

<!-- Datatables init -->
<script src="{!! asset('admin/assets/js/pages/datatables.init.js') !!}"></script>

<script src="{!! asset('public/admin/assets/libs/morris-js/morris.min.js') !!}"></script>
<script src="{!! asset('public/admin/assets/libs/raphael/raphael.min.js') !!}"></script>
<script src="{!! asset('public/admin/assets/js/pages/morris.init.js') !!}"></script>
{{--<script src="assets\libs\morris-js\morris.min.js"></script>--}}
{{--<script src="assets\libs\raphael\raphael.min.js"></script>--}}
<!-- App js -->
<script src="{!! asset('admin/assets/js/app.min.js') !!}"></script>
<script>CKEDITOR.replace('contents')</script>
<script>CKEDITOR.replace('data')</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.7.0/echarts.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    $(function () {
        'use strict'
        var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold'
        }
        var mode = 'index'
        var intersect = true
        var $visitorsChart = $('#visitors-chart')
        // eslint-disable-next-line no-unused-vars
        var visitorsChart = new Chart($visitorsChart, {
            data: {
                labels: {!! json_encode($date_time_add->map(function ($d){return $d->format('d/m/y');})) !!},
                datasets: [{
                    type: 'line',
                    data: {!! json_encode($visitor) !!},
                    backgroundColor: 'transparent',
                    borderColor: '#007bff',
                    pointBorderColor: '#007bff',
                    pointBackgroundColor: '#007bff',
                    fill: false
                    // pointHoverBackgroundColor: '#007bff',
                    // pointHoverBorderColor    : '#007bff'
                },
                    {
                        type: 'line',
                        data: {!! json_encode($pageview) !!},
                        backgroundColor: 'tansparent',
                        borderColor: '#ced4da',
                        pointBorderColor: '#ced4da',
                        pointBackgroundColor: '#ced4da',
                        fill: false
                        // pointHoverBackgroundColor: '#ced4da',
                        // pointHoverBorderColor    : '#ced4da'
                    }]
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    mode: mode,
                    intersect: intersect
                },
                hover: {
                    mode: mode,
                    intersect: intersect
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        // display: false,
                        gridLines: {
                            display: true,
                            lineWidth: '4px',
                            color: 'rgba(0, 0, 0, .2)',
                            zeroLineColor: 'transparent'
                        },
                        ticks: $.extend({
                            beginAtZero: true,
                            suggestedMax: 200
                        }, ticksStyle)
                    }],
                    xAxes: [{
                        display: true,
                        gridLines: {
                            display: false
                        },
                        ticks: ticksStyle
                    }]
                }
            }
        })
    })
</script>
<script>
    let dateDropdown = document.getElementById('date-dropdown');

    let currentYear = new Date().getFullYear();
    let earliestYear = 1970;

    while (currentYear >= earliestYear) {
        let dateOption = document.createElement('option');
        dateOption.text = currentYear;
        dateOption.value = currentYear;
        dateDropdown.add(dateOption);
        currentYear -= 1;
    }
</script>
</body>
</html>
