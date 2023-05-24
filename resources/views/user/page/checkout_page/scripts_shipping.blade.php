<script type="text/javascript">
    //Tính phí vận chuyển
    $(document).ready(function () {
        $('.choose').on('change', function () {//khi class choose thay đổi
            var action = $(this).attr('id'); // this là lấy cái thuộc tính của id="city"
            var ma_id = $(this).val();// this lấy giá trị value của option
            var _token = $('input[name="_token"]').val();// gửi bằng form thì phải có token
            var result = '';

            if (action == 'city') {
                result = 'province';
            } else {
                result = 'wards';
            }
            $.ajax({
                url: '{{route('checkout.dia-chi')}}',
                method: 'POST',
                data: {action: action, ma_id: ma_id, _token: _token},
                success: function (data) {
                    $('#' + result).html(data);
                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.calculate_delivery').click(function () {//khi click vào nút
            var matp = $('.city').val();
            var maqh = $('.province').val();
            var xaid = $('.wards').val();
            var name = $('.fullname').val();
            var email = $('.email').val();
            var phone = $('.phone').val();
            var address = $('.address').val();
            var note = $('.note').val();
            var _token = $('input[name="_token"]').val();
            if (matp == '' || maqh == '' || xaid == '' || name == '' || email == '' || phone == '' || address == '' ) {
                swal("Làm ơn nhập đầy đủ thông tin vận chuyển!");
            } else {
                $.ajax({
                    url: '{{route('checkout.tinh-phi')}}',
                    method: 'POST',
                    data: {matp: matp, maqh: maqh, xaid: xaid,
                        name:name,email:email,phone:phone,address:address,note:note,_token: _token},
                    success: function (data) {
                        // alertify.success('Tính phí Thành Công!');
                        swal({
                            title: "",
                            text: "Cập nhật thông tin thành công!",
                            icon: "success",
                        });
                        location.reload();
                    }
                });
            }
            // window.setTimeout(function (){
            //     location.reload();
            // } ,2000);
        });
    });
</script>
