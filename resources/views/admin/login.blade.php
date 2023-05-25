{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}
{{--    <meta name="description" content="">--}}
{{--    <meta name="author" content="">--}}
{{--    <title>SB Admin 2 - Login</title>--}}
{{--    <link href="{!! asset('admin/vendor/fontawesome-free/css/all.min.css') !!}" rel="stylesheet" type="text/css">--}}
{{--    <link--}}
{{--        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"--}}
{{--        rel="stylesheet">--}}
{{--    <link href="{!! asset('admin/css/sb-admin-2.min.css') !!}" rel="stylesheet">--}}
{{--</head>--}}
{{--<body class="bg-gradient-primary">--}}
{{--<div class="login-form">--}}
{{--@if (count($errors) >0)--}}
{{--         <ul>--}}
{{--             @foreach($errors->all() as $error)--}}
{{--                 <li class="text-danger"> {{ $error }}</li>--}}
{{--             @endforeach--}}
{{--         </ul>--}}
{{--     @endif--}}

{{--     @if (session('status'))--}}
{{--         <ul>--}}
{{--             <li class="text-danger"> {{ session('status') }}</li>--}}
{{--         </ul>--}}
{{--     @endif--}}

{{--    <form action="{{ route('getLogin') }}" method="post">--}}
{{--    {{ csrf_field() }}--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-xl-10 col-lg-12 col-md-9">--}}
{{--                <div class="card o-hidden border-0 shadow-lg my-5">--}}
{{--                    <div class="card-body p-0">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>--}}
{{--                            <div class="col-lg-6">--}}
{{--                                <div class="p-5">--}}
{{--                                    <div class="text-center">--}}
{{--                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>--}}
{{--                                    </div>--}}
{{--                                    <form class="user">--}}
{{--                                        <div class="form-group">--}}
{{--                                        <input type="text" name="txtEmail" value="admin@gmail.com" class="form-control" placeholder="Username" required="required">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                        <input type="password" name="txtPassword" value="12345" class="form-control" placeholder="Password" required="required">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <div class="custom-control custom-checkbox small">--}}
{{--                                                <input type="checkbox" class="custom-control-input" id="customCheck">--}}
{{--                                                <label class="custom-control-label" for="customCheck">Remember--}}
{{--                                                    Me</label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>--}}
{{--                                        <hr>--}}
{{--                                        <a href="#" class="btn btn-google btn-user btn-block">--}}
{{--                                            <i class="fab fa-google fa-fw"></i> Login with Google--}}
{{--                                        </a>--}}
{{--                                        <a href="#" class="btn btn-facebook btn-user btn-block">--}}
{{--                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook--}}
{{--                                        </a>--}}
{{--                                    </form>--}}
{{--                                    <hr>--}}
{{--                                    <div class="text-center">--}}
{{--                                        <a class="small" href="#">Forgot Password?</a>--}}
{{--                                    </div>--}}
{{--                                    <div class="text-center">--}}
{{--                                        <a class="small" href="#">Create an Account!</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}

{{--        </div>--}}

{{--    </div>--}}
{{--    </div>--}}
{{--    <script src="{!! asset('admin/vendor/jquery/jquery.min.js') !!}"></script>--}}
{{--    <script src="{!! asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>--}}
{{--    <script src="{!! asset('admin/vendor/jquery-easing/jquery.easing.min.js') !!}"></script>--}}
{{--    <script src="{!! asset('admin/js/sb-admin-2.min.js') !!}"></script>--}}
{{--</body>--}}
{{--</html>--}}


        <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login page | Velonic - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{!! asset('admin/assets/images/favicon.ico') !!}">

    <!-- App css -->
    <link href="{!! asset('admin/assets/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
    <link href="{!! asset('admin/assets/css/icons.min.css')!!}" rel="stylesheet" type="text/css">
    <link href="{!! asset('admin/assets/css/app.min.css') !!}" rel="stylesheet" type="text/css" id="app-stylesheet">
{{--    <style>--}}
{{--        body.authentication-page {--}}
{{--            background-image: url({!! asset('admin/assets/images/background_admin.jpg') !!});--}}
{{--            background-repeat: no-repeat;--}}
{{--            background-attachment: fixed;--}}
{{--            background-size: 100% 100%;--}}
{{--        }--}}
{{--    </style>--}}
</head>

<body class="authentication-page">
<div class="account-pages my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card mt-4">
                    <div class="card-header p-4 bg-primary">
                        <h4 class="text-white text-center mb-0 mt-0">Thegioididong</h4>
                    </div>
                    <div class="card-body">
                        @if (count($errors) >0)
                                 <ul>
                                     @foreach($errors->all() as $error)
                                         <li class="text-danger"> {{ $error }}</li>
                                     @endforeach
                                 </ul>
                             @endif

                             @if (session('status'))
                                 <ul>
                                     <li class="text-danger"> {{ session('status') }}</li>
                                 </ul>
                             @endif
                        <form action="{{ route('getLogin') }}" method="post" class="p-2">
                            {{ csrf_field() }}
                            <div class="form-group mb-3">
                                <label for="emailaddress">Email:</label>
                                <input class="form-control" type="email" name="email" placeholder="jonh@gmail.com" >
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Mật khẩu :</label>
                                <input class="form-control" type="password" name="password" placeholder="Enter your password" >
                            </div>

{{--                            <div class="form-group mb-4">--}}
{{--                                <div class="checkbox checkbox-success">--}}
{{--                                    <input id="remember" type="checkbox" checked="">--}}
{{--                                    <label for="remember">--}}
{{--                                        Remember me--}}
{{--                                    </label>--}}
{{--                                    <a href="pages-recoverpw.html" class="text-muted float-right">Forgot your password?</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="form-group row text-center mt-4 mb-4">
                                <div class="col-12">
                                    <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Đăng Nhập</button>
                                </div>
                            </div>

{{--                            <div class="form-group row mb-0">--}}
{{--                                <div class="col-sm-12 text-center">--}}
{{--                                    <p class="text-muted mb-0">Don't have an account? <a href="pages-register.html" class="text-dark m-l-5"><b>Sign Up</b></a></p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </form>

                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->

                <!-- end row -->

            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
        <iframe src="https://chatfast.io/chat/8df95e3a-de2d-4bfa-9deb-fd6581e9d719" width="450px" height="600px"></iframe>
    </div>
</div>

<!-- Vendor js -->
<script src="{!! asset('admin/assets/js/vendor.min.js') !!}"></script>

<!-- App js -->
<script src="{!! asset('admin/assets/js/app.min.js') !!}"></script>



</body>

</html>
