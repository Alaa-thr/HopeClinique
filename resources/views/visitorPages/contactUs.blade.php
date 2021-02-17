@extends('layouts.app')
@section('content')
<!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option spad set-bg" data-setbg="{{ asset('visitorPage/img/breadcrumb-bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Contact Us</h2>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <span>Contact</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact spad" style="margin-bottom: 30px">
        <div class="container">
            <div class="row" style="margin-bottom: 15px">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="contact__widget">
                        <div class="contact__widget__icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="contact__widget__text">
                            <h5>Address</h5>
                            <p>Los Angeles Gournadi, 1230 Bariasl</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 15px">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="contact__widget">
                        <div class="contact__widget__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="contact__widget__text">
                            <h5>Hotline</h5>
                            <p>+213-540-844-782 • +213-650-844-783</p>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="contact__widget">
                        <div class="contact__widget__icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="contact__widget__text">
                            <h5>Email</h5>
                            <p>Support@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection