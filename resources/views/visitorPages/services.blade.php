@extends('layouts.app')
@section('content')
<section class="breadcrumb-option spad set-bg" data-setbg="{{ asset('visitorPage/img/breadcrumb-bg.jpg')}}">
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
                @foreach($allservices as $service)
                <div class="col-lg-3 order-lg-2">
                    <div class="services__details">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="services__details__title">
                                    <h3>{{$service->nom}}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="services__details__pic">
                            <img src="{{asset('storage/'.$service->avatar)}}" alt="">
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-lg-3 order-lg-1">
                    <div class="services__sidebar">
                        <div class="services__accordion">
                            <div class="services__title">
                                <h4><img src="{{ asset('visitorPage/img/icons/services-icon.png')}}" alt=""> All services</h4>
                            </div>
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading active">
                                        <a data-toggle="collapse" data-target="#collapseOne">
                                            Specialty
                                        </a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                          <ul>
                                            @foreach($allservices as $ser)
                                              <li><a href="#">{{$ser->nom}}</a></li>
                                            @endforeach
                                          </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
