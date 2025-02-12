@extends('frontEnd.master')
@section('title')
    Customer Login Registration
@endsection
@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Login Registration Page</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"><h4 class="text-center">Login Form</h4></div>
                        <div class="card-body">
                            <h4>{{session('message')}}</h4>
                            <form action="{{route('customer.login')}}" method="POST">
                                @csrf
                                    <div class="form-group row">
                                        <label class="col-md-4">Email Address</label>
                                        <div class="col-md-8">
                                            <input type="email" class="form-control" name="email"/>
                                            <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">Password</label>
                                        <div class="col-md-8">
                                            <input type="password" class="form-control" name="password"/>
                                            <span class="text-danger">{{$errors->has('password') ? $errors->first('password') : ''}}</span>

                                        </div>
                                    </div>
                                <div class="form-group row">
                                    <label class="col-md-4"></label>
                                    <div class="col-md-8">
                                        <input type="submit" class="btn btn-success px-5" value="Login"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"><h4 class="text-center">Registration Form</h4></div>
                        <div class="card-body">
                            <form action="{{route('customer.register')}}" method="POST">
                                @csrf
                                    <div class="form-group row">
                                        <label class="col-md-4">Full Name</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="name"/>
                                            <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">Email Address</label>
                                        <div class="col-md-8">
                                            <input type="email" class="form-control" name="email"/>
                                            <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                                        </div>
                                    </div>
                                <div class="form-group row">
                                    <label class="col-md-4">Password</label>
                                    <div class="col-md-8">
                                        <input type="password" class="form-control" name="password"/>
                                        <span class="text-danger">{{$errors->has('password') ? $errors->first('password') : ''}}</span>
                                    </div>
                                </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">Mobile Number</label>
                                        <div class="col-md-8">
                                            <input type="number" class="form-control" name="mobile"/>
                                            <span class="text-danger">{{$errors->has('mobile') ? $errors->first('mobile') : ''}}</span>

                                        </div>
                                    </div>
                                <div class="form-group row">
                                    <label class="col-md-4"></label>
                                    <div class="col-md-8">
                                        <input type="submit" class="btn btn-success px-5" value="Register Now"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
