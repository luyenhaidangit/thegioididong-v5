<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-PQ9DLFKWQB"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-PQ9DLFKWQB');
    </script>
    @include('user.theme.head')
</head>
<body class="cnt-home">
@include('user.theme.header')
@yield('content')

@include('user.theme.footer')

<div class="hotline-phone-ring-wrap" style="bottom: 285px">
    <div class="hotline-phone-ring">
        <div class="hotline-phone-ring-circle"></div>
        <div class="hotline-phone-ring-circle-fill"></div>
        <div class="hotline-phone-ring-img-circle">
            <a href="tel:0922002360" class="pps-btn-img">
                <img src="https://nguyenhung.net/wp-content/uploads/2019/05/icon-call-nh.png" alt="Gọi điện thoại" width="50">
            </a>
        </div>
    </div>
    <div class="hotline-bar">
        <a href="tel:0922002360">
        </a>
    </div>
</div>
<div class="hotline-phone-ring-wrap">
    <div class="hotline-phone-ring">
        <div class="hotline-phone-ring-circle"></div>
        <div class="hotline-phone-ring-circle-fill"></div>
        <div class="hotline-phone-ring-img-circle" style="animation: none;">
            <a href="https://zalo.me/0922002360" target="_blank" class="pps-btn-img">
                <img src="https://cdn.haitrieu.com/wp-content/uploads/2022/01/Logo-Zalo-Arc.png" alt="chat zalo" width="50">
            </a>
        </div>
    </div>
    <div class="hotline-bar">
        <a href="tel:0922002360">
        </a>
    </div>
</div>
<div class="hotline-phone-ring-wrap" style="bottom: 115px">
    <div class="hotline-phone-ring">
        <div class="hotline-phone-ring-circle"></div>
        <div class="hotline-phone-ring-circle-fill"></div>
        <div class="hotline-phone-ring-img-circle" style="animation: none;">
            <a href="https://www.facebook.com/LuyenHaiDang.Net" target="_blank" class="pps-btn-img">
                <img src="https://www.mynet.vn/static/thuvienanh/Untitled-3.png" alt="chat zalo" width="50">
            </a>
        </div>
    </div>
    <div class="hotline-bar">
        <a href="tel:0922002360">
        </a>
    </div>
</div>

{{-- <h1>Pusher Test</h1>
<p>
  Try publishing an event to channel <code>my-channel</code>
  with event name <code>my-event</code>.
</p> --}}



@yield('scripts')
<script src="https://chatfast.io/chat.script.js" data-chat-service="ChatFast" data-bot-id="8df95e3a-de2d-4bfa-9deb-fd6581e9d719" data-chat-width="450px" data-chat-height="600px"></script>
<script src="{!! asset('/frontend/assets/js/jquery-1.11.1.min.js') !!}"></script>
<script src="{!! asset('/frontend/assets/js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('/frontend/assets/js/bootstrap-hover-dropdown.min.js') !!}"></script>
<script src="{!! asset('/frontend/assets/js/owl.carousel.min.js') !!}"></script>
<script src="{!! asset('/frontend/assets/js/echo.min.js') !!}"></script>
<script src="{!! asset('/frontend/assets/js/jquery.easing-1.3.min.js') !!}"></script>
<script src="{!! asset('/frontend/assets/js/bootstrap-slider.min.js') !!}"></script>
<script src="{!! asset('/frontend/assets/js/jquery.rateit.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('/frontend/assets/js/lightbox.min.js') !!}"></script>
<script src="{!! asset('/frontend/assets/js/bootstrap-select.min.js') !!}"></script>
<script src="{!! asset('/frontend/assets/js/wow.min.js') !!}"></script>
<script src="{!! asset('/frontend/assets/js/scripts.js') !!}"></script>
<script src="{!! asset('/frontend/assets/js/sweetalert.min.js') !!}"></script>
<script src="{!! asset('/frontend/assets/js/lightgallery-all.min.js') !!}"></script>
<script src="{!! asset('/frontend/assets/js/lightslider.js') !!}"></script>
<script src="{!! asset('/frontend/assets/js/prettify.js') !!}"></script>
@include('user.page.cart_page.scripts_cart')
@include('user.page.wishlist_page.scripts_wishlist')
<!-- JavaScript Alertifyjs-->

{{-- <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('50e973b35a4938f1fdff', {
      cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      alert(JSON.stringify(data));
    });
  </script> --}}

<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-60c621cd3d595993"></script>

@include('user.page.checkout_page.scripts_shipping')
@include('user.page.checkout_page.scripts_checkout')
@include('user.page.checkout_page.scripts_coupon')



<script type="text/javascript">
    //show product gallery
    $(document).ready(function() {
        $('#imageGallery').lightSlider({
            gallery:true,
            item:1,
            loop:true,
            thumbItem:4,
            slideMargin:0,
            enableDrag: false,
            currentPagerPosition:'left',
            onSliderLoad: function(el) {
                el.lightGallery({
                    selector: '#imageGallery .lslide'
                });
            }
        });
    });
</script>


<script>
    // banner slide
    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            autoPlay: 5000, //Set AutoPlay to 3 seconds
            items : 2,
            itemsDesktop : [1199,3],
            itemsDesktopSmall : [979,3]
        });
    });
</script>

<script type="text/javascript">
    function increaseCount(a, b) {
        var input = b.previousElementSibling;
        var value = parseInt(input.value, 10);
        value = isNaN(value)? 0 : value;
        value ++;
        input.value = value;
    }
    function decreaseCount(a, b) {
        var input = b.nextElementSibling;
        var value = parseInt(input.value, 10);
        if (value > 1) {
            value = isNaN(value)? 0 : value;
            value --;
            input.value = value;
        }
    }
</script>


<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    document.getElementById("defaultOpen").click();
</script>
<script>
    // review
    $(".rating-component .star").on("mouseover", function () {
        var onStar = parseInt($(this).data("value"), 10); //
        $(this).parent().children("i.star").each(function (e) {
            if (e < onStar) {
                $(this).addClass("hover");
            } else {
                $(this).removeClass("hover");
            }
        });
    }).on("mouseout", function () {
        $(this).parent().children("i.star").each(function (e) {
            $(this).removeClass("hover");
        });
    });

    $(".rating-component .stars-box .star").on("click", function () {
        var onStar = parseInt($(this).data("value"), 10);
        var stars = $(this).parent().children("i.star");
        var ratingMessage = $(this).data("message");

        var msg = "";
        if (onStar > 1) {
            msg = onStar;
        } else {
            msg = onStar;
        }
        $('.rating-component .starrate .ratevalue').val(msg);



        $(".fa-smile-wink").show();

        $(".button-box .done").show();

        if (onStar === 6) {
            $(".button-box .done").removeAttr("disabled");
        } else {
            $(".button-box .done").attr("disabled", "true");
        }

        for (i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass("selected");
        }

        for (i = 0; i < onStar; i++) {
            $(stars[i]).addClass("selected");
        }

        $(".status-msg .rating_msg").val(ratingMessage);
        $(".status-msg").html(ratingMessage);
        $("[data-tag-set]").hide();
        $("[data-tag-set=" + onStar + "]").show();
    });

    $(".feedback-tags  ").on("click", function () {
        var choosedTagsLength = $(this).parent("div.tags-box").find("input").length;
        choosedTagsLength = choosedTagsLength + 1;

        if ($(this).hasClass("choosed")) {
            $(this).removeClass("choosed");
            choosedTagsLength = choosedTagsLength - 2;
        } else {
            $(this).addClass("choosed");
            $(".button-box .done").removeAttr("disabled");
        }

        console.log(choosedTagsLength);

        if (choosedTagsLength <= 0) {
            $(".button-box .done").attr("enabled", "false");
        }
    });



    $(".compliment-container .fa-smile-wink").on("click", function () {
        $(this).fadeOut("slow", function () {
            $(".list-of-compliment").fadeIn();
        });
    });



    $(".done").on("click", function () {
        $(".rating-component").hide();
        $(".feedback-tags").hide();
        $(".button-box").hide();
        $(".submited-box").show();
        $(".submited-box .loader").show();

        setTimeout(function () {
            $(".submited-box .loader").hide();
            $(".submited-box .success-message").show();
        }, 1500);
    });
</script>

<script>
    // Get the modal
    // var modal = document.getElementById('id01');
    //
    // // When the user clicks anywhere outside of the modal, close it
    // window.onclick = function(event) {
    //     if (event.target == modal) {
    //         modal.style.display = "none";
    //     }
    // }
</script>
<script>
    $(document).ready(function() {
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    });
</script>

<script>
    // copy
    function myFunction(id) {
        /* Get the text field */
        console.log(id);
        var copyText = document.getElementById('myInput'+ id);
        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText.value);

        /* Alert the copied text */
        alert("Đã sao chép mã: " + copyText.value);
    }
</script>


<SCRIPT>
    const sliderValue = document.querySelector("span");
    const inputSlider = document.querySelector("input");
    inputSlider.oninput = (() =>{
        let value = inputSlider.value;
        sliderValue.textContent = value;
        sliderValue.style.left = (value/2) + "%";
        sliderValue.classList.add("show");
    })
    inputSlider.onblur = (()=>{
        sliderValue.classList.remove("show");
    });
</SCRIPT>
<script type='text/javascript'>
    function changecolor(id) {
        console.log(id);
        $.ajax({
            url: 'danh-sach-yeu-thich/them/' + id, //Changed--------------------------------------------------------------
            type: 'GET',
        }).done(function (response) {
            var icon = document.getElementById("example"+id);
            icon.style.color='rgb('+255+','+ 66+','+ 79+')';
            $("#update-wishlist").load(location.href + " #update-wishlist>*", "");

        });
    }
</script>

<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var contents = this.nextElementSibling;
            if (contents.style.display === "block") {
                contents.style.display = "none";
            } else {
                contents.style.display = "block";
            }
        });
    }
</script>

<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<a id="button"></a>
<script type="text/javascript">
    var btn = $('#button');

    $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop:0}, '300');
    });
</script>

<SCRIPT>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
</SCRIPT>


</body>

</html>
