@extends('layouts.app')
@section('content')
    <!-- Hero Section Begin -->
    <section class="hero spad set-bg" data-setbg="{{ asset('visitorPage/img/hero-bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero__text">
                        <span>Eiusmod tempor incididunt </span>
                        <h2>Take the world's best quality Treadment</h2>
                        <a href="#" class="primary-btn normal-btn">Contact us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Consultation Section Begin -->
    <section class="consultation">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="consultation__form">
                        <div class="section-title">
                            <span>REQUEST FOR YOUR</span>
                            <h2>Consultation</h2>
                        </div>
                        <form action="#">
                            <input type="text" placeholder="Name">
                            <input type="text" placeholder="Email">
                            <div class="datepicker__item">
                                <input type="text" placeholder="Date" class="datepicker">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <select>
                                <option value="">Type of service</option>
                                <option value="">Advanced equipment</option>
                                <option value="">Qualified doctors</option>
                                <option value="">Certified services</option>
                                <option value="">Emergency care</option>
                            </select>
                            <button type="submit" class="site-btn">Book appoitment</button>
                        </form>
                    </div>
                </div>
              </div>
        </div>
    </section>
    <!-- Consultation Section End -->

    <!-- Chooseus Section Begin -->
    <section class="chooseus spad">
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

    <!-- Services Section Begin -->
    <section class="services spad set-bg" data-setbg="{{ asset('visitorPage/img/services-bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-6">
                    <div class="section-title">
                        <span>Our services</span>
                        <h2>Offer for you</h2>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="services__btn">
                        <a href="{{ url('contact/')}}" class="primary-btn">Contact us</a>
                    </div>
                </div>
            </div>
            <div class="row">
              @foreach($allservices as $ser)
              <div class="col-lg-3 order-lg-2">
                  <div class="services__details">
                      <div class="row">
                          <div class="col-lg-6 col-md-6 col-sm-6">
                              <div class="services__details__title">
                                  <h3>{{$ser->nom}}</h3>
                              </div>
                          </div>
                      </div>
                      <div class="services__details__pic">
                          <img src="{{asset('storage/'.$ser->avatar)}}" alt="">
                      </div>
                  </div>
              </div>
              @endforeach
            </div>
        </div>
    </section>
    <!-- Services Section End -->
    <!-- Team Section Begin -->
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
        <!-- Team Section End -->


    <!-- Latest News Begin -->
    <section class="services spad set-bg" data-setbg="{{ asset('visitorPage/img/services-bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-6">
                    <div class="section-title">
                        <span>Our Blogs</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="services__btn">
                        <a href="{{ url('blogs/')}}" class="primary-btn">Read More</a>
                    </div>
                </div>
            </div>
            <!-- Gallery Begin -->
   <div class="gallery">
       <div class="gallery__container">
           <div class="grid-sizer"></div>
           @foreach($blogs as $b)
           <div class="gc__item set-bg" data-setbg="{{asset('storage/'.$b->avatr)}}">
               <a href="{{asset('storage/'.$b->avatr)}}" class="image-popup"><i class="fa fa-search-plus"></i></a>
               <a href="{{ url('detailsBlog/'.$b->id)}}" class="read-more"><i class="fa fa-long-arrow-right"></i> Read More</a>
           </div>
           @endforeach
       </div>
   </div>
   <!-- Gallery End -->
        </div>
    </section>
@endsection
