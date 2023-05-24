
{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}
{{--    <meta name="description" content="">--}}
{{--    <meta name="author" content="">--}}
{{--    <title>SB Admin 2 - Dashboard</title>--}}
{{--    <link href="{!! asset('admin/vendor/fontawesome-free/css/all.min.css') !!}" rel="stylesheet" type="text/css">--}}
{{--    <link--}}
{{--        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"--}}
{{--        rel="stylesheet">--}}
{{--    <link href="{!! asset('admin/css/sb-admin-2.min.css') !!}" rel="stylesheet">--}}
{{--</head>--}}
{{--<body id="page-top">--}}
{{--    <div id="wrapper">--}}
{{--        @include('admin.theme.sidebar')	--}}
{{--        <div id="content-wrapper" class="d-flex flex-column">--}}
{{--            <div id="content">--}}
{{--                @include('admin.theme.nav')--}}
{{--                @if(Session::has('message'))--}}
{{--                <div class="alert alert-success">--}}
{{--                  {{ Session::get('message') }}--}}
{{--                </div>--}}
{{--                @endif	   --}}
{{--                <div class="btn-group" role="group" aria-label="Basic example">--}}
{{--                    <a href="{{ url(Request::route()->getPrefix()) }}" class="btn btn-primary">Quản lý</a>--}}
{{--                    <a href="{{route('user.getadd')}}" class="btn btn-success">Thêm mới</a>--}}
{{--                </div>--}}
{{--            @yield('content')--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--  <script src="{!! asset('admin/vendor/jquery/jquery.min.js') !!}"></script>--}}
{{--  <script src="{!! asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>--}}
{{--  <script src="{!! asset('admin/vendor/jquery-easing/jquery.easing.min.js') !!}"></script>--}}
{{--  <script src="{!! asset('admin/js/sb-admin-2.min.js') !!}"></script>--}}
{{--  <script src="{!! asset('admin/vendor/chart.js/Chart.min.js') !!}"></script>--}}
{{--  <script src="{!! asset('admin/js/demo/chart-area-demo.js') !!}"></script>--}}
{{--  <script src="{!! asset('admin/js/demo/chart-pie-demo.js') !!}"></script>--}}
{{--</body>--}}
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
                            <h4 class="page-title">Tài khoản quản trị</h4>
{{--                            <div class="page-title-right">--}}
{{--                                <ol class="breadcrumb p-0 m-0">--}}
{{--                                    <li class="breadcrumb-item"><a href="#">Velonic</a></li>--}}
{{--                                    <li class="breadcrumb-item"><a href="#">Tables</a></li>--}}
{{--                                    <li class="breadcrumb-item active">Data Table</li>--}}
{{--                                </ol>--}}
{{--                            </div>--}}
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive">
                                <h2 class="m-t-0 header-title mb-4"><b>Tài Khoản Quản Trị </b></h2>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ url(Request::route()->getPrefix()) }}" class="btn btn-primary">Quản lý</a>
                                    <a href="{{route('user.getadd')}}" class="btn btn-success">Thêm mới</a>
                                </div>
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
                <img src="{!! asset('admin/assets/images/layouts/light.png') !!}" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="custom-control custom-switch mb-3">
                <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked="">
                <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
            </div>

            <div class="mb-2">
                <img src="{!! asset('admin/assets/images/layouts/dark.png') !!}" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="custom-control custom-switch mb-3">
                <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsstyle="{!!asset(' admin/assets/css/bootstrap-dark.min.css') !!}" data-appstyle="{!! asset('admin/assets/css/app-dark.min.css') !!}">
                <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
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

<!-- App js -->
<script src="{!! asset('admin/assets/js/app.min.js') !!}"></script>
<script>CKEDITOR.replace('contents')</script>
</body>

</html>
