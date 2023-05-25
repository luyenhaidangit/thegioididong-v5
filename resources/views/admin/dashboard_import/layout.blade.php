

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
    <script src="//cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>

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
                            <h4 class="page-title">Thống kê nhập hàng</h4>
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
                                <div class="row">
                                    <div class="col-xl-4 col-sm-6">
                                        <div class="card bg-pink">
                                            <div class="card-body widget-style-2">
                                                <div class="text-white media">
                                                    <div class="media-body align-self-center">
                                                        <h2 class="my-0 text-white"><span data-plugin="counterup">{{$import->unique('product_id')->count()}}</span></h2>
                                                        <p class="mb-0">Số lượng sản phẩm nhập</p>
                                                    </div>
                                                    <i class="ion-ios-cart"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-sm-6">
                                        <div class="card bg-info">
                                            <div class="card-body widget-style-2">
                                                <div class="text-white media">
                                                    <div class="media-body align-self-center">
                                                        <h2 class="my-0 text-white"><span data-plugin="counterup">{{$import->count()}}</span></h2>
                                                        <p class="mb-0">Số lượng phiếu nhập</p>
                                                    </div>
                                                    <i class="ion-ios-pricetag"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-sm-6">
                                        <div class="card bg-purple">
                                            <div class="card-body widget-style-2">
                                                <div class="text-white media">
                                                    <div class="media-body align-self-center">
                                                        <h2 class="my-0 text-white"><span data-plugin="counterup">{{number_format($import->sum('total_import'))}}</span></h2>
                                                        <p class="mb-0">Tổng tiền nhập (VNĐ)</p>
                                                    </div>
                                                    <i class="ion-md-paper-plane"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form action="{{route('admin.search-thong-ke')}}" method="post" class="mb-3" style="margin-top: 5px">
                                        @csrf
                                        <label class="size-label" style="margin-right: 5px; margin-left: 10px; font-size: 15px">Năm: </label>
                                        <select id="year" name= "value_year" style="width: 120px; height: 30px ; margin-right: 10px"></select>
                                        <label class="size-label" style="margin-right: 5px; margin-left: 10px; font-size: 15px">Tháng: </label>
                                        <select id="month" name= "value_month" style="width: 120px; height: 30px ; margin-right: 10px"></select>
{{--                                        <label class="size-label" style="margin-right: 5px; margin-left: 10px; font-size: 15px">Ngày: </label>--}}
{{--                                        <select id="day" name= "value_day" style="width: 120px; height: 30px ; margin-right: 10px"></select>--}}
                                        <button type="submit" name="submit_chose" class="btn btn-primary">Tìm kiếm</button>
                                    </form>
                                </div>
                            </div>
                            <div id="cardCollpase3" class="collapse show">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-nowrap mb-0">
                                            <thead>
                                            <tr>
                                                <th>#Mã</th>
                                                <th>Tên sản phẩm</th>
                                                <th>giá nhập</th>
                                                <th>giá bán</th>
                                                <th>SL nhập</th>
                                                <th>SL tồn</th>
                                                <th>Tổng tiền nhập</th>
                                                <th>Tổng tiền bán</th>
                                                <th>Lợi nhuận</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($import as $imp)
                                            {{-- <tr>
                                                <td>{{$imp->import_id}}</td>
                                                <td width="400px" style="white-space: normal">{{$imp->name}}</td>

                                                <td>{{number_format($imp->where('product_id','=',$imp->product_id)->sum('total_import')/$imp->where('product_id','=',$imp->product_id)->sum('import_qty'))}}đ</td>
                                                <td>{{number_format($imp->price-$imp->discount)}}đ</td>
                                                <td>{{$imp->where('product_id','=',$imp->product_id)->sum('import_qty')}}</td>
                                                <td>{{$imp->qty_inventory}}</td>
                                                <td>{{number_format($imp->where('product_id','=',$imp->product_id)->sum('total_import'))}}đ</td>
                                                <td>{{number_format($order->where('id','=',$imp->product_id)->sum('total_price'))}}đ</td>
                                                <?php
                                                $tong_tien_ban=$order->where('id','=',$imp->product_id)->sum('total_price');
                                                $sl_ban=$imp->where('product_id','=',$imp->product_id)->sum('import_qty')-$imp->qty_inventory;
                                                $gia_nhap=$imp->where('product_id','=',$imp->product_id)->sum('total_import')/$imp->where('product_id','=',$imp->product_id)->sum('import_qty');
                                                ?>
                                                <td>{{number_format($tong_tien_ban-($sl_ban*$gia_nhap))}}đ</td>
                                            </tr> --}}
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        const monthNames = ["1", "2", "3", "4", "5", "6",
            "7", "8", "9", "10", "11", "12"
        ];
        let qntYears = 10;
        let selectYear = $("#year");
        let selectMonth = $("#month");
        let selectDay = $("#day");
        let currentYear = new Date().getFullYear();

        for (var y = 0; y < qntYears; y++) {
            let date = new Date(currentYear);
            let yearElem = document.createElement("option");
            yearElem.value = currentYear
            yearElem.textContent = currentYear;
            selectYear.append(yearElem);
            currentYear--;
        }

        for (var m = 0; m < 12; m++) {
            let month = monthNames[m];
            let monthElem = document.createElement("option");
            monthElem.value = m;
            monthElem.textContent = month;
            selectMonth.append(monthElem);
        }

        var d = new Date();
        var month = d.getMonth();
        var year = d.getFullYear();
        var day = d.getDate();

        selectYear.val(year);
        selectYear.on("change", AdjustDays);
        selectMonth.val(month);
        selectMonth.on("change", AdjustDays);

        AdjustDays();
        selectDay.val(day)

        function AdjustDays() {
            var year = selectYear.val();
            var month = parseInt(selectMonth.val()) + 1;
            selectDay.empty();

            //get the last day, so the number of days in that month
            var days = new Date(year, month, 0).getDate();

            //lets create the days of that month
            for (var d = 1; d <= days; d++) {
                var dayElem = document.createElement("option");
                dayElem.value = d;
                dayElem.textContent = d;
                selectDay.append(dayElem);
            }
        }
    });
</script>

</body>
</html>
