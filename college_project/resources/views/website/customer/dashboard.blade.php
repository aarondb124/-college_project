@extends('layouts.website')
@section('website-content')
    @push('website-css')
        <style>
            .select2 {
                width: 100%
            }
        </style>
    @endpush
    <div class="container custom-container my-5">
        <div class="row">
            <div class="col-md-3 dashboard-left-side p-0">
                <ul class="nav nav-tabs left-tab">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#profile">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#menu1">Profile Edit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#menu2">Adress</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#order">Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#quote">Quote</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customer.logout') }}"
                            onclick="return confirm('Are you sure logout from dashboard!')">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="dashboard-right-side  py-3">
                    <h3 class="dashboard-header">Accounts Details</h3>
                    <hr />
                    <div class="tab-content">
                        <div class="tab-pane container active" id="profile">
                            <h5>Personal Information</h5>

                            <table class="my-table">
                                <tr>
                                    <td width="10%"><b>Name:</b></td>
                                    <td>{{ Auth::guard('customer')->user()->name }}</td>
                                </tr>
                                <tr>
                                    <td width="10%"><b>Username:</b></td>
                                    <td>{{ Auth::guard('customer')->user()->username }}</td>
                                </tr>
                                <tr>
                                    <td width="10%"><b>Phone:</b></td>
                                    <td>{{ Auth::guard('customer')->user()->phone }}</td>
                                </tr>
                                <tr>
                                    <td width="10%"><b>Email:</b></td>
                                    <td> @isset(Auth::guard('customer')->user()->email)
                                            {{ Auth::guard('customer')->user()->email }}
                                        @endisset
                                    </td>
                                </tr>
                                {{-- <tr>
                                    <td width="10%"><b>Country:</b></td>
                                    <td> @isset(Auth::guard('customer')->user()->country->name){{ Auth::guard('customer')->user()->country->name }}
                                        @endisset</td>
                                </tr> --}}
                                <tr>
                                    <td width="10%"><b>District:</b></td>
                                    <td> @isset(Auth::guard('customer')->user()->district->name)
                                            {{ Auth::guard('customer')->user()->district->name }}
                                        @endisset
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%"><b>Upazila:</b></td>
                                    <td> @isset(Auth::guard('customer')->user()->upazila->name)
                                            {{ Auth::guard('customer')->user()->upazila->name }}
                                        @endisset
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%"><b>Address:</b></td>
                                    <td> @isset(Auth::guard('customer')->user()->address)
                                            {{ Auth::guard('customer')->user()->address }}
                                        @endisset
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10%"><b>Photo:</b></td>
                                    <td class="text-center"> @isset(Auth::guard('customer')->user()->profile_picture)
                                            <div id="preview">
                                                <img src="{{ asset(Auth::guard('customer')->user()->profile_picture) }}"
                                                    alt="">
                                            </div>
                                        @endisset
                                    </td>
                                </tr>
                            </table>

                        </div>
                        <!--- customer update part--->
                        <div class="tab-pane container fade" id="menu1">
                            <h5>Personal Information Edit</h5>
                            <form action="{{ route('auth.customer.update') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group py-1">
                                    <label for="">Name:</label>
                                    <input type="text" name="name" value="{{ Auth::guard('customer')->user()->name }}"
                                        class="form-control">
                                </div>
                                <div class="form-group py-1">
                                    <label for="">Username:</label>
                                    <input type="text" name="username"
                                        value="{{ Auth::guard('customer')->user()->username }}" class="form-control">
                                </div>
                                <div class="form-group py-1">
                                    <label for="">Phone:</label>
                                    <input type="text" name="phone" value="{{ Auth::guard('customer')->user()->phone }}"
                                        class="form-control">
                                </div>
                                <div class="form-group py-1">
                                    <label for="">Email:</label>
                                    <input type="email" name="email" value="{{ Auth::guard('customer')->user()->email }}"
                                        class="form-control">
                                </div>
                                <div class="form-group py-1">
                                    <label for="">Photo:</label>
                                    <input type="file" name="profile_picture" id="image" class="form-control"
                                        onchange="readURL(this);">
                                </div>
                                <div class="form-group mt-3">
                                    <div id="preview" class="d-flex">
                                        <span><button type="submt" class="btn btn-success"
                                                value="Update">Update</button></span>

                                        <span class="ms-auto"> <img src="" alt="" id="previewImage"
                                                class="me-auto"></span>
                                    </div>
                                </div>

                            </form>
                        </div>

                        <!------ address bar section --->
                        <div class="tab-pane container fade" id="menu2">
                            <p>Address Edit</p>
                            <div class="container">
                                <form action="{{ route('auth.customer.address') }}" method="post">
                                    @csrf
                                    <div class="address-edit">
                                        {{-- <div class="form-group my-1">
                                            <label for="">Country:</label>
                                            <select name="country_id" class=" form-control @error('name') is-invalid @enderror">
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}" {{$country->id == Auth::guard('customer')->user()->country_id? 'selected':''}}>{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('country_id')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                           @enderror
                                        </div> --}}
                                        <div class="form-group my-1">
                                            <label for="">District:</label>
                                            <select name="district_id" id="district_id"
                                                class=" form-control @error('name') is-invalid @enderror">
                                                <option value="" selected>Select...</option>
                                                @foreach ($districts as $district)
                                                    <option value="{{ $district->id }}"
                                                        {{ $district->id == Auth::guard('customer')->user()->district_id ? 'selected' : '' }}>
                                                        {{ $district->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('district_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group my-1">
                                            <label for="">Upazila:</label>
                                            <select name="upazila_id" id="upazila_id"
                                                class=" form-control @error('name') is-invalid @enderror">
                                                <option value="" selected>Select...</option>
                                                @foreach ($upazilas as $upazila)
                                                    <option value="{{ $upazila->id }}"
                                                        {{ $upazila->id == Auth::guard('customer')->user()->upazila_id ? 'selected' : '' }}>
                                                        {{ $upazila->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('upazila_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group my-1">
                                            <label for="">Address:</label>
                                            <textarea name="address" id="" class="form-control @error('name') is-invalid @enderror" rows="2">{{ Auth::guard('customer')->user()->address }}</textarea>
                                        </div>
                                        <input type="submit" class="btn btn-success" value="Update">
                                    </div>
                                </form>
                            </div>

                        </div>
                        <!------ order  section start --->
                        <div class="tab-pane container fade" id="order">
                            <h5 class="text-center">Order List</h5>
                            <div class="container">
                                <table class="w-100">
                                    <thead>
                                        <tr>
                                            <th>Invoice No.</th>
                                            <th>Date</th>
                                            <th>Order Status</th>
                                            <th>Payment Status</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order as $item)
                                            <tr>
                                                <td>{{ $item->invoice_no }}</td>
                                                <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                                <td>
                                                    @if ($item->status == 'p')
                                                        Pending
                                                    @elseif($item->status == 'on')
                                                        Processing
                                                    @elseif($item->status == 'w')
                                                        On the way
                                                    @elseif($item->status == 'd')
                                                        Delivered
                                                    @elseif($item->status == 'c')
                                                        Cancel
                                                    @endif
                                                </td>
                                                <td>Pending</td>
                                                <td>৳ {{ $item->total_amount }}</td>
                                                <td class="text-center">
                                                    @if ($item->status == 'p')
                                                        <a href="{{ route('auth.order.delete', $item->id) }}"
                                                            style="font-size: 12px;"> <i
                                                                class="fas fa-trash text-danger"></i></a>
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- order end -->

                        <!------ quote  section start --->
                        <div class="tab-pane container fade" id="quote">
                            <h5 class="text-center">Quotation List</h5>
                            <div class="container">
                                <table class="w-100">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Date</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($quote as $key => $item)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                                <td>৳ {{ $item->total }}</td>
                                                <td>
                                                    <a href="{{ route('quote-details.website', $item->id) }} class="











                                                        btn btn-success">
                                                        <i class="fas fa-eye"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- quote end -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('website-js')
        <script>
            $(document).ready(function() {
                $('#country').select2();
                $('#district').select2();
            });
        </script>
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#previewImage')
                            .attr('src', e.target.result)
                            .width(100);

                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
            document.getElementById("previewImage").src =
                "{{ Auth::guard('customer')->user()->image ? Auth::guard('customer')->user()->image : '/noimage.png' }} ";
        </script>
    @endpush
@endsection
