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
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              @endif
                <li class="breadcrumb-item active" aria-current="page">Login</li>
            </ol>
            </nav>
            <h1 class="font-weight-normal">Customer Login</h1>
        </div> <!-- .container -->
        </div> <!-- .banner-section -->
    </div> <!-- .page-banner -->

    <div class="page-section">
        <div class="container">
          <h1 class="text-center wow fadeInUp">Login</h1>

          <div class="simple-login-container">
            @if (Session::get('message'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>{{Session::get('message')}}</strong>
                </div>
            @endif
            <h2>Login</h2>
            <form action="{{ route('frontend.login.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12 form-group">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                    </div>
                    <font style="color: red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <input type="password" name="password" id="password" placeholder="Enter your Password" class="form-control">
                    </div>
                    <font style="color: red">{{($errors->has('password'))?($errors->first('password')):''}}</font>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <input type="submit" value="Login" class="btn btn-block btn-success">
                        <i class="fa fa-user"></i> No Account yet ? <a class="btn btn-sm btn-primary" style="color: black;text-decoration:none;" href="{{route('frontend.register')}}"><span>SignUp new account</span></a>
                    </div>
                </div>
            </form>
        </div>
        </div>
      </div>
@endsection
