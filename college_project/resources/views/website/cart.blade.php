@extends('layouts.website')
@push('website-css')
    <link rel="stylesheet" href="{{ asset('website') }}/css/cart.css">
    <style>
        @media (max-width:767px){
   .single-cart-input-field {
    width: 40px;
    margin: 0 15px;
    text-align: center;
    font-weight: 700;
}
}
    </style>
@endpush
@section('website-content')

    <!-- cart-section  section start-->
    <section class="cart-all-section">
        <div class="container custom-container py-3">
            <h3><span>Your Cart ({{\Cart::getContent()->count()}} Items)</span> </h3>
            <div class="row py-3 cart-all-row ">
                <div class="col-lg-9 col-md-9 col-12">
                    <div class="cart-left-side">
                        
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="cart-right-side">
                        <h4>Price Details <span id="cart-item"> {{\Cart::getContent()->count()}} </span><span>Items</span></h4>
                        <h5><span>Subtotal</span> <span>৳ </span><span id="subtotal">{{\Cart::getTotal()}}</span></h5>
                        <h5><span>Shipping</span> <span>৳ 100</span></h5>
                        <div class="total"><span>Total = </span><span id="total">৳ {{\Cart::getTotal()}}</span></div>

                        <div class="cart-btn mt-3">
                            <a href="{{route('checkout')}}" class="btn checkout-btn">Checkout</a>
                            <a href="{{route('home')}}" class="btn shopping-btn">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('website-js')
        <script>
            function increment(id) {
                let url = "/cart/increment/"+id;
                $.ajax({
                    url: url,
                    type: "get",
                    dataType: "json",
                    success: function(res) {
                        toastr.success('Cart Updated Successfully');
                        $('.single-cart-input-field').text(res.quantity);
                        $('#cart-item').text(res.total_item);
                        $('#total').text(res.total_amount);
                        $('#subtotal').text(res.total_amount);
                        var data = '';
                        $.each(res.item,function(key,value){
                            data = data + ' <div class="single-cart d-lg-flex">'
                            data = data + '<div class="single-cart-item-img">'
                            data = data + ' <img src="/'+value.attributes.image+'" alt=""></div>'
                            data = data + '<div class="single-cart-name mx-1"><h5>'+value.name+'</h5></div>'
                            data = data + ' <div class="single-cart-price ms-auto"> <h5>৳'+value.price+'</h5></div>'
                            data = data + ' <div class="cart-increment-decrement text-center px-2">'
                            data = data + ' <div class="d-flex">'
                            data = data + ' <span class="decrement-btn" onclick="decrement('+value.id+')"><i class="fas fa-minus"></i></span> '
                            data = data + ' <input type="text" value="'+value.quantity+'" id="'+value.key+'" name="value" class="single-cart-input-field cart-input" readonly>'
                            data = data + '<span class="increment-btn" onclick="increment('+value.id+')"><i class="fas fa-plus"></i></span> '
                            data = data + ' </div></div> '
                            data = data + '<div class="single-cart-subtotal"><h5>৳'+(value.quantity * value.price)+'</h5></div>'
                            data = data + ' <div class="btn btn-sm mx-1" onclick="cartDelete('+value.id+')"><img src="/website/icon-image/delete.png" alt=""></div> '
                            data = data + '</div>'
                           
                        });

                        $('.cart-left-side').html(data);
                        var data2 = '';
                        $.each(res.item,function(key,value){
                                var url = '/product-details/'+value.attributes.slug;
                                data2 = data2 + '<div class="single-cart-item my-1 d-flex">'
                                data2 = data2 + '<div> <a href="'+url+'" class="text-decoration-none text-black  "><img src="/'+value.attributes.image+'" alt="" class="cart-img me-2"></a></div>'
                                data2 = data2 + '<div> <span class="cart-item-name">'+value.name+'</span><br/>'
                                data2 = data2 + ' <span class="cart-number">'+value.quantity+' x ৳ '+value.price+'</span></div>'
                            
                                data2 = data2 + ' <div class="ms-auto"><button class="btn btn-danger btn-sm" onclick="cartDelete('+value.id+')"><i class="fas fa-trash-alt "></i></button> </div></div>'
                        
                            });
                            data2 = data2 + '<a href="{{route('cart.page')}}" class="btn btn-danger mt-2">View Cart</a>'

                            $('#buy').html(data2);
                          
                        
                    },
                    error: function(err) {
                        toastr.error('Stock have no available');
                    }

                });


            }
        </script>
        <script>
            function decrement(id) {
                let url = "/cart/decrement/"+id;
                $.ajax({
                    url: url,
                    type: "get",
                    dataType: "json",
                    success: function(res) {
                        toastr.success('Cart Updated Successfully');
                        cartPage();
                    },
                    error: function(err) {
                        toastr.error('Stock have no available');
                    }

                });


            }
        </script>
        <script>
        function cartPage(){
            $.ajax({
                    url:"{{route('cart.alldata')}}",
                    type:"get",
                    dataType: "json",
                    success:function(res){
                        var data = '';
                        $.each(res,function(key,value){
                            data = data + ' <div class="single-cart d-flex">'
                            data = data + '<div class="single-cart-item-img">'
                            data = data + ' <img src="/'+value.attributes.image+'" alt=""></div>'
                            data = data + '<div class="single-cart-name mx-2"><h5>'+value.name+'</h5></div>'
                            data = data + ' <div class="single-cart-price ms-auto"> <h5>৳'+value.price+'</h5></div>'
                            data = data + ' <div class="cart-increment-decrement text-center px-2">'
                            data = data + ' <div class="d-flex">'
                            data = data + ' <span class="decrement-btn" onclick="decrement('+value.id+')"><i class="fas fa-minus"></i></span> '
                            data = data + ' <input type="text" value="'+value.quantity+'" id="'+value.key+'" name="value" class="single-cart-input-field cart-input" readonly>'
                            data = data + '<span class="increment-btn" onclick="increment('+value.id+')"><i class="fas fa-plus"></i></span> '
                            data = data + ' </div></div> '
                            data = data + '<div class="single-cart-subtotal"><h5>৳'+(value.quantity * value.price)+'</h5></div>'
                            data = data + ' <div class="btn btn-sm mx-2" onclick="cartDelete('+value.id+')"><img src="/website/icon-image/delete.png" alt="" class="btn-close"></div> '
                            data = data + '</div>'
                           
                        });

                        $('.cart-left-side').html(data);
                        
                        
                    }
            });
        }
        cartPage();

    </script>
        <script>
            function cartcontent() {
                $.ajax({
                    url: "{{ route('cart.content') }}",
                    type: "get",
                    dataType: "json",
                    success: function(res) {
                        $('#cart-item').text(res.total_item);
                        $('#subtotal').text(res.total_amount);
                      
                    }
                })
            }
            cartcontent();
        </script>

      
       
    @endpush
@endsection
