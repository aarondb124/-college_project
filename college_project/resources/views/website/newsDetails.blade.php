@extends('layouts.website')
@push('website-css')
    <link rel="stylesheet" href="{{ asset('website') }}/css/cart.css">
@endpush
@section('website-content')

    <!-- cart-section  section start-->
    <section class="my-5">
        <div class="container custom-container">
            <div class="row">
                <div class="col-md-8 col-12">
                    <div class="news-details">
                        <div class="text-center my-3">
                            <img src="{{asset($news->image)}}" alt="" class="news-details-img" >
                            {{-- <iframe width="100%" height="350" src="{{$blog->video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                            
                        </div>
                        <h1 class="mb-3">{{$news->title}}</h1>
                        <p class="fw-bolder">Published: {{date('d/m/Y',strtotime($news->date))}}</p>
                        <div class="">
                            {!!$news->short_details!!}
                        </div>
                        <div class="">
                            {!!$news->details!!}
                        </div>

                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="news-row">
                        <h1 class="mb-3">Latest News</h1>
                        @foreach ($newss as $item)
                        <a href="{{route('news.details', $item->id)}}" class="text-decoration-none text-black right-blog-single">
                            <div class="single-news d-flex">
                                <div class="img mx-2">
                                    <img src="{{asset($item->image)}}" alt="">
                                </div>
                                <div class="mx-2"><p class="fw-blolder">{{$item->title}}</p>
                                    <p class="fw-bolder">Published: {{date('d/m/Y',strtotime($item->date))}}</p>
                                </div>
                            </div>
                        </a>
                            
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('website-js')

      
       
    @endpush
@endsection
