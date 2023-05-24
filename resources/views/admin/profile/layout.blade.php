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
    <link href="{!! asset('public\admin/assets/css/app.min.css') !!}" rel="stylesheet" type="text/css"
          id="app-stylesheet">
    <link rel="shortcut icon" href="{!! asset('admin/assets/images/favicon.ico') !!}">


    <!-- third party css -->
    <link href="{!! asset('admin/assets/libs/datatables/dataTables.bootstrap4.min.css') !!}" rel="stylesheet"
          type="text/css">
    <link href="{!! asset('admin/assets/libs/datatables/buttons.bootstrap4.min.css') !!}" rel="stylesheet"
          type="text/css">
    <link href="{!! asset('admin/assets/libs/datatables/responsive.bootstrap4.min.css') !!}" rel="stylesheet"
          type="text/css">
    <link href="{!! asset('admin/assets/libs/datatables/select.bootstrap4.min.css') !!}" rel="stylesheet"
          type="text/css">

    <!-- App css -->
    <link href="{!! asset('admin/assets/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css"
          id="bootstrap-stylesheet">
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
            @yield('content')
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
                <img src="{!! asset('public\admin/assets/images/layouts/light.png') !!}" class="img-fluid img-thumbnail"
                     alt="">
                <img src="assets/images/layouts/light.png" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="custom-control custom-switch mb-3">
                <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked="">
                <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
            </div>

            <div class="mb-2">
                <img src="{!! asset('public\admin/assets/images/layouts/dark.png') !!}" class="img-fluid img-thumbnail"
                     alt="">
            </div>
            <div class="custom-control custom-switch mb-3">
                <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch"
                       data-bsstyle="{!!asset(' admin/assets/css/bootstrap-dark.min.css') !!}"
                       data-appstyle="{!! asset('public\admin/assets/css/app-dark.min.css') !!}">
                <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
            </div>

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
<script>CKEDITOR.replace('data')</script>
</body>

</html>
