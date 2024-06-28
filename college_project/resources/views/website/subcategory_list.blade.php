
@extends('layouts.website')

@section('website-content')
 <!-- Start of Page Header -->
 <div class="page-header" style="height: 180px;" >
    <div class="container">
        <h1 class="page-title mb-0">{{$categoris->name}}</h1>
        <ul class="breadcrumb">
            <li><a href="{{route('home')}}">Home</a> ></li>
            <li>{{$categoris->name}}</li>
        </ul>
    </div>
  </div>
 <!-- End of Page Header -->
 <!-- product category start--->
<section class="first-product-section">
    <div class="container custom-container category-product-container">
        <div class="row ">
            @foreach ($subCategories as $item)
            <div class="col-lg-2 col-md-6 col-4">
                <div class="single-item">
                    <a href="{{ route('allSubsubcategory', $item->id) }}" class="category">
                        <img src="{{asset($item->image)}}" alt="" class="single-product-img">
                    </a>
                    <p class="product-name">{{$item->name}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


@endsection