@extends('layouts.website')
@push('website-css')
    <link rel="stylesheet" href="{{ asset('website') }}/css/product.css">
@endpush
@section('website-content')
 <!-- Start of Page Header -->
 <div class="page-header" style="height: 180px;" >
    <div class="container">
        <h1 class="page-title mb-0">Products</h1>
        <ul class="breadcrumb">
            <li><a href="{{route('home')}}">Home</a> ></li>
            <li>Products</li>
        </ul>
    </div>
  </div>
 <!-- End of Page Header -->
 <!-- product category start--->
{{-- <section class="first-product-section">
    <div class="container custom-container category-product-container">
        <div class="row ">
            @foreach ($subcategoris as $item)
            <div class="col-lg-2 col-md-4 col-12">
                <div class="single-item">
                    <a href="{{route('sub.category.list',$item->id)}}" class="category">
                        <img src="{{asset($item->image)}}" alt="" class="single-product-img">
                    </a>
                    <p class="product-name">{{$item->name}}</p>
                </div>
            </div>
            @endforeach
           

        </div>

    </div>
</section>
 <!-- product category end---> --}}

    <!--  product section start -->
    <section class="product-list-section">
        <form class="filter-form" >
        <div class="product-section custom-container">
            {{-- <h4 class="product-section-item">Optics > Binoculars - 18 items</h4> --}}
            
            <div class="row">
                <div class="col-md-2" id="product-left-side">
                   
                        <div class="product-filter-section display-none-sm">
                            <div class="d-flex w-100 py-3 border-bottom-1 title">
                                <span class="ms-2 py-2 fw-bolder">Filter</span>
                                <span class="ms-auto "><a href="#" class="btn text-danger ms-2">Clear All</a></span>
                            </div>
                            <div class="filter-title">Brand</div>
                            <div class="brand">
                                @foreach ($brands as $brand)
                                @if(in_array($brand->id, $brand_array))
                                <input type="checkbox" id="{{ $brand->id }}" name="brand" class="sort-form" value="{{$brand->id}}">
                                <label for="brand{{ $brand->id }}"> {{ $brand->name }}</label><br>
                                @endif
                            @endforeach
            
                            </div>
            
                            <div class="filter-title">Category</div>
                            <div class="category">
                                @foreach ($category as $item22)
                                @if(in_array($item22->id, $category_array))
                                    <input type="checkbox" id="{{ $item22->id }}" name="category" class="sort-form" value="{{$item22->id}}">
                                    <label for="brand{{ $item22->id }}"> {{ $item22->name }}</label><br>
                                @endif
                            @endforeach
                            </div>
                            {{-- <div class="filter-title">Recording Modes</div>
                            <div class="category">
                                @foreach ($recording_mode as $item)
                                    <input type="checkbox" id="{{ $item->id }}" class="sort-form" name="mode" value="{{$item->id}}" >
                                    <label for="cat{{ $item->id }}"> {{ $item->name }}</label><br>
                                @endforeach
            
                            </div> --}}
                            {{-- <div class="filter-title">Monitor Size</div>
                            <div class="category">
                                @foreach ($monitor_size as $item)
                                    <input type="checkbox" id="{{$item->id}}" class="sort-form" name="m_size" value="{{$item->id}}" >
                                    <label for="vehicle1"> {{$item->name}}</label><br>
                                @endforeach
                               
                            </div> --}}
                            {{-- <div class="filter-title">Camera Format</div>
                            <div class="category">
                                @foreach ($camera_format as $item)
                                    <input type="checkbox" id="{{$item->id}}" class="sort-form" name="c_format" value="{{$item->id}}" >
                                    <label for="vehicle1"> {{$item->name}}</label><br>
                                @endforeach
                               
                            </div> --}}
                            {{-- <div class="filter-title">Availablity</div>
                            <div class="category">
                                @if($item->inventory->purchage>0)                 
                                <p class="text-center"><i class="fas fa-check"></i> In stock</p>
                                @else
                                <p class="text-center"><i class="fas fa-check"></i>Out Of Stock</p>
                                @endif
                               
                            </div>  --}}
                        </div>
                    
                </div>
                <div class="product-left col-md-10">
                    <div class="product-collaps-btn-part d-flex py-3 display-none-sm">
                        <div class="sorting-price">
                            <label for="">Sort By:</label>
                            <select name="sort" id="sorting-select" class="sort-form" >
                                <option value="1">Price:High to Low</option>
                                <option value="2">Price:Low to High</option>
                            </select>
                        </div>
                   
                        <div class="sort mx-2 ms-auto">
                            <i class="fas fa-align-left"></i>
                        </div>
                        <div class="unsort mx-2">
                            <i class="fas fa-table"></i>
                        </div>
    
                    </div>
               
                    <div class="row" id="product-hide">
                        @foreach ($product as $item)
                        @php   
                        
                            $deal_date = strtotime($item->deal_end);
                            $curent_date =  new DateTime();
                            $c_date_time = strtotime($curent_date->format("Y-m-d H:i:s.v"));
                            $discount = $item->discount;
                            $discount_price =$item->price - ($item->price*$discount/100);
                            $duration_time = $deal_date - $c_date_time;
                        @endphp
                        <!--single product item start-->
                        <div class="col-md-3 col-12 product-single-part height">
                            <div class="single-part-left text-center mx-5 mt-3">
                                <a href="{{ route('product.detail', $item->slug) }}">
                                    <img src="{{ asset($item->image) }}" alt="">
                                </a>
                            </div>
                            <div class="product-part-middle  ms-0">
                                <a href="{{ route('product.detail', $item->slug) }}"
                                    class="text-decoration-none text-black fw-bolder" title="{{ $item->name }}">
                                    {{ $item->name }}
                                </a>

                                <p class="my-2">{{ $item->model }}</p>
                                <p class="key">Key Features</p>
                                <div class="product-part-key_feature">
                                    <ul>
                                        @foreach ($item->features as $item2)
                                            <li>{{ $item2->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="product-part-right text-center ms-auto position-absolute bottom-0">
                                @if($deal_date>$c_date_time)
                                <h5> ৳ {{ $discount_price }}</h5>
                                @else 
                                <h5> ৳ {{ $item->price }}</h5>
                                @endif
                                <a href="javascript:void();" class="btn btn-buy" onclick="addCartAjax({{$item->id}})">Add Cart</a>
                            
                             
                                @if($item->inventory->purchage>0)                 
                                <p class="text-center"><i class="fas fa-check"></i> In stock</p>
                                @else
                                <p class="text-center"><i class="fas fa-check"></i>Out Of Stock</p>
                                @endif
                            </div>
                           
                        </div>
                        <!--single product item end-->
                    @endforeach
                        
    
    
                    </div>
                    <div class="row" id="main-product">
                    </div>
                </div>
            </div>
           
       
        </div>
        </form>
    </section>
    <!-- product section end -->
    @push('website-js')

        <script>
              $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            $(document).ready(function() {
                $('.sort').on('click', function() {
                    $('.product-single-part').removeClass('col-md-3 col-12 height');
                    $('.product-single-part').addClass('col-md-9 col-12 product-unsort w-100');
                    $('.product-part-middle').addClass('m-auto py-3');
                    $('.product-part-right').removeClass('position-absolute');
                })
                $('.unsort').on('click', function() {
                    $('.product-single-part').removeClass('col-md-9 col-12  product-unsort w-100 py-3');
                    $('.product-single-part').addClass('col-md-3 col-12 height');
                    $('.product-part-middle').removeClass('m-auto py-3');
                    $('.product-part-right').addClass('position-absolute');
                })
            });
        </script>

    {{-- <script>
        $(document).on('change','#sorting-select',function(e){
            e.preventDefault();
            $(this).val();
            var url = '/product-short-price/'+$(this).val();
                $.ajax({
                    url:url,
                    method:'get',
                    success: function(res){
                    }
                });
        })
    </script> --}}
    <script>
        $(document).ready(function(){
            $(".filter-form").on("change", ".sort-form", function(e){
                e.preventDefault();
                var data = $('.filter-form').serialize();
                var url = '{{route('product.sort')}}';
                $.ajax({
                    url:url,
                    method:'get',
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(res){
                        $('#product-hide').hide();
                        var data = "";
                        $.each(res,function(key,value){
                            var route = '/product-details/'+value.slug;
                            // console.log(value.features);
                            data = data + '<div class="col-md-3 col-12 product-single-part height">'
                            data = data + ' <div class="single-part-left text-center mx-5 mt-3">'
                            data = data + '<a href="'+route+'"><img src="/'+value.image+'" alt=""></a>'
                            data = data + '</div>'
                            data = data + '<div class="product-part-middle ms-0">'
                            data = data + '<a href="'+route+'" class="text-decoration-none text-black">'
                            data = data + ' <h5 class="text-center">'+value.name+'</h5>'
                            data = data + ' </a>'
                            data = data + '<p> '+value.model+'</p>'
                            data = data + '<p class="key">Key Features</p>'
                            data = data + ' <div class="product-part-key_feature">'
                            data = data + '<ul>'
                                $.each(value.features,function(key2,value2){
                                    data = data + '<li>'+value2.name+' </li>'
                                })
                           
                            data = data + ' </ul>'
                            data = data + ' </div> </div>'
                            data = data + '<div class="product-part-right text-center ms-auto position-absolute bottom-0">'
                            data = data + ' <h5> ৳ '+value.price+'</h5>'
                           
                            data = data + ' <a href="javascript:void();" class="btn btn-buy"  onclick="addCartAjax('+value.id+')">Add Cart</a>'
                            
                            
                           
                            data = data + ' <p class="text-center"><i class="fas fa-check"></i> in stock</p>'
                            data = data + ' </div></div>'
                        });
                        $('#main-product').html(data);
                        }
                });
                
            });
        });

    </script>
 
    <script>
          function addCartAjax(id){
            console.log(id);
            var url = "/add-cart-ajax/"+id;
            $.ajax({
                    url:url,
                    type:"get",
                    dataType: "json",
                    success:function(res){
                        $('.buy-cart-number').text(res)
                        toastr.success('Cart Added Successfully');
                        cartAllData();
                    }
                })
            var overlay_1 = $('.overlay-1'+id).hide();
            $('.overlay-2'+id).show();
            $('#increment_decrement_part').show();
        }
    </script>


    <script>
        //rent cart add
        function addRent(id){
        console.log(id);
        var url = "/add-rent/"+id;
        $.ajax({
                url:url,
                type:"get",
                dataType: "json",
                success:function(res){
                    $('.buy-cart-number').text(res)
                    toastr.success('Cart Added Successfully');
                    cartAllData();
                }
            })
        var overlay_1 = $('.overlay-1'+id).hide();
        $('.overlay-2'+id).show();
        $('#increment_decrement_part').show();
    }
    </script>
    @endpush
@endsection
     
       
    
   
        
            
       

       
       
        
            
                
                    
              
            
        
    
    
       
        
       
