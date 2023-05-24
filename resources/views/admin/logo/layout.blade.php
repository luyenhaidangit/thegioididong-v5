<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Quản lý hình ảnh - Logo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
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
    <link href="{!! asset('admin/assets\libs\cropper\cropper.min.css') !!}" rel="stylesheet" type="text/css">

    <script src="//cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>

    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 17px;
            width: 17px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>

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
                                <h4 class="m-t-0 header-title mb-4"><b>chi tiết logo</b></h4>
                                <hr>
                                <p>upload hình ảnh:</p>

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
                <img src="{!! asset('admin/assets/images/layouts/light.png') !!}" class="img-fluid img-thumbnail"
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
                       data-bsstyle="{!!asset('public/admin/assets/css/bootstrap-dark.min.css') !!}"
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
<script src="{!! asset('admin/assets\libs\cropper\cropper.min.js') !!}"></script>
<script src="{!! asset('admin/assets\js\pages\form-imagecrop.init.js') !!}"></script>


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

<script>
    $(document).ready(function () {
        $('.checkBox').on('change', function () {
            var checkBox = document.getElementById("myCheck");
            var id = document.querySelector('#myCheck').value;
            var _token = $('input[name="_token"]').val();
            if (checkBox.checked === true) {
                var result = 1;
            } else {
                var result = 0;
            }
            alert(id);
            alert(result);
            $.ajax({
                url: '{{route('logo.trang-thai')}}',
                method: 'POST',
                data: {result: result, id: id, _token: _token},
                success: function (data) {

                }
            });
        });
    });
</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

</body>

</html>