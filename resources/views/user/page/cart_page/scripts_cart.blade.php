<script>
    //Thêm giỏ hàng
    function AddCart(id) {
        console.log(id);
        $.ajax({
            url: 'addCart/' + id, //Changed--------------------------------------------------------------
            type: 'GET',
        }).done(function (response) {
            ShowCart(response);
            $("#change-item-cart").load(location.href + " #change-item-cart>*", "");
            alertify.success('Thêm thành công!');
        });
    }

    //  //Xóa giỏ hàng khỏi session
    // $("#change-item-cart").on("click","li .cart-item .row .col-xs-2 .click-del", function(){
    //   console.log('2')
    //   console.log($(this).data("id"));
    //   $.ajax({
    //     url:'deleteItemCart/'+$(this).data("id"),
    //     type: 'GET',
    //   }).done(function(response){
    //       ShowCart(response);
    //       $("#change-item-cart").load(location.href+" #change-item-cart>*","");
    //       alertify.error('Deleted!');
    //   });
    // });
    function DeleteItemCart(id) {
        $.ajax({
            url: 'deleteItemCart/' + id,
            type: 'GET',
        }).done(function (response) {
            alertify.error('Xóa Thành Công!');
            $("#change-item-cart").load(location.href + " #change-item-cart>*", "");
            location.reload();

        });
    }

    function ShowCart(response) {
        $("#change-item-cart").empty();
        $("#change-item-cart").html(response);
        $("#total-quanty-show").text($("#total-quanty-card").val());
    }

    //Xóa giỏ hàng trong session trang giỏ hàng
    function DeleteListItemCart(id) {
        $.ajax({
            url: 'delete-ListItemCart/' + id,
            type: 'GET',
        }).done(function (response) {
            alertify.error('Xóa Thành Công!');
            // $("#change-item-cart").load(location.href + " #change-item-cart>*", "");
            // $("#list-cart").empty();
            // $("#list-cart").html(response);
            // $("#total-quanty-show").text($("#total-quanty-card").val());

            location.reload();
        });
    }

    //Cập nhật lại giỏ hàng
    function SaveListItemCart(id) {
        $.ajax({
            url: 'save-ListItemCart/' + id + "/" + $("#quanty-item-" + id).val(),
            type: 'GET',
        }).done(function (response) {
            alertify.success('Cập Nhật Thành Công!');
            location.reload();
        });
    }
    function SaveListItemCart1(id) {
        $.ajax({
            url: 'save-ListItemCart1/' + id + "/" + $("#quanty-item-" + id).val(),
            type: 'GET',
        }).done(function (response) {
            alertify.success('Cập Nhật Thành Công!');
            location.reload();
            // $("#change-item-cart").load(location.href + " #change-item-cart>*", "");
            // $("#counter").load(location.href + " #counter>*", "");
            // $("#cart-grand-total").load(location.href + " #cart-grand-total>*", "");
        });
    }


    //Save toàn bộ giỏ hàng
    $(".edit-all").on("click", function () {
        //alert("Do you want Update all Cart?");
        var list = [];
        $("table tr td").each(function () {
            $(this).find("input").each(function () {
                var element = {key: $(this).data("id"), value: $(this).val()};
                list.push(element);
            });
        });
        $.ajax({
            url: 'Save-All-Cart',
            type: 'POST',
            data: {
                "_token": "{{csrf_token()}}",
                "data": list
            }
        }).done(function (response) {
            location.reload();
        });
    });


    /*---------------------------------------*/

    $('#menu > li').hover(function () {
        // khi thẻ menu li bị hover thì drop down menu thuộc thẻ li đó sẽ trượt xuống(hiện)
        $('.dropdown_menu', this).slideDown();
    }, function () {
        // khi thẻ menu li bị out không hover nữa thì drop down menu thuộc thẻ li đó sẽ trượt lên(ẩn)
        $('.dropdown_menu', this).slideUp();
    });

    $('.dropdown_menu > li').hover(function () {
        // khi thẻ dropdown_menu li bị hover thì submenusubmenu thuộc thẻ li đó sẽ trượt xuống(hiện)
        $('.submenu', this).slideDown();
    }, function () {
        // khi thẻ dropdown_menu li bị hover thì submenusubmenu thuộc thẻ li đó sẽ trượt lên(ẩnẩn)
        $('.submenu', this).slideUp();
    });






</script>
