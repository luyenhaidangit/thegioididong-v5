<script type="text/javascript">
    $(document).ready(function () {
        $('.check_checkout').click(function () {//khi click vào nút
            var fee=$('.fee').val();
            if(document.getElementById('payment').checked && fee!='') {
                swal({
                    title: "Bạn có chắc muốn đặt hàng không?",
                    text: "",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url: '{{route('shopping.checkout')}}',
                                method: 'POST',
                                headers: {'X-CSRF-TOKEN': $('input[name="_token"]').attr('content')},
                                data: {_token: _token},
                                success: function (data) {
                                    window.location.href = "{{route('shopping.check')}}";
                                }
                            });
                        } else {
                        }
                    });

            }else{
                if(fee==''){
                    swal("Làm ơn nhập thông tin vận chuyển!");
                }else{
                    swal("Làm ơn đồng ý với điều khoản thanh toán của chúng tôi!");
                }
                // window.setTimeout(function (){
                //     location.reload();
                // } ,2000);
            }
            // window.setTimeout(function (){
            //     location.reload();
            // } ,2000);
        });
    });
</script>
