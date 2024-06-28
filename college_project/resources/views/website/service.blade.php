@extends('layouts.website')
@push('website-css')
    <link rel="stylesheet" href="{{ asset('website') }}/css/repair.css">
@endpush
@section('website-content')
    <!-- Start of Page Header -->
    <div class="page-header" style="height: 180px; ">
        <div class="container">
            <h1 class="page-title mb-0">Repair And Service</h1>
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Home</a> ></li>
                <li>Repair And Service</li>
            </ul>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- cart-section  section start-->
    <section class="news-section py-3">
        <div class="container custom-container">
            <div class="section-title">
                <p>We know every imaging gear you own is priceless to you, that’s why we’re here to provide you exceptional
                    service when you require repair assistance for your imaging gear. Drop in to our service center, give us
                    a call or contact the store location nearest you to discuss your needs and how we can help you. We have
                    technicians in-house in our Colombo Service Centre who services all kind of DSLR & mirrorless cameras,
                    DSLR lenses, speedlights / studio lights, DJI Drones and DJI products.

                    Unfortunately, we can’t offer repairs on telescopes, tripods or Go Pros.</p>

            </div>
            <div class="row main-wrap">
                <div class="col-md-6 pt-0 seperate">
                    <h2 class="mb-4">Check your product repair status</h2>
                    <div class="one-line-input">
                        <div class="field-wrapper"><label for="message" class="">Repair Code</label> <input
                                id="repair_code" placeholder="Repair Code" name="repair_code" required="required"
                                data-lpignore="true" class="form-control"></div> <button class="btn btn-primary">Check
                            Repair Status</button>
                    </div>
                </div>
                <div class="col-md-6 pt-0">
                    <h2 class="mb-4">Repair information request form</h2>
                 <form action="{{route('service.store')}}" method="POST">
                  @csrf
                  <div class="row">
                    <div class="col-md-4">
                        <div class="field-wrapper"><label for="username">Your Name</label> <input id="name"
                                type="text" name="name" value="" required="required" placeholder="Your Name"
                                data-lpignore="true" class="form-control"></div>
                    </div>
                    <div class="col-md-4">
                        <div class="field-wrapper"><label for="email">Your Email</label> <input id="email"
                                type="email" name="email" value="" required="required"
                                placeholder="Your Email" data-lpignore="true" class="form-control"></div>
                    </div>
                    <div class="col-md-4">
                        <div class="field-wrapper"><label for="phone">Your Phone</label> <input id="phone"
                                type="text" name="phone" value="" required="required"
                                placeholder="Your Phone" data-lpignore="true" class="form-control"></div>
                    </div>
                    <div class="col-md-12">
                        <div class="field-wrapper"><label for="message">Describe the Issue Briefly</label>
                            <textarea id="message" name="message" required="required" placeholder="Describe the Issue Briefly"
                                data-lpignore="true" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12"><button class="btn btn-primary">Send Repair Request</button></div>
                </div>
                 </form>
                </div>
            </div>

        </div>
    </section>
    <section class="accent-bg py-5">
        <div class="container-fluid">
           <div class="row">
            <div class="col-lg-12">
                <div class="big__heading">

                    <h2>FAQ'S</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                @foreach ($faq as $key=> $item)
                <div class="accordion-item faq__item">
                  <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed faq-btn" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                     {{$item->title}}
                    </button>
                  </h2>
                  <div id="flush-collapseOne" class="accordion-collapse collapse " aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">{!!$item->description!!}</div>
                  </div>
                </div>
                    
                @endforeach
                    {{-- <div class="accordion-item faq__item">
                      <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed faq-btn" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                          Accordion Item #2
                     
                        </button>
                      </h2>
                      <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                      </div>
                    </div> --}}
                    {{-- <div class="accordion-item faq__item">
                      <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed faq-btn" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                          Accordion Item #3
                        </button>
                      </h2>
                      <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                      </div>
                    </div> --}}
                </div>
            </div>
           </div>
        </div>
    </section>
    @push('website-js')
    @endpush
@endsection
