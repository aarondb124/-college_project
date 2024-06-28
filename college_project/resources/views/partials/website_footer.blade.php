    {{-- footer middle --}}
    <footer>
        <div class="footer__middle">
            <div class="container big-container">
                <div class="row text-center">
                    <div class="col-4">
                        <a href="tel:{{$content->phone_1}}" class="footer-contact-block fb-contact"><span><i
                                    class="fas fa-phone"></i></span>
                            <div class="text-center mid-content">{{$content->phone_1}}</div>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="#" class="footer-contact-block fb-contact"><span><i
                                    class="fab fa-rocketchat"></i></span>
                            <div class="text-center mid-content">Live Chat</div>
                        </a>
                    </div>
                    <div class="col-4"><a href="mailto:{{$content->email}}"
                            class="footer-contact-block fb-contact"><span><i class="far fa-envelope-open"></i></span>
                            <div class="text-center mid-content">Email us</div>
                        </a></div>
                </div>
            </div>
        </div>
    </footer>
    {{-- footer middle --}}
    <!-- footer top section start -->
    <section class="tooter-top-section pt-3">
        <div class="container custom-container">

            <div class="row py-4">
                <div class="col-md-4 col-12 ">
                    <h5 class="social-link-title mb-4 text-uppercase">Our Branch</h5>
                    @foreach ($branch as $item)
                        <div class="row mb-4">
                            <div class="col-md-2 col-3">
                                <div class="branch_img">
                                    <a href="" class="ps-3">
                                        <img src="{{ asset($item->image) }}" alt="" class="footer-logo">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-10 col-9">
                                <div class="header-top-right ms-auto ">
                            
                                    <ul class="footer-ul fa-ul mb-0">
                                        <li>
                                            <h6 class="text-white">{{ $item->name }}</h6>
                                        </li>
                                        <li><span class="fa-li"><a href="#"> </span>{{ $item->address }}</a>
                                        </li>
                                        <li><span class="fa-li"><a href="tel:/{{ $item->phone_1 }}"> </span>{{ $item->phone_1 }}</a></li>
                                    </ul>
                                    <a href="{{ route('another.branch',$item->id) }}" class="text-danger footer_btn">Explore</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-md-4 col-12">
                    <h5 class="social-link-title mb-4 text-uppercase">Store Hours</h5>

                    <ul class="footer-ul footer-hours">
                        <li><span>Monday - Friday</span> - 9:00am to 7:00pm</li>
                        <li><span>Saturday</span> - 9:00am to 7:00pm</li>
                        <li><span>Sunday</span> - 9:00am to 3:00pm</li>
                        
                    </ul>
                    <h5 class="social-link-title mb-4 text-uppercase pt-3">Store Hours</h5>
                    <ul class="footer-ul footer-hours">
                        <li><span>Monday - Friday</span> - 9:00am to 7:00pm</li>
                        <li><span>Saturday</span> - 9:00am to 7:00pm</li>
                        <li><span>Sunday</span> - 9:00am to 3:00pm</li>
                      
                    </ul>
                </div>
          
                <div class="col-md-4 col-12">
                    <h5 class="social-link-title mb-4 text-uppercase">Quick Links</h5>
                    <ul class="footer-ul  footer-hours sides">
                        @foreach ($category->take(6) as $item)
                            
                        <li><a href="{{route('sub.category.list', $item->id) }}">{{$item->name}}</a></li>
                        @endforeach
                        <li><a href="{{route('aboutUs')}}" >About Us</a></li>
                        <li><a href="{{ route('news') }}" >News &amp; Events</a>
                        <li><a href="{{ route('all.brand') }}" >Brands</a>
                        <li><a href="{{ route('contact.us') }}" >Contact Us</a>
                    </ul>
                    <ul class="footer-ul fa-ul footer-hours sides">
                        <li><a href="{{route('delivery.policy')}}" >Delivery Policy</a></li>
                        <li><a href="{{ route('return.policy') }}" > Returns & Exchanges Policy</a>
                        <li><a href="{{route('aboutUs')}}" >About Us</a></li>
              
                    </ul>
                </div>


            </div>
        </div>
    </section>
    <!-- footer footer top section end -->
    <!-- footer bottom section start -->
    <section class="py-2 footer-bottom">
        <div class="container custom-container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="text-white">Copyright 2022 © DigitalShop.All Rights Reserved.</div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="text-white text-end"> Developed By <a href="https://linktr.ee/aarondb124" target="_blank"
                            class="text-decoration-none text-white fw-bolder">aarondb124</a> </div>
                </div>

            </div>
        </div>
    </section>
    <!-- footer bottom section end -->
