@extends('layouts.website')
@push('website-css')
    <link rel="stylesheet" href="{{ asset('website') }}/css/cart.css">
@endpush
@section('website-content')
 <!-- Start of Page Header -->
 <div class="page-header" style="height: 180px; " >
    <div class="container">
        <h1 class="page-title mb-0">Latest News</h1>
        <ul class="breadcrumb">
            <li><a href="{{route('home')}}">Home</a> ></li>
            <li>Latest News</li>
        </ul>
    </div>
  </div>
 <!-- End of Page Header -->

    <!-- cart-section  section start-->
    <section class="news-section py-3">
        <div class="container custom-container">
            <div class="section-title">
                <h3>Latest News</h3>
            </div>
            <div class="row">
                @foreach ($news as $item)
                <div class="col-lg-3 mb-3 col-md-4 col-12 ">
                    <div class="news-box">
                        <a href="{{route('news.details', $item->id)}}" class="text-decoration-none text-black ">
                            <div class="card w-100">
                                <img src="{{asset($item->image)}}" class="card-img-top" alt="..." style="height: 160px;">
                                <div class="card-body">
                                   <div class="news-top d-flex">
                                       <div class="category-name-news">
                                        <h5 class="text-danger">{{$item->title}}</h5>
                                       </div>
                                       <div class="date ms-auto">{{date('Y-m-d', strtotime($item->date))}}</div>
                                   </div>
                                  <p class="card-text">
                                    {!!Str::limit($item->short_details, 150)!!}
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
    @push('website-js')

      
       
    @endpush
@endsection
