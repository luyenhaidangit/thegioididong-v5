
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
                            <h4 class="page-title">Data Table</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb p-0 m-0">
                                    <li class="breadcrumb-item"><a href="#">Velonic</a></li>
                                    <li class="breadcrumb-item"><a href="#">Tables</a></li>
                                    <li class="breadcrumb-item active">Data Table</li>
                                </ol>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive">
                                <h4 class="m-t-0 header-title mb-4"><b>Thêm thư viện ảnh</b></h4>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ url(Request::route()->getPrefix()) }}" class="btn btn-primary">Quản lý</a>

                                    </div>
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
<script type="text/javascript">
    $(document).ready(function (){
        load_gallery();
        function load_gallery(){
            var pro_id=$('.pro_id').val();
            var _token=$('input[name="_token"]').val();
            // alert(pro_id)
            $.ajax({
                url:"{{route('select-gallery')}}",
                method:"POST",
                data:{pro_id:pro_id, _token:_token},
                success:function (data){
                    $('#gallery_load').html(data);
                }
            });
        }

        $('#file').change(function (){ //change là thay đổi (nghĩz là khi id="file" thay đổi)
            var error='';
            var files=$('#file')[0].files;//bắt ảnh đầu tiên
            if(files.length>15){
                error+='<p>Bạn chọn tối đa chỉ được 15 ảnh</p>';
            }else if(files.length==''){
                error+='<p>Bạn không được bỏ trống trường này</p>';
            }else if(files.size>2000000){
                error+='<p>File ảnh không được lớn hơn 2MB</p>';
            }

            if(error==''){

            }else {
                $('#file').val('');
                $('#error_gallery').html('<span class="text-danger">'+error+'</span>');
                return false;
            }
        });

        $(document).on('blur','.edit_gallery_name',function (){
           var gal_id=$(this).data('gal_id');
           var gal_text=$(this).text();
            var _token=$('input[name="_token"]').val();
            $.ajax({
                url:"{{route('update-gallery')}}",
                method:"POST",
                data:{gal_id:gal_id, gal_text:gal_text, _token:_token},
                success:function (data){
                    load_gallery();
                    $('#error_gallery').html('<span>Cập nhật tên hình ảnh thành công</span>');
                }
            });
        });

        $(document).on('click','.delete-gallery',function (){
            var gal_id=$(this).data('gal_id');

            var _token=$('input[name="_token"]').val();

            if(confirm('Bạn có chắc muốn xóa hình ảnh này không!')){
                $.ajax({
                    url:"{{route('delete-gallery')}}",
                    method:"POST",
                    data:{gal_id:gal_id, _token:_token},
                    success:function (data){
                        load_gallery();
                        $('#error_gallery').html('<span>Xóa hình ảnh thành công</span>');
                    }
                });
            }
        });
    });
</script>
</body>

</html>
