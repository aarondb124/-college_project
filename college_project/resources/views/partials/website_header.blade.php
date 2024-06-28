  <!-- header top section start-->
  <section class="header-top-section container custom-container">
      <div class="container-fluid">
          <div class="header-top">
              <div class="header-top-left">
                  <div class="phone text-nowrap"><img src="{{ asset('website/img/customer-support.png') }} " height="25"
                          alt=""> {{ $content->phone_1 }}</div>
              </div>
              <div class="header-top-right ms-auto">
                  <div class="social-share-section">
                      <ul class="social-share">
                          <li><a class="bg-primary" href="{{ $content->facebook }}"><i
                                      class="fab fa-facebook-f"></i></a></li>
                          <li><a class="bg-light" href="{{ $content->twitter }}"><i
                                      class="fab fa-twitter text-primary"></i></a></li>
                          <li><a class="bg-light" href="{{ $content->youtube }}"><i
                                      class="fab fa-youtube text-danger"></i></a></li>
                          <li><a class="insta" href="{{ $content->instagram }}"><i class="fab fa-instagram"></i></a>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- header top section end-->

  <!-- header  section start-->
  <section class="header-section">
      <div class="container custom-container">
          <div class="header">
              <div class="icon-bar"><i class="fas fa-bars"></i></div>
              <div class="header-logo">
                  <a href="{{ route('home') }}"><img src="{{ asset($content->logo) }}" alt="logo"
                          class="logo d-none d-md-block"></a>
                  <a href="{{ route('home') }}"><img src="{{ asset('website/icon-image/digital-logo.png') }}"
                          alt="logo" class="logo d-block d-md-none mt-1 ms-2"></a>
              </div>
              <div class="company-name me-5">
                  <h3 class="text-nowrap" id="typed">{{ $content->company_name }}</h3>
              </div>

              <div class="header-search">
                  <form action="{{ route('search') }}" method="GET">
                      <div class="input-group ">
                          <input type="text" type="text" name="q" placeholder="Search..." autocomplete="off"
                              class="header-search-input keyword form-control">
                          {{-- <span class="search-icon"><i class="fas fa-search"></i></span> --}}
                          <button class="btn custom-search" type="submit" id="button-addon2"><i
                                  class="fas fa-search"></i></button>
                      </div>
                  </form>
              </div>

              <div class="best_deal">
                  <div class=" justify-content-end d-none d-lg-flex">
                      <a href="#BEST" class="hot-widget pl-2"><img src="{{ asset('hot.png') }}" alt="Hot Deals">
                          <div class="hot-widget__text">
                              <h2><span>Best</span> Deals</h2>
                              <h4>Ends in <span>1 week from now</span></h4>
                          </div>
                      </a>
                  </div>
              </div>
              <div class="my-account" id="my-account">
                  <div class="user-icon">
                      <img src="{{ asset('website') }}/icon-image/user.png" alt="">
                  </div>
                  <div class="text-decoration-none">
                      <a href="#" id="sign" class="text-decoration-none">
                          <span class="text-nowrap join-free p-0 text-black">Sign in/Join Free</span>
                          <h5 class="my-account-h5 text-nowrap my-account-h5">My Account <i
                                  class="fas fa-caret-down drop-icon"></i></h5>
                      </a>

                  </div>
                  <div class="account-dropdown">
                      @if (!Auth::guard('customer')->check())
                          <a href="{{ route('customer.login') }}"
                              class="btn btn-login text-white bg-danger form-control">Login</a>
                          <a href="{{ route('customer.register.form') }}"
                              class="btn btn-login text-white bg-dark form-control">Create Account</a>
                      @endif


                      @if (Auth::guard('customer')->check())
                          <a href="{{ route('customer.dashboard') }}"
                              class="btn btn-login text-white bg-dark form-control">Profile</a>
                      @endif
                  </div>
              </div>
              <div class="cart me-3">
                  <div class="cart-icon d-flex cart-header">
                      <img src="{{ asset('website') }}/icon-image/cart.png" alt="">
                      <i class="fal fa-cart-arrow-down"></i>
                      <h5 class="d-flex p-0 m-0"> <span class="text-nowrap my-cart-span">My Cart</span></h5>
                      <span class="buy-cart-number">0</span>
                  </div>
                  <div class="cart-dropdown">

                      <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="buy" role="tabpanel"
                              aria-labelledby="home-tab">
                          </div>
                          <div class="tab-pane fade" id="rend" role="tabpanel" aria-labelledby="profile-tab">

                          </div>
                      </div>
                  </div>
              </div>
              {{-- <div class="">
            <a href="{{ route('build-quote') }}" class="btn bg-brand text-white px-2 text-nowrap">Build Own Quote</a>
          </div> --}}
          </div>
  </section>
  <!-- header  section end-->

  <!-- header menu  section start-->

  <section class="header-menu-section ">
      <div class="header-menu-part container custom-container ">
          <ul class="header-menu-ul ">
              @foreach ($category->take(7) as $item)
                  <li class="">
                      <a href="{{ route('sub.category.list', $item->id) }}">{{ $item->name }}</a>
                      {{-- <div class="mega-menu">
                          <div class="mega-menu-section w-100 p-0 m-0 d-flex">
                              <div class="mega-left-side">
                                  <div class="container">
                                      <div class="row">
                                          @foreach ($item->subCategory->take(8) as $key => $item2)
                                              <div class="col-lg-3 p-0 m-0">
                                                  <div class="single-item">
                                                      <a href="{{ route('allSubsubcategory', $item2->id) }}"
                                                          class="header-category">
                                                          <img src="{{ asset($item2->image) }}" alt=""
                                                              class="single-product-img header-category-img">
                                                      </a>
                                                      <div class="catName">
                                                          <a class="product-name"
                                                              href="{{ route('allSubsubcategory', $item2->id) }}">{{ $item2->name }}</a>

                                                      </div>
                                                  </div>
                                              </div>
                                          @endforeach

                                      </div>
                                      <div class="catName">
                                          <a href="{{ route('sub.category.list', $item->id) }}">View all <i
                                                  class="fas fa-arrow-right"></i></a>
                                      </div>
                                  </div>
                              </div>
                              <div class="mega-right-side">
                                  <a href="#" class="add_link">
                                      <img src="{{ asset('website') }}/img/header-banner-1.jpg" alt=""
                                          class="w-100">
                                  </a>
                              </div>
                          </div>
                      </div> --}}
                  </li>
              @endforeach

              <li><a href="{{ route('service') }}" class="m-li"> Repair & Services</a></li>
              <li><a href="{{ route('news') }}" class="m-li"> News</a></li>
              <li><a href="{{ route('all.brand') }}" class="m-li">Brands</a>
                  {{-- <div class="mega-menu">
                      <div class="mega-menu-section w-100 p-0 m-0 d-flex">
                          <div class="mega-left-side">
                              <div class="container">
                                  <div class="row">
                                      @foreach ($brand->take(8) as $key => $item)
                                          <div class="col-lg-3 p-0 m-0">
                                              <div class="single-item">
                                                  <a href="" class="header-category">
                                                      <img src="{{ asset($item->image) }}" alt=""
                                                          class="single-product-img header-brand-img">
                                                  </a>
                                                  <div class="catName">
                                                      <a class="product-name" href="">{{ $item->name }}</a>

                                                  </div>
                                              </div>
                                          </div>
                                      @endforeach

                                  </div>

                                  <div class="catName">
                                      <a href="{{ route('all.brand') }}">View all <i
                                              class="fas fa-arrow-right"></i></a>
                                  </div>
                              </div>
                          </div>
                          <div class="mega-right-side">
                              <a href="#" class="add_link">
                                  <img src="{{ asset('website') }}/img/header-banner-1.jpg" alt=""
                                      class="w-100">
                              </a>
                          </div>
                      </div>
                  </div> --}}
              </li>
              {{-- <li><a href="{{route('contact.us')}}" class="m-li">Contact Us</a></li> --}}
          </ul>
      </div>
  </section>
  {{-- mobile manu --}}
  <section class="mobile-menu">
      <nav class="sidebar card py-2 mb-4">
          <p class="text-center border-bottom menu-heading"> Menu</p>
          <ul class="nav flex-column" id="nav_accordion">
              @foreach ($randCategory as $item)
                  <li class="nav-item has-submenu submenu-1 me-1">
                      <a class="nav-link d-flex"
                          href="{{ route('sub.category.list', $item->id) }}">{{ $item->name }}<i
                              class="fas fa-caret-down ms-auto" id="menu-1"></i>
                      </a>
                      <ul class="submenu collapse">
                          @foreach ($item->subCategory as $item2)
                              <li><a class="nav-link"
                                      href="{{ route('allSubsubcategory', $item2->id) }}">{{ $item2->name }} </a>
                              </li>
                          @endforeach
                      </ul>
                  </li>
              @endforeach

              <li><a class="nav-link m-menu" href="{{ route('news') }}">>News </a>
              </li>
              <li><a class="nav-link m-menu" href="{{ route('service') }}">Repair & Services
                  </a></li>
              <li><a class="nav-link m-menu" href="{{ route('all.brand') }}">Brands
                  </a></li>
          </ul>
      </nav>
  </section>
  <!-- header menu  section end-->

  <section class="display-block-sm">
      <div class="container">
          <div class="my-2">
              <form action="{{ route('search') }}" method="GET">
                  {{-- <input type="text" type="text" name="q" placeholder="Search..." autocomplete="off" class="header-search-input keyword">
              <span class="search-icon"><i class="fas fa-search"></i></span> --}}
                  <div class="input-group ">
                      <input type="text" type="text" name="q" placeholder="Search..."
                          autocomplete="off" class="header-search-input keyword form-control">
                      <span class="search-icon"><i class="fas fa-search"></i></span>
                      <button class="btn custom-search" type="submit" id="button-addon2"><i
                              class="fas fa-search"></i></button>
                  </div>
              </form>
          </div>
      </div>
  </section>
