<!-- Offcanvas Menu Begin -->
    <?php

        $stripeHome=$stripeService=$stripeDoctor=$stripeBlog=$stripeAbout=$stripeContact='';
                
        $urlAcctuiel = Route::getCurrentRoute()->uri();
        if($urlAcctuiel == 'welcome' || $urlAcctuiel == '/'){
            $stripeHome='active';
        }else if($urlAcctuiel == 'services'){
            $stripeService='active';
        }else if($urlAcctuiel == 'doctors'){
            $stripeDoctor='active';
        }else if($urlAcctuiel == 'blogs'){
            $stripeBlog='active';
        }else if($urlAcctuiel == 'about'){
            $stripeAbout='active';
        }else if($urlAcctuiel == 'contact'){
            $stripeContact='active';
        }else if($urlAcctuiel == 'bolgDetails'){
            $stripeBlog='active';
        }
    ?>
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__logo">
            <a href="/"><img src="{{ asset('visitorPage/img/logo.png')}}" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__btn">
            <a href="#" class="primary-btn">Appointment</a>
        </div>
        <ul class="offcanvas__widget">
            <li><i class="fa fa-phone"></i> 1-677-124-44227</li>
            <li><i class="fa fa-map-marker"></i> Los Angeles Gournadi, 1230 Bariasl</li>
            <li><i class="fa fa-clock-o"></i> Mon to Sat 9:00am to 18:00pm</li>
        </ul>
        <div class="offcanvas__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-dribbble"></i></a>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <ul class="header__top__left">
                            <li><i class="fa fa-phone"></i> 1-677-124-44227</li>
                            <li><i class="fa fa-map-marker"></i> Los Angeles Gournadi, 1230 Bariasl</li>
                            <li><i class="fa fa-clock-o"></i> Mon to Sat 9:00am to 18:00pm</li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <div class="header__top__right">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="/"><img src="{{ asset('visitorPage/img/logo.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="header__menu__option">
                        <nav class="header__menu">
                            <ul>
                                <li class="<?php echo $stripeHome ?>"><a href="/">Home</a></li>
                                <li class="<?php echo $stripeService ?>"><a href="{{route('services')}}">Services</a></li>
                                <li class="<?php echo $stripeDoctor ?>"><a href="{{route('doctors')}}">Doctors</a></li>
                                <li class="<?php echo $stripeBlog ?>"><a href="{{route('blogs')}}">Blog</a></li>
                                <li class="<?php echo $stripeAbout ?>"><a href="{{route('about')}}">About</a></li>
                                <li class="<?php echo $stripeContact ?>"><a href="{{route('contact')}}">Contact Us</a></li>
                                <!--<li><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="./pricing.html">Pricing</a></li>
                                        <li><a href="{{route('bolgDetails')}}">Blog Details</a></li>
                                    </ul>
                                </li>-->
                            </ul>
                        </nav>
                        <div class="header__btn">
                            <a href="#" class="primary-btn">Appointment</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
