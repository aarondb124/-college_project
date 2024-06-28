
@extends('layouts.website')
@section('website-content')

<section class="login-section">
    <div class="container custom-container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-12">
                <div class="card login-form">
                    <form action="{{route('customer.register')}}" method="POST">
                        @csrf
                        <h2 class="text-center">Registration Form</h2>
                        <div class="form-group my-1">
                            <label for="">Name:</label>
                            <input type="text" name="name" value="{{old('name')}}" placeholder="Enter Name" class="form-control login-field @error('name') is-invalid @enderror" autocomplete="off" >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group my-1">
                            <label for="">Phone:</label>
                            <input type="text" name="phone" placeholder="Enter Phone" class="form-control login-field  @error('phone') is-invalid @enderror" autocomplete="off" >
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group my-1">
                            <label for="">Password:</label>
                            <input type="password" name="password" placeholder="Enter Password" class="form-control login-field  @error('password') is-invalid @enderror" autocomplete="off">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group my-1">
                            <label for="">Retypre Password:</label>
                            <input type="password" name="cpassword" placeholder="Retype Password" class="form-control login-field" autocomplete="off">
                        </div>
                        <div class="d-flex mt-3">
                            <input type="submit" class="btn btn-danger" value="Sign Up">
                            <a href="{{route('customer.login')}}" class="btn btn-success ms-auto">Login</a>
                        </div>
                        
                    </form>
                </div>
               
            </div>
        </div>
    </div>
</section>



@endsection
