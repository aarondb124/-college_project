<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Bangladesh's Largest Camera Retail Store">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="keyword" content="HTML, CSS, Javascript, PHP, Laravel, MySQL, Project, best ecommerce website builder, best ecommerce websites, best ecommerce website builder for small business, world best ecommerce website, best ecommerce website builder free, best ecommerce website design, best ecommerce website templates, best ecommerce website creator, best ecommerce website designs, best ecommerce website design templates, best ecommerce website examples, best ecommerce website ever, best ecommerce website design examples, best ecommerce education sites, best ecommerce website for beginners, best ecommerce website free">
    <meta property="og:image" content="{{ asset($content->logo) }}">
    <title>{{ $content->company_name }}</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('website') }}/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('website') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('website') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('website') }}/css/responsive.css">
    <link rel="stylesheet" href="{{ asset('website') }}/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('website') }}/css/toastr.min.css">


    @stack('website-css')
    <script src="{{ asset('website') }}/js/jquery.min.js"></script>
</head>

<body>

    @include('partials.website_header')
    {!! Toastr::message() !!}
    @yield('website-content')


{{-- 
    <div id="cart" class="d-none">
        <div class="cart-fixed">
            <div class="card custom-card">
                <div class="card-body pe-4 pb-2 text-center">
                    <a type="button" class="btn btn-secondary btn-sm position-relative">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-brand"
                            id="fixed-cart-number">
                            0
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div id="quote-cart" class="d-none">
        <div class="quote-fixed">
            <div class="card custom-card">
                <div class="card-body pe-4 pb-2 text-center">
                    <a type="button" class="btn btn-secondary btn-sm position-relative">
                        <i class="fas fa-file-invoice"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-brand"
                            id="fixed-qoute-count">
                            0
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div> --}}

    @include('partials.website_footer')

    <script src="{{ asset('website/js/type.js') }}"></script>
    {{-- <script src="{{asset('website/js/select2.min.js')}}"></script> --}}
    <script src="{{ asset('website/js/toastr.min.js') }}"></script>
    {{-- <script src="{{asset('website')}}/js/jquery-2.1.3.min.js"></script> --}}
    <script src="{{ asset('website') }}/js/slick.js"></script>
    <script src="{{ asset('website') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('website') }}/js/all.min.js"></script>

    @stack('website-js')
    <script src="{{ asset('website') }}/js/custom.js"></script>
    <script src="{{ asset('website/js/bootstrap3-typeahead.min.js') }}"></script>

    {{-- main search --}}
    <script type="text/javascript">
        var baseUri = "{{ url('/') }}";
        $('.keyword').typeahead({
            minLength: 1,
            source: function(keyword, process) {
                return $.get(`${baseUri}/get_suggestions/${keyword}`, function(data) {
                    return process(data);
                });
            },

            updater: function(item) {
                $(location).attr('href', '/search?q=' + item);
                return item;
            }

        });
    </script>

    {{-- build your own search --}}
    <script type="text/javascript">
        var baseUri = "{{ url('/') }}";
        let catId = $('#slug').val();
        // console.log(catId);
        $('.keyword_build').typeahead({
            minLength: 1,
            source: function(keyword, process) {
                return $.get(`${baseUri}/get_suggestions_build/${keyword}/${catId}`, function(data) {
                    return process(data);
                });
            },

            updater: function(item) {
                $(location).attr('href', `/search-build?q=${item}&slug=` + catId);
                return item;
            }

        });
    </script>

    <script>
        $(window).scroll(function() {
            if ($(this).scrollTop() > 38) {
                $('#quote-cart').removeClass('d-none');
                $('#cart').removeClass('d-none');
            } else {
                $('#quote-cart').addClass('d-none');
                $('#cart').addClass('d-none');
            }
        });
    </script>

    <script>
        @if (Session::has('cart'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('cart') }}");
        @endif

        @if (Session::has('update'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('update') }}");
        @endif

        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif
        @if (Session::has('success'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('success') }}");
        @endif

        @if (Session::has('remove'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('remove') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif
    </script>

    <script>
        function cartAllData() {
            var cartTotal = $('#cartTotal').val();
            $.ajax({
                url: "{{ route('cart.alldata') }}",
                type: "get",
                dataType: "json",
                success: function(res) {
                    var data = "";
                    $.each(res, function(key, value) {
                        var url = '/product-details/' + value.attributes.slug;
                        data = data + '<div class="single-cart-item my-1 d-flex">'
                        data = data + '<div> <a href="' + url +
                            '" class="text-decoration-none text-black  "><img src="/' + value.attributes
                            .image + '" alt="" class="cart-img me-2"></a></div>'
                        data = data + '<div> <span class="cart-item-name">' + value.name +
                            '</span><br/>'
                        data = data + ' <span class="cart-number">' + value.quantity + ' x ৳ ' + value
                            .price + '</span></div>'

                        data = data +
                            ' <div class="ms-auto"><button class="btn btn-danger btn-sm" onclick="cartDelete(' +
                            value.id + ')"><i class="fas fa-trash-alt "></i></button> </div></div>'

                    });
                    data = data +
                        '<a href="{{ route('cart.page') }}" class="btn btn-danger mt-2">View Cart</a>'

                    $('#buy').html(data);
                }
            });
        }
        cartAllData();
    </script>
    <script>
        function addCartAjax(id) {
            var url = "/add-cart-ajax/" + id;
            $.ajax({
                url: url,
                type: "get",
                dataType: "json",
                success: function(res) {
                    toastr.success('Cart Added Successfully');
                    $('.buy-cart-number').text(res.total_item);
                    $('#fixed-cart-number').text(res.total_item);

                    var data = "";
                    $.each(res.allData, function(key, value) {
                        var url = '/product-details/' + value.attributes.slug;
                        data = data + '<div class="single-cart-item my-1 d-flex">'
                        data = data + '<div> <a href="' + url +
                            '" class="text-decoration-none text-black  "><img src="/' + value.attributes
                            .image + '" alt="" class="cart-img me-2"></a></div>'
                        data = data + '<div> <span class="cart-item-name">' + value.name +
                            '</span><br/>'
                        data = data + ' <span class="cart-number">' + value.quantity + ' x ৳ ' + value
                            .price + '</span></div>'

                        data = data +
                            ' <div class="ms-auto"><button class="btn btn-danger btn-sm" onclick="cartDelete(' +
                            value.id + ')"><i class="fas fa-trash-alt "></i></button> </div></div>'

                    });
                    data = data +
                        '<a href="{{ route('cart.page') }}" class="btn btn-danger mt-2">View Cart</a>'

                    $('#buy').html(data);
                }
            })
        }
    </script>
    <script>
        // ajax card  content show
        function cartcontent() {
            $.ajax({
                url: "{{ route('cart.content') }}",
                type: "get",
                dataType: "json",
                success: function(res) {
                    $('.buy-cart-number').text(res.total_item);
                    $('#fixed-cart-number').text(res.total_item);
                    $('#buy-number').text(res.total_item);
                    //quote
                    $('#qoute-count').text(res.total_quote_item);
                    $('#fixed-qoute-count').text(res.total_quote_item);
                    $('#quote-amount').text('৳ ' + res.total_quote_price);
                    if (res.status == 1) {
                        $('#quotationPrintDisable').hide();
                        $('#quotationSendDisable').hide();
                        $('#quotationPrintEnable').show();
                        $('#quotationSendEnable').show();
                    } else {
                        $('#quotationPrintDisable').show();
                        $('#quotationSendDisable').show();
                        $('#quotationPrintEnable').hide();
                        $('#quotationSendEnable').hide();
                    }
                    var data = '';
                    $.each(res.quote, function(key, value) {
                        data += '<div class="card rounded-0">';
                        data += '<div class="card-body">';
                        data += '<div class="row">';
                        data += '<div class="col-lg-9 col-md-9 col-12">';
                        data += '<div class="d-flex gap-3">';
                        data += '<div>';
                        data += '<a href="cart-details.html"><img src="/' + value.image +
                            '" alt="" class="rounded border border-1 cart-details-img"></a>';
                        data += '</div>';
                        data += '<div>';
                        data += '<p class="cart-detail-product-name mb-0">' + value.name + '</p>';
                        data += '<p class="cart-detail-product-discount mb-0">' + value.quantity +
                            ' X ৳ ' + value.price + '</p>';
                        data += '<div class="cart-detail-product-discount"><b>Category:</b> ' + value.category + '</div>';
                        data += '</div>';
                        data += '</div>';
                        data += '</div>';
                        data += '<div class="col-lg-2 col-md-2 col-10 align-self-center">';
                        data += '<h6 class="text-end py-md-0 py-3">৳ ' + value.price * value
                            .quantity + '</h6>';
                        data += '</div>';
                        data += '<div class="col-lg-1 col-md-1 col-2 align-self-center">';
                        data += '<div class="d-flex justify-content-end">';
                        data += '<div><a href="javascript:void(0)" onclick="quoteDelete(' + value.id +
                            ')"><i class="fas fa-trash-alt cart-trash"></i></a></div>';
                        data += '</div>';
                        data += '</div>';
                        data += '</div>';
                        data += '</div>';
                        data += '</div>';

                    });
                    $('.quote-list').html(data);
                }
            })
        }
        cartcontent();
    </script>
    <script>
        function cartDelete(id) {
            var url = "/remove/" + id;
            $.ajax({
                url: url,
                type: "get",
                dataType: "json",
                success: function(res) {
                    toastr.success('Cart Deleted Successfully');
                    var data = '';
                    $.each(res.all_data, function(key, value) {

                        data = data + ' <div class="single-cart d-lg-flex d-none d-sm-flex">'
                        data = data + '<div class="single-cart-item-img">'
                        data = data + ' <img src="/' + value.attributes.image + '" alt=""></div>'
                        data = data + '<div class="single-cart-name mx-2"><h5>' + value.name +
                            '</h5></div>'
                        data = data + ' <div class="single-cart-price ms-auto"> <h5>৳' + value.price +
                            '</h5></div>'
                        data = data + ' <div class="cart-increment-decrement text-center px-2">'
                        data = data + ' <div class="d-flex">'
                        data = data + ' <span class="decrement-btn" onclick="decrement(' + value.id +
                            ')"><i class="fas fa-minus"></i></span> '
                        data = data + ' <input type="text" value="' + value.quantity + '" id="' + value
                            .key + '" name="value" class="single-cart-input-field cart-input" readonly>'
                        data = data + '<span class="increment-btn" onclick="increment(' + value.id +
                            ')"><i class="fas fa-plus"></i></span> '
                        data = data + ' </div></div> '
                        data = data + '<div class="single-cart-subtotal"><h5>৳' + (value.quantity *
                            value.price) + '</h5></div>'
                        data = data + ' <div class="btn btn-sm mx-2" onclick="cartDelete(' + value.id +
                            ')"><img src="/website/icon-image/delete.png" alt=""></div> '
                        data = data + '</div>'

                    });

                    $('.cart-left-side').html(data);
                    var data2 = '';
                    $.each(res.all_data, function(key, value) {
                        var url = '/product-details/' + value.attributes.slug;
                        data2 = data2 + '<div class="single-cart-item my-1 d-flex">'
                        data2 = data2 + '<div> <a href="' + url +
                            '" class="text-decoration-none text-black  "><img src="/' + value.attributes
                            .image + '" alt="" class="cart-img me-2"></a></div>'
                        data2 = data2 + '<div> <span class="cart-item-name">' + value.name +
                            '</span><br/>'
                        data2 = data2 + ' <span class="cart-number">' + value.quantity + ' x ৳ ' + value
                            .price + '</span></div>'

                        data2 = data2 +
                            ' <div class="ms-auto"><button class="btn btn-danger btn-sm" onclick="cartDelete(' +
                            value.id + ')"><i class="fas fa-trash-alt "></i></button> </div></div>'

                    });
                    data2 = data2 +
                        '<a href="{{ route('cart.page') }}" class="btn btn-danger mt-2">View Cart</a>'
                    $('#buy').html(data2);
                    $('.buy-cart-number').text(res.total_item);
                    $('#fixed-cart-number').text(res.total_item);

                }

            })
        }
    </script>
    <script>
        $(document).on("change", "#district_id", function() {
            var district_id = $("#district_id").val();
            $.ajax({
                url: "{{ route('upazila.change') }}",
                type: "GET",
                data: {
                    district_id: district_id
                },
                success: function(data) {
                    var html = '<option value=""> Select Thana </option>';
                    $.each(data, function(key, v) {
                        html += '<option value="' + v.id + '">' + v.name + ' </option>';
                    });
                    $("#upazila_id").html(html);
                }
            });
        });
    </script>

    <script>
        // function ajaxQuote(id) {
        //     let url = '{{ asset('') }}' + 'quote/' + id;
        //     $.ajax({
        //         url: url,
        //         method: 'get',
        //         success: function(res) {
        //             toastr.options = {
        //                 "closeButton": true,
        //                 "progressBar": true,
        //             }
        //             toastr.success('Successfully Added to Quote');
        //             $('#qoute-count').text(res.total_item);
        //             $('#fixed-qoute-count').text(res.total_item);
        //             $('#quote-amount').text('৳ ' + res.total_price);

        //             if (res.status == 1) {
        //                 $('#quotationPrintDisable').hide();
        //                 $('#quotationSendDisable').hide();
        //                 $('#quotationPrintEnable').show();
        //                 $('#quotationSendEnable').show();
        //             } else {
        //                 $('#quotationPrintDisable').show();
        //                 $('#quotationSendDisable').show();
        //                 $('#quotationPrintEnable').hide();
        //                 $('#quotationSendEnable').hide();
        //             }

        //             var data = '';
        //             $.each(res.quote, function(key, value) {
        //                 data += '<div class="card rounded-0">';
        //                 data += '<div class="card-body">';
        //                 data += '<div class="row">';
        //                 data += '<div class="col-lg-7 col-md-7 col-12">';
        //                 data += '<div class="d-flex gap-3">';
        //                 data += '<div>';
        //                 data += '<a href="cart-details.html"><img src="/' + value.image +
        //                     '" alt="" class="rounded border border-1 cart-details-img"></a>';
        //                 data += '</div>';
        //                 data += '<div>';
        //                 data += '<p class="cart-detail-product-name"><b>' + value.name + '</b></p>';
        //                 data += '<p class="cart-detail-product-discount mb-0">' + value.quantity +
        //                     ' X ৳ ' + value.price + '</p>';
        //                 data += '<div class=""><b>Category:</b> ' + value.category + '</div>';
        //                 data += '</div>';
        //                 data += '</div>';
        //                 data += '</div>';
        //                 data += '<div class="col-lg-2 col-md-2 col-10 align-self-center">';
        //                 data += '<h6 class="text-enter py-md-0 py-3">৳ ' + value.price * value
        //                     .quantity + '</h6>';
        //                 data += '</div>';
        //                 data += '<div class="col-lg-3 col-md-3 col-2 align-self-center">';
        //                 data += '<div class="d-flex justify-content-center">';
        //                 data += '<div><a href="javascript:void(0)" onclick="quoteDelete(' + value.id +
        //                     ')"><i class="fas fa-trash-alt cart-trash"></i></a></div>';
        //                 data += '</div>';
        //                 data += '</div>';
        //                 data += '</div>';
        //                 data += '</div>';
        //                 data += '</div>';

        //             });
        //             $('.quote-list').html(data);
        //             window.location.href = "{{ asset('') }}build-quote";
        //         }

        //     })

        // }
    </script>

    <script>
        function quoteDelete(id) {
            let url = '{{ asset('') }}' + 'quote-remove/' + id;

            $.ajax({
                url: url,
                method: 'get',
                success: function(res) {
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true,
                    }
                    toastr.error('Successfully Removed Item ');

                    $('#qoute-count').text(res.total_item);
                    $('#fixed-qoute-count').text(res.total_item);
                    $('#quote-amount').text('৳ ' + res.total_price);
                    if (res.status == 1) {
                        $('#quotationPrintDisable').hide();
                        $('#quotationSendDisable').hide();
                        $('#quotationPrintEnable').show();
                        $('#quotationSendEnable').show();
                    } else {
                        $('#quotationPrintDisable').show();
                        $('#quotationSendDisable').show();
                        $('#quotationPrintEnable').hide();
                        $('#quotationSendEnable').hide();
                    }

                    var data = '';
                    $.each(res.quote, function(key, value) {
                        data += '<div class="card rounded-0">';
                        data += '<div class="card-body">';
                        data += '<div class="row">';
                        data += '<div class="col-lg-9 col-md-9 col-12">';
                        data += '<div class="d-flex gap-3">';
                        data += '<div>';
                        data += '<a href="cart-details.html"><img src="/' + value.image +
                            '" alt="" class="rounded border border-1 cart-details-img"></a>';
                        data += '</div>';
                        data += '<div>';
                        data += '<p class="cart-detail-product-name mb-0"><b>' + value.name + '</b></p>';
                        data += '<p class="cart-detail-product-discount mb-0">' + value.quantity +
                            ' X ৳ ' + value.price + '</p>';
                        data += '<div class="cart-detail-product-discount"><b>Category:</b> ' + value.category + '</div>';
                        data += '</div>';
                        data += '</div>';
                        data += '</div>';
                        data += '<div class="col-lg-2 col-md-2 col-10 align-self-center">';
                        data += '<h6 class="text-enter py-md-0 py-3">৳ ' + value.price * value
                            .quantity + '</h6>';
                        data += '</div>';
                        data += '<div class="col-lg-1 col-md-1 col-2 align-self-center">';
                        data += '<div class="d-flex justify-content-center">';
                        data += '<div><a href="javascript:void(0)" onclick="quoteDelete(' + value.id +
                            ')"><i class="fas fa-trash-alt cart-trash"></i></a></div>';
                        data += '</div>';
                        data += '</div>';
                        data += '</div>';
                        data += '</div>';
                        data += '</div>';

                    });

                    $('.quote-list').html(data);


                }

            });
        }
    </script>
     <script>
        var url = 'https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?79736';
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = url;
        var options = {
      "enabled":true,
      "chatButtonSetting":{
          "backgroundColor":"#00e80d",
          "ctaText":"",
          "borderRadius":"25",
          "marginLeft":"0",
          "marginBottom":"100",
          "marginRight":"25",
          "position":"right"
      },
      "brandSetting":{
          "brandName":"Digital Shop",
          "brandSubTitle":"Typically replies within a day",
          "brandImg":"{{ asset($content->image) }}",
          "welcomeText":"Hi there!\nHow can I help you?",
          "messageText":"Hello, I have a question about ",
          "backgroundColor":"#e80000",
          "ctaText":"Start Chat",
          "borderRadius":"25",
          "autoShow":false,
          "phoneNumber":"8801615054171"
      }
    };
        s.onload = function() {
            CreateWhatsappChatWidget(options);
        };
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
    </script>
   

</body>

</html>
