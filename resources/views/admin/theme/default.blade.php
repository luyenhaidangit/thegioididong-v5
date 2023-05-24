<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.theme.head')
</head>

<body>
<!-- Begin page -->
<div id="wrapper">
    @include('admin.theme.nav')
    @include('admin.theme.sidebar')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <!-- Footer Start -->
        @include('admin.theme.footer')
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
                <img src="{!! asset('assets/images/layouts/light.png') !!}" class="img-fluid img-thumbnail"
                     alt="">
            </div>
            <div class="custom-control custom-switch mb-3">
                <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked="">
                <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
            </div>

            <div class="mb-2">
                <img src="{!! asset('admin/assets/images/layouts/dark.png') !!}" class="img-fluid img-thumbnail"
                     alt="">
            </div>
            <div class="custom-control custom-switch mb-3">
                <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch"
                       data-bsstyle="{!!asset(' admin/assets/css/bootstrap-dark.min.css') !!}"
                       data-appstyle="{!! asset('admin/assets/css/app-dark.min.css') !!}">
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

<script src="{!! asset('admin/assets\libs\moment\moment.min.js') !!}"></script>
<script src="{!! asset('admin/assets\libs\jquery-scrollto\jquery.scrollTo.min.js') !!}"></script>
<script src="{!! asset('admin/assets\libs\sweetalert2\sweetalert2.min.js') !!}"></script>

<!-- Chat app -->
<script src="{!! asset('admin/assets\js\pages\jquery.chat.js') !!}"></script>

<!-- Todo app -->
<script src="{!! asset('admin/assets\js\pages\jquery.todo.js') !!}"></script>
<!--Morris Chart-->
<script src="{!! asset('admin/assets\libs\morris-js\morris.min.js') !!}"></script>
<script src="{!! asset('admin/assets\libs\raphael\raphael.min.js') !!}"></script>

<!-- Sparkline charts -->
<script src="{!! asset('admin/assets\libs\jquery-sparkline\jquery.sparkline.min.js') !!}"></script>
<!-- Dashboard init JS -->
<script src="{!! asset('admin/assets\js\pages\dashboard.init.js') !!}"></script>
<!-- App js -->
<script src="{!! asset('admin/assets/js/app.min.js') !!}"></script>

</body>

</html>
