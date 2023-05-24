@extends('user.theme.layout')
@section('content')
    <style>
        .forgot {
            background-color: #fff;
            padding: 0px 10px;
            border: 1px solid #dfdfdf
        }
        .form-forgot {
            background-color: #fff;
            padding: 10px 10px;
            border: 1px solid #dfdfdf;
            margin-top: 20px;
        }
        .forgot-password {
            padding: 0px 230px;
        }
        .forgot-form {
            padding: 20px 20px;
        }
        @media (max-width: 768px) {
            .forgot-password {
                padding: 0px;
            }
            .forgot-form {
                padding: 0px;
            }
        }

    </style>
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{route('shopping.home')}}">Trang chủ</a></li>
                    <li class="active">Đổi mật khẩu</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row forgot-password">
                    <div class="col-md-12 create-new-account">
                        @if(Session::has('error'))
                            <div class="alert alert-danger">
                                {{Session::get('error')}}<br>
                            </div
                        @endif
                        <div class="forgot-form">
                            <div class="forgot">
                                <h3>Đổi Mật Khẩu?</h3>
                                <p style="text-align: left">Thay đổi mật khẩu của bạn trong ba bước đơn giản. Điều này sẽ giúp bạn bảo mật mật khẩu của mình!</p>
                                <ol class="list-unstyled">
                                    <li><span class="text-primary text-medium">1. </span>Nhập mật khẩu cũ của bạn vào ô bên dưới.</li>
                                    <li><span class="text-primary text-medium">2. </span>Nhập mật khẩu mới -> nhập lại mật khẩu.</li>
                                    <li><span class="text-primary text-medium">3. </span>Nhấn nút đổi mật khẩu.</li>
                                </ol>
                            </div>
                            @if(isset($check))
                            <form class="form-forgot" action="{{route('customer.check_change_pass')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type="email" style="display: none;margin: 5px 0px;border-radius: 0px;-webkit-box-shadow: none;box-shadow: none;" class="form-control" id="email-for-pass" name="email" required="" value="{{$customer->email}}">
                                        <input type="password" style="display: none;margin: 5px 0px;border-radius: 0px;-webkit-box-shadow: none;box-shadow: none;" class="form-control" id="email-for-pass" name="old_password" required="" value="{{$customer->password}}">
                                        <label for="email-for-pass">Nhập mật khẩu mới</label>
                                        <input type="password" style="margin: 5px 0px;border-radius: 0px;-webkit-box-shadow: none;box-shadow: none;" class="form-control" id="email-for-pass" name="password" required="">
                                        <label for="email-for-pass">Nhập lại mật khẩu</label>
                                        <input type="password" style="margin: 5px 0px;border-radius: 0px;-webkit-box-shadow: none;box-shadow: none;" class="form-control" id="email-for-pass" name="comfirm_password" required="">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-success" type="submit">Đổi mật khẩu</button>
                                </div>
                            </form>
                            @else
                                <form class="form-forgot" action="{{route('customer.check_change_pass1')}}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input type="email" style="display: none;margin: 5px 0px;border-radius: 0px;-webkit-box-shadow: none;box-shadow: none;" class="form-control" id="email-for-pass" name="email" value="{{Auth::guard('account_customer')->user()->email}}" required="" autocomplete="off">
                                            <label for="email-for-pass">Nhập mật khẩu cũ</label>
                                            <input type="password" style="margin: 5px 0px;border-radius: 0px;-webkit-box-shadow: none;box-shadow: none;" class="form-control" id="email-for-pass" name="old_password" required="" autocomplete="off">
                                            <label for="email-for-pass">Nhập mật khẩu mới</label>
                                            <input type="password" style="margin: 5px 0px;border-radius: 0px;-webkit-box-shadow: none;box-shadow: none;" class="form-control" id="email-for-pass" name="password" required="" autocomplete="off">
                                            <label for="email-for-pass">Nhập lại mật khẩu</label>
                                            <input type="password" style="margin: 5px 0px;border-radius: 0px;-webkit-box-shadow: none;box-shadow: none;" class="form-control" id="email-for-pass" name="comfirm_password" required="" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-success" type="submit">Đổi mật khẩu</button>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                    <!-- create a new account -->
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
       </div><!-- /.container -->
    </div>
@stop
