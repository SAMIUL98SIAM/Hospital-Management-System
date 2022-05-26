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
                <li class="breadcrumb-item active" aria-current="page">Apppointment</li>
            </ol>
            </nav>
            <h1 class="font-weight-normal">{{Auth::user()->name}}'s' Apppointmen List</h1>
        </div> <!-- .container -->
        </div> <!-- .banner-section -->
    </div> <!-- .page-banner -->
    <div class="page-section">
        <div class="container">
            <div align="center" style="padding:75px;">
                <table border="3">
                    <tr style="background-color: #000">
                        <th style="padding:10px;font-size:20px;color:white;">Doctor Name</th>
                        <th style="padding:10px;font-size:20px;color:white;">Date</th>
                        <th style="padding:10px;font-size:20px;color:white;">Message</th>
                        <th style="padding:10px;font-size:20px;color:white;">Status</th>
                        <th style="padding:10px;font-size:20px;color:white;">Cancel Appointment</th>
                    </tr>

                    @foreach ($appoints as $item)
                    <tr style="background-color: #000">
                        <td style="padding:10px;font-size:20px;color:white;">{{$item->doctor}}</td>
                        <td style="padding:10px;font-size:20px;color:white;">{{$item->date}}</td>
                        <td style="padding:10px;font-size:20px;color:white;">{{$item->message}}</td>
                        <td style="padding:10px;font-size:20px;color:white;">{{$item->status}}</td>
                        <td style="text-align: center;">
                            <a class="btn btn-danger" href="{{route('user.appointment.cancel',$item->id)}}">Cancel</a>
                        </td>
                    </tr>
                    @endforeach

                </table>

            </div>
        </div>
    </div>


@endsection
