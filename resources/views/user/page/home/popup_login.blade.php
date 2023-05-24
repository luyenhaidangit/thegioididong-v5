
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header-login border-bottom-0">
                <button type="button" class="close-login" data-dismiss="modal" aria-label="Close">
{{--                    <span aria-hidden="true">&times;</span>--}}
                    <i aria-hidden="true" class="icon fa fa-times" style="font-size: 18px;"></i>
                </button>
            </div>
            <div class="modal-body-login">
                <div class="form-title text-center">
                    <h4>ĐĂNG NHẬP</h4>
                </div>
                <div class="d-flex flex-column text-center">
                    <form action="{{ route('customer.postLogin') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="email" name="email" class="form-control-login" id="email1"placeholder="Địa chỉ email của bạn...">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control-login" id="password1" placeholder="Mật khẩu...">
                        </div>
                        <button type="submit" class="btn btn-info btn-block btn-round">Đăng nhập</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <div class="signup-section">Chưa là thành viên? <a href="{{route('shopping.login')}}" class="text-info"> Đăng ký ngay</a>.</div>
            </div>
        </div>
    </div>
</div>
