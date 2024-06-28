@extends('layouts.website') 
@section('website-content')

   <!-- Start of Page Header -->
   <div class="page-header" style="height: 180px; " >
    <div class="container">
        @foreach ($getbranch as $item)
            
        <h1 class="page-title mb-0">{{$item->name}}</h1>
        @endforeach
    
    </div>
</div>
<!-- End of Page Header -->

 <!-- aboutus-sectio start-->
 <section>
    <div class="container custom-container">
        @foreach ($getbranch as $item)
        <div class="branch_descrip mt-5">
            <p>{{$item->description}}</p>
        </div>
        <div class="row mb-5">
          <div class="col-md-6">
            <h3>Store Information</h3>
            <table class="table">
                <thead>
                  <tr>
                    <td style="width: 40%">Street address</td>
                    <th scope="col">{{$item->street_address}}</th>
                  </tr>
                  <tr>
                    <td style="width: 40%">Street address two</td>
                    <th scope="col">{{$item->street_address2}}</th>
                  </tr>
                  <tr>
                    <td style="width: 40%">City</td>
                    <th scope="col">{{$item->city}}</th>
                  </tr>
                  <tr>
                    <td style="width: 40%">Postal Code</td>
                    <th scope="col">{{$item->postal}}</th>
                  </tr>
                  <tr>
                    <td style="width: 40%">Province</td>
                    <th scope="col">{{$item->province}}</th>
                  </tr>
                  <tr>
                    <td style="width: 40%">Country</td>
                    <th scope="col">{{$item->country}}</th>
                  </tr>
                  <tr>
                    <td style="width: 40%">Phone</td>
                    <th scope="col">{{$item->phone}}</th>
                  </tr>
                </thead>
          
              </table>
        </div>
          <div class="col-md-6">
            <h3>Map Location</h3>
            <div>
                <iframe src="{{$item->map}}" width="100%" height="350px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
              
    </div>
    @endforeach
    </div>
</section>
<!--aboutus-sectio end-->
@endsection
