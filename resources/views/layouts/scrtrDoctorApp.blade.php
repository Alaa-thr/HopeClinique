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
    <link rel="stylesheet" href="{{ asset('visitorPage/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('visitorPage/css/font-awesome.min.css')}}" type="text/css">   
    <link rel="stylesheet" href="{{ asset('scrtrDoctorPage/css/style.css')}}" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @if(Route::getCurrentRoute()->uri() == 'allPatients' || Route::getCurrentRoute()->uri() == 'allDoctors' || Route::getCurrentRoute()->uri() == 'allSecretaries' || Route::getCurrentRoute()->uri() == 'allServices' || Route::getCurrentRoute()->uri() == 'addUser/{type}' || Route::getCurrentRoute()->uri() == 'editProfile' || Route::getCurrentRoute()->uri() == 'addAppointment'|| Route::getCurrentRoute()->uri() == 'appointments' || Route::getCurrentRoute()->uri() == 'addAppointment/{id}')
        <link rel="stylesheet" type="text/css" href="{{ asset('scrtrDoctorPage/css/select2.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('scrtrDoctorPage/css/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('scrtrDoctorPage/css/bootstrap-datetimepicker.min.css')}}">
    @endif
</head>
<body>
    <div id="app">
      
         <div class="main-wrapper">
                @include('layouts.navBar.scrtrDoctorNavBar')
            <main >
                @yield('content')
            </main>
        </div>
    </div>


    <!-- Js Plugins -->  
    <script src="{{ asset('scrtrDoctorPage/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{ asset('scrtrDoctorPage/js/popper.min.js')}}"></script>
    <script src="{{ asset('visitorPage/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('scrtrDoctorPage/js/jquery.slimscroll.js')}}"></script> 
    <script src="{{ asset('scrtrDoctorPage/js/Chart.bundle.js')}}"></script> 
    @if(Route::getCurrentRoute()->uri() == 'dashboard')
        <script src="{{ asset('scrtrDoctorPage/js/chart.js')}}"></script>;
    @elseif(Route::getCurrentRoute()->uri() == 'allPatients' || Route::getCurrentRoute()->uri() == 'allDoctors' || Route::getCurrentRoute()->uri() == 'allSecretaries' || Route::getCurrentRoute()->uri() == 'allServices'|| Route::getCurrentRoute()->uri() == 'addUser/{type}' || Route::getCurrentRoute()->uri() == 'editProfile' || Route::getCurrentRoute()->uri() == 'addAppointment'|| Route::getCurrentRoute()->uri() == 'appointments' || Route::getCurrentRoute()->uri() == 'addAppointment/{id}')
        <script src="{{ asset('scrtrDoctorPage/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('scrtrDoctorPage/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{ asset('scrtrDoctorPage/js/moment.min.js')}}"></script>
        <script src="{{ asset('scrtrDoctorPage/js/bootstrap-datetimepicker.min.js')}}"></script>
        <script src="{{ asset('scrtrDoctorPage/js/select2.min.js')}}"></script>
    @endif
    <script src="{{ asset('scrtrDoctorPage/js/app.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#patientSelect").select2({ maximumSelectionLength: 1 });
            $("#doctorSelect").select2({ maximumSelectionLength: 1 });
        });
    </script>
</body>
</html>
