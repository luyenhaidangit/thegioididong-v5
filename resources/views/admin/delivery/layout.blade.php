{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}
{{--    <meta name="description" content="">--}}
{{--    <meta name="author" content="">--}}
{{--    <title>SB Admin 2 - Dashboard</title>--}}
{{--    <link href="{!! asset('public\admin/vendor/fontawesome-free/css/all.min.css') !!}" rel="stylesheet" type="text/css">--}}
{{--    <link--}}
{{--        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"--}}
{{--        rel="stylesheet">--}}
{{--    <link href="{!! asset('public\admin/css/sb-admin-2.min.css') !!}" rel="stylesheet">--}}
{{--    <script src="{!! asset('public\admin/js/jquery.min.js') !!}"></script>--}}
{{--  <script src="{!! asset('public\admin/ckeditor/ckeditor.js') !!}"></script>--}}
{{--</head>--}}
{{--<body id="page-top">--}}
{{--    <div id="wrapper">--}}
{{--        @include('admin.theme.sidebar')--}}
{{--        <div id="content-wrapper" class="d-flex flex-column">--}}
{{--            <div id="content">--}}
{{--                @include('admin.theme.nav')--}}
{{--                @if(Session::has('message'))--}}
{{--                <div class="alert alert-success">--}}
{{--                  {{ Session::get('message') }}--}}
{{--                </div>--}}
{{--                @endif--}}
{{--                <div class="btn-group" role="group" aria-label="Basic example">--}}
{{--                    <a href="{{ url(Request::route()->getPrefix()) }}" class="btn btn-primary">Quản lý</a>--}}
{{--                    <a href="{{route('slider.create')}}" class="btn btn-success">Thêm mới</a>--}}
{{--                </div>--}}
{{--        @yield('content')--}}
{{--            </div>--}}
{{--        </div>--}}
{{--	</div>--}}

{{--    <script src="{!! asset('public\admin/vendor/jquery/jquery.min.js') !!}"></script>--}}
{{--  <script src="{!! asset('public\admin/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>--}}
{{--  <script src="{!! asset('public\admin/vendor/jquery-easing/jquery.easing.min.js') !!}"></script>--}}
{{--  <script src="{!! asset('public\admin/js/sb-admin-2.min.js') !!}"></script>--}}
{{--  <script src="{!! asset('public\admin/vendor/chart.js/Chart.min.js') !!}"></script>--}}
{{--  <script src="{!! asset('public\admin/js/demo/chart-area-demo.js') !!}"></script>--}}
{{--  <script src="{!! asset('public\admin/js/demo/chart-pie-demo.js') !!}"></script>--}}
{{--  <script>CKEDITOR.replace('contents')</script>--}}
{{--  </body>--}}
{{--</html>--}}


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
    <link rel="shortcut icon" href="{!! asset('public\admin/assets/images/favicon.ico') !!}">

    <!-- third party css -->
    <link href="{!! asset('public\admin/assets/libs/datatables/dataTables.bootstrap4.min.css') !!}" rel="stylesheet"
          type="text/css">
    <link href="{!! asset('public\admin/assets/libs/datatables/buttons.bootstrap4.min.css') !!}" rel="stylesheet"
          type="text/css">
    <link href="{!! asset('public\admin/assets/libs/datatables/responsive.bootstrap4.min.css') !!}" rel="stylesheet"
          type="text/css">
    <link href="{!! asset('public\admin/assets/libs/datatables/select.bootstrap4.min.css') !!}" rel="stylesheet"
          type="text/css">

    <!-- App css -->
    <link href="{!! asset('public\admin/assets/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css"
          id="bootstrap-stylesheet">
    <link href="{!! asset('public\admin/assets/css/icons.min.css') !!}" rel="stylesheet" type="text/css">
    <link href="{!! asset('public\admin/assets/css/app.min.css') !!}" rel="stylesheet" type="text/css" id="app-stylesheet">
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
                                <h3 class="m-t-0 header-title mb-4" style="text-align: center;"><b>THÊM PHÍ VẬN CHUYỂN</b></h3>

                                @yield('content')
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
<!-- END wrapper -->


<!-- Right Sidebar -->
<div class="right-bar">
    <div class="rightbar-title">
        <a href="javascript:void(0);" class="right-bar-toggle float-right">
            <i class="mdi mdi-close"></i>
        </a>
        <h4 class="font-17 m-0 text-white">Theme Customizer</h4>
    </div>
    <div class="slimscroll-menu">

        <div class="p-4">
            <div class="alert alert-warning" role="alert">
                <strong>Customize </strong> the overall color scheme, layout, etc.
            </div>
            <div class="mb-2">
                <img src="assets/images/layouts/light.png" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="custom-control custom-switch mb-3">
                <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked="">
                <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
            </div>

            <div class="mb-2">
                <img src="assets/images/layouts/dark.png" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="custom-control custom-switch mb-3">
                <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch"
                       data-bsstyle="assets/css/bootstrap-dark.min.css" data-appstyle="assets/css/app-dark.min.css">
                <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
            </div>

            <div class="mb-2">
                <img src="assets/images/layouts/rtl.png" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="custom-control custom-switch mb-5">
                <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch"
                       data-appstyle="assets/css/app-rtl.min.css">
                <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
            </div>

        </div>
    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

{{--<a href="javascript:void(0);" class="right-bar-toggle demos-show-btn">--}}
{{--    <i class="mdi mdi-settings-outline mdi-spin"></i> &nbsp;Choose Demos--}}
{{--</a>--}}

<!-- Vendor js -->
<script src="{!! asset('public\admin/assets/js/vendor.min.js') !!}"></script>

<!-- Required datatable js -->
<script src="{!! asset('public\admin/assets/libs/datatables/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('public\admin/assets/libs/datatables/dataTables.bootstrap4.min.js') !!}"></script>
<!-- Buttons examples -->
<script src="{!! asset('public\admin/assets/libs/datatables/dataTables.buttons.min.js') !!}"></script>
<script src="{!! asset('public\admin/assets/libs/datatables/buttons.bootstrap4.min.js') !!}"></script>
<script src="{!! asset('public\admin/assets/libs/jszip/jszip.min.js') !!}"></script>
<script src="{!! asset('public\admin/assets/libs/pdfmake/pdfmake.min.js') !!}"></script>
<script src="{!! asset('public\admin/assets/libs/pdfmake/vfs_fonts.js') !!}"></script>
<script src="{!! asset('public\admin/assets/libs/datatables/buttons.html5.min.js') !!}"></script>
<script src="{!! asset('public\admin/assets/libs/datatables/buttons.print.min.js') !!}"></script>

<!-- Responsive examples -->
<script src="{!! asset('public\admin/assets/libs/datatables/dataTables.responsive.min.js') !!}"></script>
<script src="{!! asset('public\admin/assets/libs/datatables/responsive.bootstrap4.min.js') !!}"></script>

<script src="{!! asset('public\admin/assets/libs/datatables/dataTables.keyTable.min.js') !!}"></script>
<script src="{!! asset('public\admin/assets/libs/datatables/dataTables.select.min.js') !!}"></script>

<!-- Datatables init -->
<script src="{!! asset('public\admin/assets/js/pages/datatables.init.js') !!}"></script>

<!-- App js -->
<script src="{!! asset('public\admin/assets/js/app.min.js') !!}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        fetch_delivery();
        function fetch_delivery(){
            var _token=$('input[name="_token"]').val();
            $.ajax({
                url: '{{route('select-delivery')}}',
                method: 'POST',
                data: {_token: _token},
                success: function (data) {
                    $('#load_delivery').html(data);
                }
            });
        }

        $(document).on('blur','.fee_feeship_edit',function (){
            // alert('da blur');
            var feeship_id=$(this).data('feeship_id');
            var fee_value=$(this).text();
            var _token=$('input[name="_token"]').val();
            $.ajax({
                url: '{{route('update-delivery')}}',
                method: 'POST',
                data: {feeship_id: feeship_id,fee_value:fee_value,_token: _token},
                success: function (data) {
                    fetch_delivery();
                    alert('Sửa thành công!');
                }
            });
        });


        $('.add_delivery').click(function () {
            var city = $('.city').val();
            var province = $('.province').val();
            var wards = $('.wards').val();
            var fee_ship = $('.fee_ship').val();
            var _token = $('input[name="_token"]').val();
            // alert(city);
            // alert(province);
            // alert(wards);
            // alert(fee_ship);
            $.ajax({
                url: '{{route('insert')}}',
                method: 'POST',
                data: {city: city, province: province, _token: _token, wards: wards, fee_ship: fee_ship},
                success: function (data) {
                    fetch_delivery();
                    alert('Thêm thành công!');
                    location.reload();
                }
            });
        });


        $('.choose').on('change', function () {
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            // alert(action);
            // alert(matp);
            // alert(_token);
            if (action == 'city') {
                result = 'province';
            } else {
                result = 'wards';
            }
            $.ajax({
                url: '{{route('delivery.store')}}',
                method: 'POST',
                data: {action: action, ma_id: ma_id, _token: _token},
                success: function (data) {
                    $('#' + result).html(data);
                }
            });
        });
    })
</script>
</body>

</html>
