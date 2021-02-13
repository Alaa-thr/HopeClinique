@extends('layouts.app')
@section('content')
<!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option spad set-bg" data-setbg="" id="section">
            <div id="serviceImg">
              <img src="{{ asset('visitorPage/img/team/ourDoctors.jpg')}}" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>Our Doctors</h2>
                            <div class="breadcrumb__links">
                                <a href="/">Home</a>
                                <span>Doctors</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Doctor Section Begin -->
    <section class="doctor spad">
        <div class="container">
            @foreach($listeM as $doctor)
            @if( $doctor->id %2 != 0)
            <div class="doctor__item">
                <div class="row">
                    <div class="col-lg-6 order-lg-5">
                        <div class="doctor__item__pic">
                            <img src="{{asset('storage/'.$doctor->avatar)}}" alt="user"/>
                        </div>
                    </div>
                    <div class="col-lg-6 order-lg-6">
                        <div class="doctor__item__text">
                            <span>{{ $doctor->specialite }}</span>
                            <h2>Dr {{strtoupper ($doctor->nom ) }} {{strtoupper ($doctor->prenom) }}</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices
                            gravida. Risus commodo viverra maecenas accumsan.sis. </p>
                            <ul>
                                <li><i class="fa fa-google"></i> {{ $doctor->email }}</li>
                                <li><i class="fa fa-phone"></i> {{ $doctor->phone }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="doctor__item">
                <div class="row">
                    <div class="col-lg-6 order-lg-8">
                        <div class="doctor__item__pic">
                            <img src="{{asset('storage/'.$doctor->avatar)}}" alt="user"/>
                        </div>
                    </div>
                    <div class="col-lg-6 order-lg-5">
                        <div class="doctor__item__text doctor__item__text--left" id="leftDoctor">
                            <span>{{ $doctor->specialite }}</span>
                            <h2>Dr {{strtoupper ($doctor->nom ) }} {{strtoupper ($doctor->prenom) }}</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices
                            gravida. Risus commodo viverra maecenas accumsan.sis. </p>
                            <ul>
                                <li><i class="fa fa-google"></i> {{ $doctor->email }}</li>
                                <li><i class="fa fa-phone"></i> {{ $doctor->phone }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </section>
@endsection
