<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('scrtrDoctorPage/img/favicon.ico')}}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts <script src="{{ asset('js/app.js') }}" defer></script>-->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('visitorPage/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('visitorPage/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('visitorPage/css/flaticon.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('visitorPage/css/nice-select.css')}}"type="text/css">
    <!--<link rel="stylesheet" href="{{ asset('visitorPage/css/jquery-ui.min.css')}}" type="text/css">-->
    <link rel="stylesheet" href="{{ asset('visitorPage/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('visitorPage/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('visitorPage/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('visitorPage/css/style.css')}}" type="text/css">
</head>
<body>
    <div id="app">
        <div id="preloder">
            <div class="loader"></div>
        </div>
            @include('layouts.navBar.visitorPageNavBar')
        <main >
            @yield('content')
            @include('layouts.footer.visitorPageFooter')
        </main>
    </div>


    <!-- Js Plugins -->
    <script src="{{ asset('visitorPage/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('scrtrDoctorPage/js/popper.min.js')}}"></script>
    <script src="{{ asset('visitorPage/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('visitorPage/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('visitorPage/js/masonry.pkgd.min.js')}}"></script>
    <script src="{{ asset('visitorPage/js/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('visitorPage/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('visitorPage/js/jquery.slicknav.js')}}"></script>
    <script src="{{ asset('visitorPage/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('visitorPage/js/main.js')}}"></script>
</body>
</html>
