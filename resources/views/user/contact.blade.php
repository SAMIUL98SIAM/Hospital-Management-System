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
                <li class="breadcrumb-item active" aria-current="page">Appointment</li>
            </ol>
            </nav>
            <h1 class="font-weight-normal">Appointment</h1>
        </div> <!-- .container -->
        </div> <!-- .banner-section -->
    </div> <!-- .page-banner -->

    @include('layouts.user.partials.appointment')
@endsection
