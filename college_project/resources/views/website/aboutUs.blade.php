@extends('layouts.website')
@section('website-content')
  <!-- Start of Page Header -->
  <div class="page-header" style="height: 180px; " >
    <div class="container">
        <h1 class="page-title mb-0">About Us</h1>
        <ul class="breadcrumb">
            <li><a href="{{route('home')}}">Home</a> ></li>
            <li>About Us</li>
        </ul>
    </div>
</div>
<!-- End of Page Header -->

 <!-- aboutus-sectio start-->
 <section>
    <div class="container custom-container">
        <div class="row">
            <div class="col-md-12">
                <div class="about-us-title">
                    <h4>About Us</h4>
                </div>
                <div class="about-us-img w-100">
                    <img src="{{asset($content->about_image)}}" alt="">
                    {!!$content->about_description!!}
                    
                </div>
                {{-- <div class="term-condition">
                    <div class="condition-title">
                        <h3>Term's & Condition</h3>
                    </div>
                    {!! $content->trams_condition!!}
                </div> --}}
            </div>
        </div>
    </div>
</section>
<!--aboutus-sectio end-->


@endsection