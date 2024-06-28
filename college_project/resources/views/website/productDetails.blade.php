<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Free Web tutorials">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Digital Shop</title>
    <link rel="stylesheet" href="{{ asset('website') }}/css/slick.css">
    <link rel="stylesheet" href="{{ asset('website') }}/css/smoothproducts.css">
    <link rel="stylesheet" href="{{ asset('website') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('website') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('website') }}/css/responsive.css">
    <link rel="stylesheet" href="{{ asset('website') }}/css/productDetails.css">
    <link rel="stylesheet" href="{{ asset('website') }}/css/toastr.min.css"> 
    <style>


    </style>
</head>

<body>
    @include('partials.website_header')
    {!! Toastr::message() !!}
    <!-- header menu  section end-->


    <!-- breadcumb-section  section start-->

    <section class="breadcumb-section">
        <div class="container custom-container breadcumb-container py-2">
            <ul class="breadcumb">
                <li><a href="#" class="text-decoration-none text-black"><i class="fas fa-home"></i></a> </li>
                <li><a href="{{route('home')}}" class="text-decoration-none text-black">Home</a> <i class="fas fa-chevron-right"></i>
                </li>
                <li><a href="#" class="text-decoration-none text-black">{{$product->name}}</a> <i
                        class="fas fa-chevron-right"></i></li>
            </ul>
        </div>
    </section>
    <!--breadcumb-section  section end-->
    <!--product-details-section  section start-->
    <section class="py-3">
        <div class="container custom-container">
            <div class="row">
                <div class="col-md-6">
                    <div class="slick-slider slider-for"
                        data-slick-options='{"slidesToShow": 1,"autoplay":false,"dots":false,"arrows":false,"asNavFor":".slider-nav"}'>
                        <div class="box"> <img src="{{ asset($product->image)}}" alt="" ></div>
                        @isset($product->productImage)
                            @foreach ($product->productImage as $item)
                            <div class="box" ><img src="{{asset($item->otherImage)}}" alt="The first slider"></div>
                            @endforeach
                        @endisset
                    </div>
                    <div class="slick-slider slider-nav"
                        data-slick-options='{"slidesToShow": 4,"autoplay":false,"dots":false,"arrows":false,"focusOnSelect":true,"asNavFor":".slider-for"}'>
                       @isset($product->productImage)
                        @foreach ($product->productImage as $item)
                        <div class="box" style="border: 1px solid red;"><img src="{{asset($item->otherImage)}}" alt="The first slider"></div>
                        @endforeach
                       @endisset
                    </div>

                </div>
                <div class="col-md-6">
                    @if($product->inventory->purchage>0)
                    <div class="stock">
                        <button class="stock-inner btn fw-bolder"><i class="fas fa-check"></i> In Stock </button>
                    </div>
                    @else 
                    <div class="stock">
                        <button class="stock-inner btn fw-bolder text-danger"><i class="fas fa-check"></i> Stock Out  </button>
                    </div>
                    @endif

                    <div class="product-name py-2">
                        <h4 class="fw-bolder">{{$product->name}}</h4>
                      
                    </div>
                    <div class="product-price py-2">
                     @php   
                      
                        $deal_date = strtotime($product->deal_end);
                        $curent_date =  new DateTime();
                        $c_date_time = strtotime($curent_date->format("Y-m-d H:i:s.v"));
                        $discount = $product->discount;
                        $discount_price =$product->price - ($product->price*$discount/100);
                        $duration_time = $deal_date - $c_date_time;
                      @endphp
                       
                        @if($deal_date>$c_date_time)
                            
                            <h4>৳ {{$discount_price}}</h4>
                        @else 
                        <h4>৳ {{$product->price}}</h4>
                        @endif
                    </div>
                    <div class="add-to-cart w-100 p-2">
                        <form action="{{route('add.cart')}}" method="post"> 
                            @csrf
                          
                                <input type="hidden" name="id" value="{{$product->id}}">
                                <span class="decrement-btn btn cart-btn"><i class="fas fa-minus"></i></span>
                                 <span class="increament"><input type="number" name="item_number" class="cart-input-field cart-input" readonly
                                        value="{{$cart->quantity??'1'}}" min='1'></span> 
                                <span class="increament-btn btn cart-btn"><i class="fas fa-plus"></i></span>
                            <button class="btn add-to-cart-btn mx-2 mt-md-0 mt-2" type="submit">Add Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <section>
        <div class="container custom-container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Key Features:</h5>
                        <ul class="feature-ul">
                            @foreach ($product->features as $item)
                            <li> {{$item->name}}</li>
                               
                            @endforeach
                        </ul>
                        {!!$product->short_details!!}
                </div>

               
            </div>
            
        </div>
    </section>
    <!--product-details  section end-->
    <!--product-related  section start-->
    <section class="py-3">
        <div class="container custom-container">
            <ul class="nav nav-tabs" id="myTab">
                <li class="nav-item">
                    <button class="nav-link active tab-button" id="description-tab" data-bs-toggle="tab"
                        data-bs-target="#description">Description</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link tab-button" id="information-tab" data-bs-toggle="tab"
                        data-bs-target="#information">Q & A</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link tab-button" id="information-tab" data-bs-toggle="tab"
                        data-bs-target="#related_product">Related Product</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="description">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12 py-4">
                                <p class="fs-6">
                                   {!!$product->short_details!!}

                                   {!!$product->description!!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="information">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12 py-4">
                                <h5>{{$product->name}}</h5>
                                   @isset($product->questions)
                                        @foreach ($product->questions as $question)
                                            {{-- <p><span>{{$question->customer->name}}</span> {{$question->question}}</p> --}}
                                            <div class="mt-3">
                                                <div class="user-image d-flex">
                                                    @if($question->customer->profile_picture)
                                                    <img src="{{asset($question->customer->profile_picture)}}" alt="" style="height: 40px;width:40px;border-radius:50%">
                                                   @else 
                                                   <i class="fas fa-user product-user-icon"></i>
                                                   @endif
                                                    <span class="fw-bolder text-nowrap mx-2"> {{$question->customer->name}}</span><i class="fas fa-question"></i>
                                                </div>
                                                <div class="px-2 ans-que-part">
                                                    <div class="question-part">
                                                        {{$question->question}}
                                                    </div>

                                                    <div class="answar-part mt-3">
                                                        @foreach ($question->answar as $answar)
                                                       <i class="fas fa-user product-user-icon"></i>
                                                       
                                                        <span class="fw-bolder text-nowrap mx-2"> Admin answared:</span> 
                                                        <div class="answar-part-inner">
                                                            {{$answar->answar}};
                                                        </div>
                                                        @endforeach
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                   @endisset
                                <form action="{{route('question.store')}}" method="get" class="mt-3">
                                    <input type="hidden" name="news_id" value="{{$product->id}}">
                                    <div class="form-group">
                                        <textarea class="form-control" name="question" id="" cols="30" rows="10"></textarea>
                                    </div>
                                    <input type="submit" class="btn btn-success mt-2" value="Submit">

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="related_product">
                    <div class="container">
                        <div class="row">
                            @foreach ($related as $item)
                                <div class="col-lg-3 col-md-4 col-6 py-4">
                                    <div class="related-product-item d-flex">
                                        <div class="related-product-img">
                                            <img src="{{ asset($item->image)}}" alt="">
                                        </div>
                                        <div class="related-product-right">
                                            <h5>{{$item->name}}</h5>
                                            <span>৳ {{$item->price}}</span>
                                            <a href="{{route('product.detail', $item->slug)}}" class="btn product-detail-view-btn mt-2 w-100">View</a>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--product-related  section end-->
    @include('partials.website_footer')

    <!-- footer bottom section end -->

    <script src="{{ asset('website') }}/js/jquery.min.js"></script>
    <script src="{{asset('website/js/toastr.min.js')}}"></script>
    <script src="{{ asset('website') }}/js/slick.js"></script>
    <script src="{{ asset('website') }}/js/smoothproducts.min.js"></script>
    <script src="{{ asset('website') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('website') }}/js/all.min.js"></script>

    <script src="{{ asset('website') }}/js/custom.js"></script>



    <script>
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider-for',

            centerMode: true,
            focusOnSelect: true
        });
    </script>

    <script>
      
        var currentValue = $('.cart-input-field').val();
        $(document).ready(function() {
            $('.increament-btn').click(function() {
                currentValue++;
                $('.cart-input').val(currentValue);
            });
            $('.decrement-btn').click(function() {
                if (currentValue > 1) {
                    currentValue--;
                    $('.cart-input').val(currentValue);
                }
            });
        });
    </script>
    <script>
      
      function cartAllData(){
          var cartTotal = $('#cartTotal').val();
            $.ajax({
                    url:"{{route('cart.alldata')}}",
                    type:"get",
                    dataType: "json",
                    success:function(res){
                        var data = "";
                        $.each(res,function(key,value){
                            var url = '/product-details/'+value.attributes.slug;
                            data = data + '<div class="single-cart-item my-1 d-flex">'
                            data = data + '<div> <a href="'+url+'" class="text-decoration-none text-black  "><img src="/'+value.attributes.image+'" alt="" class="cart-img me-2"></a></div>'
                            data = data + '<div> <span class="cart-item-name">'+value.name+'</span><br/>'
                            data = data + ' <span class="cart-number">'+value.quantity+' x ৳ '+value.price+'</span></div>'
                           
                            data = data + ' <div class="ms-auto"><button class="btn btn-danger btn-sm" onclick="cartDelete('+value.id+')"><i class="fas fa-trash-alt "></i></button> </div></div>'
                    
                        });
                        data = data + '<a href="{{route('cart.page')}}" class="btn btn-danger mt-2">View Cart</a>'

                        $('#buy').html(data);
                    }
                });
            }
            cartAllData();
    </script>
     <script>
        function cartDelete(id){
            var url = "/remove/"+id;
            $.ajax({
                  url:url,
                  type:"get",
                  dataType: "json",
                  success:function(res){
                    toastr.success('Cart Deleted Successfully');
                   
                    var data2 = '';
                    $.each(res.all_data,function(key,value){
                            var url = '/product-details/'+value.attributes.slug;
                            data2 = data2 + '<div class="single-cart-item my-1 d-flex">'
                            data2 = data2 + '<div> <a href="'+url+'" class="text-decoration-none text-black  "><img src="/'+value.attributes.image+'" alt="" class="cart-img me-2"></a></div>'
                            data2 = data2 + '<div> <span class="cart-item-name">'+value.name+'</span><br/>'
                            data2 = data2 + ' <span class="cart-number">'+value.quantity+' x ৳ '+value.price+'</span></div>'
                        
                            data2 = data2 + ' <div class="ms-auto"><button class="btn btn-danger btn-sm" onclick="cartDelete('+value.id+')"><i class="fas fa-trash-alt "></i></button> </div></div>'
                    
                        });
                        data2 = data2 + '<a href="{{route('cart.page')}}" class="btn btn-danger mt-2">View Cart</a>'

                        $('#buy').html(data2);
                        $('.buy-cart-number').text(res.total_item)
                  }
              })
        }
    </script>
      <script>
        // ajax card  content show
          function cartcontent(){
           $.ajax({
            url:"{{route('cart.content')}}",
                type:"get",
                dataType: "json",
                success:function(res){
                    $('.buy-cart-number').text(res.total_item);
                     $('#buy-number').text(res.total_item);
                     
                }
           })
          }
          cartcontent();
    </script>
    <script>

         @if(Session::has('success'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("{{ session('success') }}");
        @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.error("{{ session('error') }}");
        @endif
    </script>
     <script src="{{asset('website/js/bootstrap3-typeahead.min.js')}}" ></script>
     <script type="text/javascript">
         var baseUri = "{{ url('/') }}";
         $('.keyword').typeahead({
             minLength: 1,
             source: function (keyword, process) {
                 return $.get(`${baseUri}/get_suggestions/${keyword}`, function (data) {
                     return process(data);
                 });
             },
   
             updater:function (item) {
                 $(location).attr('href', '/search?q='+item);
                 return item;
             }
   
         });
     </script>
    
</body>

</html>
