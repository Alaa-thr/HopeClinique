@extends('layouts.app')
@section('content')
<section class="breadcrumb-option spad set-bg" data-setbg="" id="section">
        <div id="serviceImg">
          <img src="{{ asset('visitorPage/img/team/ourService.png')}}" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Our Services</h2>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <span>Services</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
    <!-- Breadcrumb Section End -->

    <!-- Services Section Begin -->
    <section class="services-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 order-lg-2">
                    <div class="services__details">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="services__details__title">
                                    <span>Facial procedures</span>
                                    <h3>Min Facelift</h3>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="services__details__widget">
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <h3>$ 159.50</h3>
                                </div>
                            </div>
                        </div>
                        <div class="services__details__pic">
                            <img src="{{ asset('visitorPage/img/services/services-details.jpg')}}" alt="">
                        </div>


                    </div>
                </div>
                <div class="col-lg-4 order-lg-1">
                    <div class="services__sidebar">
                        <div class="services__accordion">
                            <div class="services__title">
                                <h4><img src="{{ asset('visitorPage/img/icons/services-icon.png')}}" alt=""> All services</h4>
                            </div>
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading active">
                                        <a data-toggle="collapse" data-target="#collapseOne">
                                            Facial Procedures
                                        </a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul>
                                                <li><a href="#">Facelift</a></li>
                                                <li><a href="#">Mini facelift</a></li>
                                                <li><a href="#">Eyelid lift</a></li>
                                                <li><a href="#">Brow lift</a></li>
                                                <li><a href="#">Rhinoplasty</a></li>
                                                <li><a href="#">Chin implants</a></li>
                                                <li><a href="#">Facial fillers</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseTwo">
                                            Body Procedures
                                        </a>
                                    </div>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul>
                                                <li><a href="#">Facelift</a></li>
                                                <li><a href="#">Mini facelift</a></li>
                                                <li><a href="#">Eyelid lift</a></li>
                                                <li><a href="#">Brow lift</a></li>
                                                <li><a href="#">Rhinoplasty</a></li>
                                                <li><a href="#">Chin implants</a></li>
                                                <li><a href="#">Facial fillers</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseThree">
                                            Breast procedures
                                        </a>
                                    </div>
                                    <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul>
                                                <li><a href="#">Facelift</a></li>
                                                <li><a href="#">Mini facelift</a></li>
                                                <li><a href="#">Eyelid lift</a></li>
                                                <li><a href="#">Brow lift</a></li>
                                                <li><a href="#">Rhinoplasty</a></li>
                                                <li><a href="#">Chin implants</a></li>
                                                <li><a href="#">Facial fillers</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseFour">
                                            Buttocks
                                        </a>
                                    </div>
                                    <div id="collapseFour" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul>
                                                <li><a href="#">Facelift</a></li>
                                                <li><a href="#">Mini facelift</a></li>
                                                <li><a href="#">Eyelid lift</a></li>
                                                <li><a href="#">Brow lift</a></li>
                                                <li><a href="#">Rhinoplasty</a></li>
                                                <li><a href="#">Chin implants</a></li>
                                                <li><a href="#">Facial fillers</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseFive">
                                            Skin care
                                        </a>
                                    </div>
                                    <div id="collapseFive" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul>
                                                <li><a href="#">Facelift</a></li>
                                                <li><a href="#">Mini facelift</a></li>
                                                <li><a href="#">Eyelid lift</a></li>
                                                <li><a href="#">Brow lift</a></li>
                                                <li><a href="#">Rhinoplasty</a></li>
                                                <li><a href="#">Chin implants</a></li>
                                                <li><a href="#">Facial fillers</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="services__appoinment">
                        <div class="services__title">
                            <h4><img src="{{ asset('visitorPage/img/icons/services-icon.png')}}" alt=""> Get an appointment</h4>
                        </div>
                            <button type="submit" class="site-btn">Book appoitment</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
