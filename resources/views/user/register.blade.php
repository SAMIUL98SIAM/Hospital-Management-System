@extends('layouts.user.app')

@section('content')
    <div class="page-banner overlay-dark bg-image" style="background-image: url({{asset('user/assets/img/bg_image_1.jpg')}});">
        <div class="banner-section">
        <div class="container text-center wow fadeInUp">
            <nav aria-label="Breadcrumb">
            <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                @if (@Auth::user()->id != Null && @Auth::user()->usertype=='user')
              <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
              @else
              <li class="breadcrumb-item"><a  href="/">Home</a></li>
              @endif
                <li class="breadcrumb-item active" aria-current="page">Registration</li>
            </ol>
            </nav>
            <h1 class="font-weight-normal">Customer Registration</h1>
        </div> <!-- .container -->
        </div> <!-- .banner-section -->
    </div> <!-- .page-banner -->

    <div class="page-section">
        <div class="container">
          <h1 class="text-center wow fadeInUp">Registration</h1>

          <div class="simple-login-container">
            @if (Session::get('message'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>{{Session::get('message')}}</strong>
                </div>
            @endif
            <h2>Registration</h2>
            <form action="{{route('frontend.register.store')}}"  method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12 form-group">
                        <input type="name" name="name" id="name" class="form-control" placeholder="Username">
                    </div>
                    <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                    </div>
                    <font style="color: red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <input type="phone" name="phone" id="phone" class="form-control" placeholder="Phone no">
                    </div>
                    <font style="color: red">{{($errors->has('phone'))?($errors->first('phone')):''}}</font>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <input type="password" name="password" id="password" placeholder="Enter your Password" class="form-control">
                    </div>
                    <font style="color: red">{{($errors->has('password'))?($errors->first('password')):''}}</font>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group">
                        <input type="submit" value="Signup" class="btn btn-block btn-success">
                        <i class="fa fa-user"></i> Have you account ? <a class="btn btn-primary" style="color: black;text-decoration:none;" href="{{route('frontend.login')}}"><span>Login here</span></a>
                    </div>
                </div>
            </form>
        </div>
        </div>
      </div>

      <div class="maps-container wow fadeInUp">
        <div id="google-maps"></div>
    </div>
@endsection
