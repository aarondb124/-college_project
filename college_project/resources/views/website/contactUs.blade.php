@extends('layouts.website')
@section('website-content')
<!-- contactus-sectio start-->
<section class="contact-us-section">
    <div class="container custom-container">
        <div class="row">
            <div class="col-md-6 ">
                <div class=" my-5 contact-us-form">
                    <h4><b>Contact Us</b> </h4>
                    <form action="{{route('contact.store')}}" method="post" class="contact-form">
                       @csrf
                        <div class="form-group my-2">
                            <label for="">Name</label>
                            <input type="text" name="name" placeholder="Enter name" class="form-control input-field" required>
                        </div>
                        <div class="form-group my-2">
                            <label for="">Email</label>
                            <input type="eamil" name="email" placeholder="Enter Email" class="form-control input-field">
                        </div>
                        <div class="form-group my-2">
                            <label for="">Phone</label>
                            <input type="number" name="phone" placeholder="Enter Phone" class="form-control input-field" required>
                        </div>
                        <div class="form-group my-2">
                            <label for="">Subject</label>
                            <input type="text"  name="subject" placeholder="Enter Subject" class="form-control input-field" required>
                        </div>
                        <div class="form-group my-2">
                            <label for="">Message</label>
                           <textarea name="message" id="" cols="30" rows="6" class="form-control input-field" placeholder="Write Message" required></textarea>
                        </div>
                       
                            <button class="btn sent-btn" value="Send">Send</button>
                      
                        
                    </form>
                </div>
            </div>
            <div class="col-md-6 my-5">
                <div class="address-part">
                    <h4><b>Digital Shop</b> </h4>
                    <h5 class="mt-3"> <b> ##Corporate Office:</b></h5>
                    <div class="center">
                        <p class="w-50"><b>Plot:</b>{{$content->address}}</p>
                    </div>
                    <ul class="contact-ul">
                        <li> <span><b>Phone No.</b></span> {{$content->phone_1}}</li>
                        <li><span><b>Email:</b></span>{{$content->email}}</li>
                        <li><span><b>Linkedin :</b></span> {{$content->linkedin}}</li>
                        <li><span><b>FaceBook :</b></span> {{$content->facebook}}</li>
                        <li><span><b>Website :</b></span> www.digitalshop.com</li>
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!--contactus-sectio end-->



@endsection