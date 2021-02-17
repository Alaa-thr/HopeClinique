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
        
        <div class="offcanvas__btn">
            @guest
            <a href="{{route('login')}}" class="primary-btn">Login</a>
            @else
            <ul class="nav user-menu">
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown" >
                        <span class="user-img m-l--13">
                            <img class="rounded-circle" src="{{ asset('storage/'.$users[0]->avatar)}}" width="24" alt="Admin">
                            <span class="status online"></span>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        @if(Auth::user()->user_roles == 'doctor' || Auth::user()->user_roles == 'secretaire')
                            <a class="dropdown-item" href="{{route('profile')}}">My Account</a>
                        @elseif(Auth::user()->user_roles == 'adminM')
                            <a class="dropdown-item" href="{{route('dashboard')}}">My Account</a>
                        @endif
                        <a class="dropdown-item" href="settings.html">Settings</a>
                        <div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
            @endguest
            <div id="mobile-menu-wrap"></div>
            <ul class="header__menu" style="display: none; margin-top: -22px">
                <li><a href="{{route('contact')}}">Appointment</a></li>
            </ul>
        </div>
        <hr style="background-color: black">
        <ul class="offcanvas__widget">
            <li><i class="fa fa-phone"></i> +213-540-844-782</li>
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
                            <li><i class="fa fa-phone"></i> +213-540-844-782</li>
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
                                <li class="<?php echo $stripeContact ?>"><a href="{{route('contact')}}">Contact</a></li>
                                
                            </ul>
                        </nav>
                        <div class="header__btn">
                            <a href="{{route('contact')}}" class="primary-btn m-r-8 m-l-10">Appointment</a>
                            @guest
                            <a href="{{route('login')}}" class="primary-btn">Login</a>
                            @else
                            <ul class="nav user-menu float-right">
                                <li class="nav-item dropdown has-arrow">
                                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                                        <span class="user-img">
                                            <img class="rounded-circle" src="{{ asset('storage/'.$users[0]->avatar)}}" width="24" alt="Admin">
                                            <span class="status online"></span>
                                        </span>
                                    </a>
                                    <div class="dropdown-menu">
                                        @if(Auth::user()->user_roles == 'doctor' || Auth::user()->user_roles == 'secretaire')
                                            <a class="dropdown-item" href="{{route('profile')}}">My Account</a>
                                        @elseif(Auth::user()->user_roles == 'adminM')
                                            <a class="dropdown-item" href="{{route('dashboard')}}">My Account</a>
                                        @endif
                                        <a class="dropdown-item" href="settings.html">Settings</a>
                                        <div>
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            @endguest
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
