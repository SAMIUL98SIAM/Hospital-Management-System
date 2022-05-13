@extends('layouts.user.app')

@section('content')
    @include('layouts.user.partials.slider')

    @include('layouts.user.partials.emoji')

    <div class="page-section pb-0">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6 py-3 wow fadeInUp">
              <h1>Welcome to Your Health <br> Center</h1>
              <p class="text-grey mb-4">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Accusantium aperiam earum ipsa eius, inventore nemo labore eaque porro consequatur ex aspernatur. Explicabo, excepturi accusantium! Placeat voluptates esse ut optio facilis!</p>
              <a href="{{route('user.about-us')}}" class="btn btn-primary">Learn More</a>
            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
              <div class="img-place custom-img-1">
                <img src="{{asset('user/assets/img/bg-doctor.png')}}" alt="">
              </div>
            </div>
          </div>
        </div>
    </div> <!-- .bg-light -->

    <div class="page-section">
        <div class="container">
          <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>

          <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
            <div class="item">
              <div class="card-doctor">
                <div class="header">
                  <img src="{{asset('user/assets/img/doctors/doctor_1.jpg')}}" alt="">
                  <div class="meta">
                    <a href="#"><span class="mai-call"></span></a>
                    <a href="#"><span class="mai-logo-whatsapp"></span></a>
                  </div>
                </div>
                <div class="body">
                  <p class="text-xl mb-0">Dr. Stein Albert</p>
                  <span class="text-sm text-grey">Cardiology</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="card-doctor">
                <div class="header">
                  <img src="{{asset('user/assets/img/doctors/doctor_2.jpg')}}" alt="">
                  <div class="meta">
                    <a href="#"><span class="mai-call"></span></a>
                    <a href="#"><span class="mai-logo-whatsapp"></span></a>
                  </div>
                </div>
                <div class="body">
                  <p class="text-xl mb-0">Dr. Alexa Melvin</p>
                  <span class="text-sm text-grey">Dental</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="card-doctor">
                <div class="header">
                  <img src="{{asset('user/assets/img/doctors/doctor_3.jpg')}}" alt="">
                  <div class="meta">
                    <a href="#"><span class="mai-call"></span></a>
                    <a href="#"><span class="mai-logo-whatsapp"></span></a>
                  </div>
                </div>
                <div class="body">
                  <p class="text-xl mb-0">Dr. Rebecca Steffany</p>
                  <span class="text-sm text-grey">General Health</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="card-doctor">
                <div class="header">
                  <img src="{{asset('user/assets/img/doctors/doctor_3.jpg')}}" alt="">
                  <div class="meta">
                    <a href="#"><span class="mai-call"></span></a>
                    <a href="#"><span class="mai-logo-whatsapp"></span></a>
                  </div>
                </div>
                <div class="body">
                  <p class="text-xl mb-0">Dr. Rebecca Steffany</p>
                  <span class="text-sm text-grey">General Health</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="card-doctor">
                <div class="header">
                  <img src="{{asset('user/assets/img/doctors/doctor_3.jpg')}}" alt="">
                  <div class="meta">
                    <a href="#"><span class="mai-call"></span></a>
                    <a href="#"><span class="mai-logo-whatsapp"></span></a>
                  </div>
                </div>
                <div class="body">
                  <p class="text-xl mb-0">Dr. Rebecca Steffany</p>
                  <span class="text-sm text-grey">General Health</span>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div><!-- .page-section -->


    <div class="page-section bg-light">
        <div class="container">
          <h1 class="text-center wow fadeInUp">Latest News</h1>
          <div class="row mt-5">
            <div class="col-lg-4 py-2 wow zoomIn">
              <div class="card-blog">
                <div class="header">
                  <div class="post-category">
                    <a href="#">Covid19</a>
                  </div>
                  <a href="blog-details.html" class="post-thumb">
                    <img src="{{asset('user/assets/img/blog/blog_1.jpg')}}" alt="">
                  </a>
                </div>
                <div class="body">
                  <h5 class="post-title"><a href="blog-details.html">List of Countries without Coronavirus case</a></h5>
                  <div class="site-info">
                    <div class="avatar mr-2">
                      <div class="avatar-img">
                        <img src="{{asset('user/assets/img/person/person_1.jpg')}}" alt="">
                      </div>
                      <span>Roger Adams</span>
                    </div>
                    <span class="mai-time"></span> 1 week ago
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 py-2 wow zoomIn">
              <div class="card-blog">
                <div class="header">
                  <div class="post-category">
                    <a href="#">Covid19</a>
                  </div>
                  <a href="blog-details.html" class="post-thumb">
                    <img src="{{asset('user/assets/img/blog/blog_2.jpg')}}" alt="">
                  </a>
                </div>
                <div class="body">
                  <h5 class="post-title"><a href="blog-details.html">Recovery Room: News beyond the pandemic</a></h5>
                  <div class="site-info">
                    <div class="avatar mr-2">
                      <div class="avatar-img">
                        <img src="{{asset('user/assets/img/person/person_1.jpg')}}" alt="">
                      </div>
                      <span>Roger Adams</span>
                    </div>
                    <span class="mai-time"></span> 4 weeks ago
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 py-2 wow zoomIn">
              <div class="card-blog">
                <div class="header">
                  <div class="post-category">
                    <a href="#">Covid19</a>
                  </div>
                  <a href="blog-details.html" class="post-thumb">
                    <img src="{{asset('user/assets/img/blog/blog_3.jpg')}}" alt="">
                  </a>
                </div>
                <div class="body">
                  <h5 class="post-title"><a href="blog-details.html">What is the impact of eating too much sugar?</a></h5>
                  <div class="site-info">
                    <div class="avatar mr-2">
                      <div class="avatar-img">
                        <img src="{{asset('user/assets/img/person/person_2.jpg')}}" alt="">
                      </div>
                      <span>Diego Simmons</span>
                    </div>
                    <span class="mai-time"></span> 2 months ago
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 text-center mt-4 wow zoomIn">
              <a href="blog.html" class="btn btn-primary">Read More</a>
            </div>

          </div>
        </div>
    </div> <!-- .page-section -->

    @include('layouts.user.partials.appointment')
@endsection
