@extends('layouts.app')
@section('content')
<section class="breadcrumb-option spad set-bg" data-setbg="{{ asset('visitorPage/img/breadcrumb-bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>About Us</h2>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <span>About</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section Begin -->
    <section class="about spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="about__video set-bg" data-setbg="{{ asset('visitorPage/img/about-video.jpg')}}">
                        
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="about__text">
                        <div class="section-title">
                            <span>ABOUT OUR CLINIC</span>
                            <h2>Welcom to the Aesthetic</h2>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.</p>
                        <ul>
                            <li><i class="fa fa-check-circle"></i> Routine and medical care</li>
                            <li><i class="fa fa-check-circle"></i> Excellence in Healthcare every</li>
                            <li><i class="fa fa-check-circle"></i> Building a healthy environment</li>
                        </ul>
                        <a href="{{route('contact')}}" class="primary-btn normal-btn">Contact us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Chooseus Section Begin -->
    <section class="testimonials spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <span>Why choose us?</span>
                        <h2>Offer for you</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="chooseus__item">
                        <img src="{{ asset('visitorPage/img/icons/ci-1.png')}}" alt="">
                        <h5>Advanced equipment</h5>
                        <p>Lorem ipsum amet, consectetur adipiscing elit, sed do eiusmod tempor cididunt facilisis.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="chooseus__item">
                        <img src="{{ asset('visitorPage/img/icons/ci-2.png')}}" alt="">
                        <h5>Qualified doctors</h5>
                        <p>Lorem ipsum amet, consectetur adipiscing elit, sed do eiusmod tempor cididunt facilisis.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="chooseus__item">
                        <img src="{{ asset('visitorPage/img/icons/ci-3.png')}}" alt="">
                        <h5>Certified services</h5>
                        <p>Lorem ipsum amet, consectetur adipiscing elit, sed do eiusmod tempor cididunt facilisis.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="chooseus__item">
                        <img src="{{ asset('visitorPage/img/icons/ci-4.png')}}" alt="">
                        <h5>Emergency care</h5>
                        <p>Lorem ipsum amet, consectetur adipiscing elit, sed do eiusmod tempor cididunt facilisis.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Chooseus Section End -->
    <section class="team spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="section-title">
                            <span>Our Team</span>
                            <h2>Our Expert Doctors</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                  @foreach($listeM as $doctor)
                  <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="team__item">
                          <img src="{{asset('storage/'.$doctor->avatar)}}" alt="user"/>
                            <h5>{{strtoupper ($doctor->nom ) }} {{strtoupper ($doctor->prenom) }}</h5>
                            <span>{{ $doctor->specialite }}</span>
                            <div class="team__item__social">
                                  <i class="fa fa-google"></i> {{ $doctor->email }}<br/>
                                  <i class="fa fa-phone"></i> {{ $doctor->phone }}
                            </div>
                        </div>
                    </div>
                  @endforeach
                </div>
            </div>
        </section>
@endsection
