@extends('layouts.website')
@section('website-content')
    <section class="slider">
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->

            <div class="carousel-indicators">
                @php
                    $banners = $banner->count();
                @endphp
                @for ($i = 0; $i < $banners; $i++)
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="{{ $i }}"
                        class="{{ $i == 0 ? 'active' : '' }}"></button>
                @endfor
                {{-- <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button> --}}
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                @foreach ($banner as $key => $item)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                       <a href="{{$item->offer_link}}"> <img src="{{ asset($item->image) }}" alt="Los Angeles" class="d-block w-100" ></a>
                    </div>
                @endforeach

            </div>

            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </section>
    <!-- product category start--->
    <section class="first-product-section">
        <div class="container custom-container category-product-container">
            <div class="row ">
                @foreach ($categories as $item)
                    @if ($item->is_popular == '1')
                        <div class="col-lg-2 col-6">
                            <div class="single-item">
                                <a href="{{ route('sub.category.list', $item->id) }}" class="category">
                                    <img src="{{ asset($item->image) }}" alt="" class="single-product-im">
                                </a>
                                <p class="product-name"> <a href="{{ route('sub.category.list', $item->id) }}"></a>{{ $item->name }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

        </div>
    </section>
    <!-- product category end--->
    <!-- feature product section start -->
    <section class="feature-product-section">

        <div class="container custom-container feature-container">
            <div class="section-title text-center">
                <h3><span><i class="fas fa-fire-alt"></i></span> New Arrival </h3>
            </div>
            <div class="row feature-product-row">
                @foreach ($feature_product as $item)
                    <div class="col-lg-3 col-md-4 col-12 p-0 m-0 ">
                        <div class="single-product-item">
                            <a href="{{ route('product.detail', $item->slug) }}">
                                <img src="{{ asset($item->image) }}" alt="" class="single-product-img">
                            </a>
                            <a href="{{ route('product.detail', $item->slug) }}" class="text-decoration-none text-black">
                                <p class="product-name" title="{{ $item->name }}">
                                    {{ Str::limit($item->name, 30) }} </p>
                            </a>


                            <p class="product-price">৳ {{ $item->price }} </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- feature product section end -->



    {{-- brand wise pproduct start --}}
    <section class="feature-product-section">
        <div class="container custom-container feature-container">
            @foreach ($brand_product as $key => $brandpro)
                @if (count($brandpro->product) > 0)
                    <div class="brand_product_wrap">
                        <div class="section-title text-center">
                            <h3><span><i class="fas fa-fire-alt"></i></span> {{ $brandpro->name }} </h3>
                        </div>
                        <div class="row feature-product-row">
                            @foreach ($brandpro->product->take(12) as $brPro)
                                <div class="col-lg-3 col-md-4 col-12 p-0 m-0 ">
                                    <div class="single-product-item">
                                        <a href="{{ route('product.detail', $brPro->slug) }}">
                                            <img src="{{ asset($brPro->image) }}" alt="" class="single-product-img">
                                        </a>
                                        <a href="{{ route('product.detail', $brPro->slug) }}"
                                            class="text-decoration-none text-black">
                                            <p class="product-name" title="{{ $brPro->name }}">
                                                {{ Str::limit($brPro->name, 30) }} </p>
                                        </a>
                                        <p class="product-price">৳ {{ $brPro->price }} </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
    {{-- brand wise pproduct end --}}




    <!-- hot product section start -->
    <section class="hot-product-section pt-4" id="BEST">

        <div class="container custom-container feature-container">
            <div class="section-title text-center">
                <h3><span><i class="fas fa-fire-alt"></i></span> Best Deal Product</h3>
            </div>
            <div class="row feature-product-row" id="hot_product">
                @foreach ($hot_product as $item)
                    @php
                        $start_date = date('Y/m/d H:i:s', strtotime($item->deal_end));
                        $item->deal_end;
                        $discount = 0;
                        $discount = $item->discount;
                        $stock = $item->inventory->purchage;
                        $discount_price = $item->price - ($item->price * $discount) / 100;
                        $save = $item->price - $discount_price;
                        $id = $item->id;
                    @endphp
                @endforeach
                <div class="col-lg-3  col-md-4 col-12 p-0 m-0">
                    <a href="#" class="text-decoration-none text-black">
                        <div class="single-product-item">
                            <img src="{{ asset('website') }}/img/product8.jpg" alt="" class="single-product-img">

                            <p class="product-name text-start">Canon EOS M6 Mark II Mirrorless </p>
                            <p class="product-price text-start">৳ 80000</p>
                            <p class="deal-price text-start"><span class="text-decoration-line-through tk">৳
                                    100000</span> <span class="save-tk">You have save ৳ 20000</span></p>
                            <p class="text-start">
                                <span class="deal-text me-2">Deal ends in</span>
                                <span class="deal-date">
                                    <span id="days"></span>
                                    <span class="me-1">Days</span>
                                    <span id="hours"></span>
                                    :<span id="minutes"></span>
                                    :<span id="secends"></span>
                                </span>
                            </p>
                            <div class="progress custom-progress">
                                <div class="progress-bar custom-width progress-bar-striped" role="progressbar"
                                    style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </section>
    <!-- hot product section end -->

    <!-- news section start -->
    <section class="news-section py-3">
        <div class="container custom-container">
            <div class="section-title text-center">
                <h3><span><i class="fas fa-fire-alt"></i></span> What's Happening New</h3>
            </div>
            <div class="row feature-product-row">
                @foreach ($blog as $item)
                    <div class="col-lg-3  col-md-4 col-12  mb-3 ">
                        <div class="news-box ">
                            <a href="{{ route('blog.details', $item->id) }}" class="text-decoration-none text-black ">
                                <div class="card w-100">
                                    <a href="{{ route('blog.details', $item->id) }}" class="text-center">
                                        <img src="{{ asset($item->image) }}" class="card-img-top" alt="..."
                                            style="height: 200px;">
                                        {{-- <iframe width="100%" height="315" src="{{$item->video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}

                                    </a>

                                    <div class="card-body">
                                        <div class="news-top d-flex">
                                            <div class="category-name-news">Digital Shop</div>
                                            <div class="date ms-auto">{{ date('Y-m-d', strtotime($item->date)) }}</div>
                                        </div>
                                        <h5 class="text-danger">{{ $item->title }}</h5>
                                        <p class="card-text">
                                            {!! Str::limit($item->description, 150) !!}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>
    <!-- news section end -->
    @push('website-js')
        <script>
            // hot product show
            function hotProduct() {
                $.ajax({
                    url: "{{ route('hot.product') }}",
                    type: "get",
                    dataType: "json",
                    success: function(res) {
                        var data = '';
                        $.each(res, function(key, value) {

                            var discount = value.discount;
                            var discount_price = value.price - value.price * discount / 100;
                            var save = value.price - discount_price;
                            var fixed = parseFloat(save).toFixed(2);

                            var marrageday = new Date(value.deal_end);
                            var newDay = new Date();

                            var remainingTime = (marrageday - newDay) / 1000;
                            var days = Math.floor(remainingTime / 3600 / 24);
                            var hours = Math.floor((remainingTime / 3600) % 24);
                            var minutes = Math.floor((remainingTime / 60) % 60);
                            var secends = Math.floor((remainingTime) % 60);
                            var start = new Date(value.deal_start);
                            var duration = (marrageday - start) / 1000;
                            var progress_width = $('.custom-progress').width();
                            var exist_pro = (progress_width * remainingTime) / duration;
                            var d_progress = progress_width - exist_pro;
                            var url = '/product-details/' + value.slug;
                            var exist_progress = parseFloat(d_progress).toFixed(0);

                            function deal() {
                                var dealDay = value.deal_end;
                                var days2 = $('#days' + value.id);
                                var hours2 = $('#hours' + value.id);
                                var minutes2 = $('#minutes' + value.id);
                                var secends2 = $('#secends' + value.id);
                                var marrageday = new Date(dealDay);
                                var newDay = new Date();
                                var remainingTime = (marrageday - newDay) / 1000;
                                var days = Math.floor(remainingTime / 3600 / 24);
                                var hours = Math.floor((remainingTime / 3600) % 24);
                                var minutes = Math.floor((remainingTime / 60) % 60);
                                var secends = Math.floor((remainingTime) % 60);

                                $(days2).text(days);
                                $(hours2).text(hours);
                                $(minutes2).text(minutes);
                                $(secends2).text(secends);

                            }
                            deal();

                            data = data + '<div class="col-lg-3  col-md-4 col-12 p-0 m-0">'
                            data = data + '<a href="' + url + '" class="text-decoration-none text-black">'
                            data = data + '<div class="single-product-item">'
                            data = data + '<img src="/' + value.image +
                                '" alt="" class="single-product-img">'
                            data = data + '<p class="product-name text-start">' + value.name + '</p>'
                            if (remainingTime > 0) {
                                data = data + '<p class="product-price text-start">৳ ' + discount_price +
                                    '</p>'
                            } else {
                                data = data + '<p class="product-price text-start">৳ ' + value.price +
                                    '</p>'
                            }

                            if (remainingTime > 0) {
                                data = data +
                                    '<p class="deal-price text-start"><span class="text-decoration-line-through tk">৳' +
                                    value.price + '</span> <span class="save-tk">You have save ৳ ' + fixed +
                                    '</span></p>'
                                data = data + '<p class="text-start">'
                            }

                            data = data + ' <span class="deal-text me-2">Deal ends in</span>'
                            data = data + ' <span class="deal-date">'
                            data = data + ' <span id="days' + value.id + '">' + days + '</span>'
                            data = data + ' <span class="me-1">Days</span>'
                            data = data + ' <span id="hours' + value.id + '">' + hours + '</span>'
                            data = data + ' :<span id="minutes' + value.id + '">' + minutes + '</span>'
                            data = data + ':<span id="secends' + value.id + '">' + secends +
                                '</span></span></p>'
                            data = data + ' <div class="progress custom-progress">'
                            data = data +
                                ' <div class="progress-bar custom-width progress-bar-striped" role="progressbar" style="width: ' +
                                d_progress + 'px" aria-valuenow="' + d_progress +
                                '" aria-valuemin="0" aria-valuemax="100"></div>'
                            data = data + '</div></div></a></div>'

                            setInterval(deal, 1000);

                        });

                        $('#hot_product').html(data);

                    }
                })
            }
            hotProduct();
        </script>
        <script></script>
    @endpush
@endsection
