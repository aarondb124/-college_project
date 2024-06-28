@extends('layouts.website')
@push('website-css')
    <link rel="stylesheet" href="{{ asset('website') }}/css/cart.css">
@endpush
@section('website-content')
    <!-- cart-section  section start-->
    <section class="checkout-section">
        <div class="container customer-container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="checkout-form my-5 card  py-3">
                        <h3 class="text-center text-success">CheckOut </h3>
                        <form action="{{ route('checkout.store') }}" method="post">
                            @csrf
                            <div class="form-group my-1">
                                <label for="">Name:</label>
                                <input type="text" name="customer_name"
                                    value="{{ Auth::guard('customer')->user()->name }}"
                                    class="form-control @error('customer_name') is-invalid @enderror">
                                @error('customer_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group my-1">
                                <label for="">Phone:</label>
                                <input type="text" name="customer_mobile"
                                    value="{{ Auth::guard('customer')->user()->phone }}"
                                    class="form-control @error('customer_mobile') is-invalid @enderror">
                                @error('customer_mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group my-1">
                                <label for="">Email:</label>
                                <input type="text" name="customer_email"
                                    value="{{ Auth::guard('customer')->user()->email }}" placeholder="Enter Email"
                                    class="form-control @error('customer_email') is-invalid @enderror">
                                @error('upazila_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group my-1">
                                <label for="">District:</label>
                                <select name="district_id" id="district_id"
                                    class=" form-control @error('name') is-invalid @enderror">
                                    <option value="">Select District</option>
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
                                    class=" form-control @error('upazila_id') is-invalid @enderror">
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
                                <label for="">Area:</label>
                                <select name="area_id" id="area_id"
                                    class=" form-control @error('area_id') is-invalid @enderror">

                                </select>
                                @error('area_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group my-1">
                                <label for="">Shipping Address:</label>
                                <textarea name="shipping_address" id="" class="form-control @error('name') is-invalid @enderror"
                                    rows="2">{{ Auth::guard('customer')->user()->address }}</textarea>
                            </div>
                            <input type="hidden" id="charge" value="" name="charge">
                            <div class="form-group my-1">
                                <label for="">Billing Address:</label>
                                <textarea name="billing_address" id="" class="form-control @error('name') is-invalid @enderror" rows="2">{{ Auth::guard('customer')->user()->address }}</textarea>
                            </div>
                            <div class="submit d-flex mt-3">
                                <button onclick=myFuction() class="btn checkout-btn" type="submit">Order Place</button>
                                <a href="{{ route('home') }}" class="btn checkout-btn ms-auto bg-danger text-white"
                                    type="submit">Continue to
                                    Shipping</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="order-summery my-5 card  py-3 card">
                        <div class="summery">
                            <h3 class="text-center text-success">Order Summery </h3>
                            <table class="summery-table">
                                <tr>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th class="text-nowrap">Per Price</th>
                                    <th>Price</th>
                                </tr>
                                @foreach (\Cart::getContent() as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td class="text-nowrap">৳ {{ $item->price }}</td>
                                        <td class="text-nowrap">৳ {{ $item->price * $item->quantity }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="2" class="text-end">Shipping Charge = </td>
                                    <td colspan="2">৳ <span class="shipping_charge"></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-end">Total = </td>
                                    <td colspan="2">৳ {{ \Cart::getTotal() }}</td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('website-js')
        <script type="text/javascript">
            //  Get Subject Javascript
            $(document).on("change", "#upazila_id", function() {
                var upazila_id = $("#upazila_id").val();

                $.ajax({
                    url: "{{ route('area.change') }}",
                    type: "GET",
                    data: {
                        upazila_id: upazila_id
                    },
                    success: function(data) {
                        var html = '<option value="">Select Area </option>';
                        $.each(data, function(key, v) {
                            html += '<option value="' + v.id + '">' + v.name + ' </option>';
                        });
                        $("#area_id").html(html);
                    }
                });


            });
        </script>
        <script>
            function myFunction() {
                alart("Thank you for shopping");
            }

            $(document).on("change", "#area_id", function() {
                var area_id = $(this).val();
                console.log(area_id);
                $.ajax({
                    url: "{{ route('area.charge') }}",
                    type: "GET",
                    data: {
                        area_id: area_id
                    },
                    success: function(res) {
                        console.log(res);
                        $('.shipping_charge').text(res);
                        $('#charge').val(res);
                    }
                });


            });
        </script>
    @endpush
@endsection
