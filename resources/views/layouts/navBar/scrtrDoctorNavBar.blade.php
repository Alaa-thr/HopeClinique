<?php

    $stripeDashboard=$stripeAllDoctors=$stripeAddDoctors=$stripeAllDoctorsPere=$stripeSecretaries=$stripeAddSecretaries=$stripeSecretariesPere=$stripeAllPatients=$stripeAllPatientsPere=$stripeAddPatients=$stripeAppointments=$stripeAllServices=$stripeProfile=$stripeAddAppointments='';

    $urlAcctuiel = Route::getCurrentRoute()->uri();
    if($urlAcctuiel == 'dashboard'){
        $stripeDashboard='active';
    }else if($urlAcctuiel == 'allDoctors'){
        $stripeAllDoctors='active';
        $stripeAllDoctorsPere='active';
    }else if($urlAcctuiel == 'addUser/{type}' && $typeUser == "doctor"){
        $stripeAddDoctors='active';
        $stripeAllDoctorsPere='active';
    }else if($urlAcctuiel == 'allSecretaries'){
        $stripeSecretaries='active';
        $stripeSecretariesPere='active';
    }else if($urlAcctuiel == 'addUser/{type}' && $typeUser == "secretaire"){
        $stripeAddSecretaries='active';
        $stripeSecretariesPere='active';
    }else if($urlAcctuiel == 'allPatients'){
        $stripeAllPatients='active';
        $stripeAllPatientsPere='active';
    }else if($urlAcctuiel == 'appointments'){
        $stripeAppointments='active';
    }else if($urlAcctuiel == 'allServices'){
        $stripeAllServices='active';
    }else if($urlAcctuiel == 'addUser/{type}' && $typeUser == "patient"){
        $stripeAddPatients='active';
        $stripeAllPatientsPere='active';
    }else if($urlAcctuiel == 'profile'){
        $stripeProfile='active';
    }else if($urlAcctuiel == 'addAppointment'){
        $stripeAddAppointments='active';
    }
?>
<div class="header">
            <div class="header-left">
                <a href="/" class="logo">
                    <img src="{{ asset('scrtrDoctorPage/img/logo.png')}}" width="35" height="35" alt=""> <span>Preclinic</span>
                </a>
            </div>
            <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        @foreach($users as $user)
                            <span class="user-img">
                                <img class="rounded-circle" src="{{ asset('storage/'.$user->avatar)}}" width="24" alt="Admin">
                            </span>
                            <span>{{$user->nom}} {{$user->prenom}}</span>
                        @endforeach
                        
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        @if(Auth::user()->user_roles == 'doctor' || Auth::user()->user_roles == 'secretaire')
                            <a class="dropdown-item" href="{{route('profile')}}">My Account</a>
                        @elseif(Auth::user()->user_roles == 'adminM')
                            <a class="dropdown-item" href="{{route('dashboard')}}">My Account</a>
                        @endif
                        <a class="dropdown-item" href="settings.html">Settings</a>
                        <div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    @if(Auth::user()->user_roles == 'doctor' || Auth::user()->user_roles == 'secretaire')
                        <a class="dropdown-item" href="{{route('profile')}}">My Account</a>
                    @elseif(Auth::user()->user_roles == 'adminM')
                        <a class="dropdown-item" href="{{route('dashboard')}}">My Account</a>
                    @endif
                    <a class="dropdown-item" href="settings.html">Settings</a>
                    <div  class="m-t--15">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        @if(Auth::user()->user_roles == 'doctor' || Auth::user()->user_roles == 'adminM')
                        <li class="<?php echo $stripeDashboard ?>">
                            <a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
                        @endif
                        <li class="<?php echo $stripeProfile ?>">
                            <a href="{{route('profile')}}"><i class="fa fa-user"></i> <span>Profile</span></a>
                        </li>
                        @if(Auth::user()->user_roles == 'adminM')
                        <li >
                            <a class="cusrsor-pointer <?php echo $stripeAllDoctorsPere ?>"><i class="fa fa-user-md"></i> <span>Doctors</span><span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li class="<?php echo $stripeAllDoctors ?>"><a href="{{route('allDoctors')}}">All Doctors</a></li>
                                <li class="<?php echo $stripeAddDoctors ?>"><a href="{{route('addUser',['type'=>'doctor'])}}">Add Doctors</a></li>
                            </ul>
                        </li>
                        @endif
                        @if(Auth::user()->user_roles == 'secretaire')
                        <li >
                            <a class="cusrsor-pointer <?php echo $stripeAllDoctorsPere ?>" href="{{route('allDoctors')}}"><i class="fa fa-user-md"></i> <span>Doctors</span></a>
                            
                        </li>
                        @endif
                        @if(Auth::user()->user_roles == 'adminM')
                        <li >
                            <a class="cusrsor-pointer <?php echo $stripeSecretariesPere ?>"><i class="fa fa-user"></i><span>Secretaries</span><span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li class="<?php echo $stripeSecretaries ?>"><a href="{{route('allSecretaries')}}">All Secretaries</a></li>
                                <li class="<?php echo $stripeAddSecretaries ?>"><a href="{{route('addUser',['type'=>'secretaire'])}}">Add Secretaries</a></li>
                            </ul>
                        </li>
                        @endif
                        @if(Auth::user()->user_roles == 'secretaire' || Auth::user()->user_roles == 'adminM')
                        <li >
                            <a class="cusrsor-pointer <?php echo $stripeAllPatientsPere ?>"><i class="fa fa-wheelchair"></i> <span>Patients</span><span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li class="<?php echo $stripeAllPatients ?>"><a href="{{route('allPatients')}}">All Patients</a></li>
                                @if(Auth::user()->user_roles == 'secretaire' || Auth::user()->user_roles == 'adminM')
                                    <li class="<?php echo $stripeAddPatients ?>"><a href="{{route('addUser',['type'=>'patient'])}}">Add Patients</a></li>
                                @endif
                            </ul>
                        </li>
                        @elseif(Auth::user()->user_roles == 'doctor')
                        <li >
                            <a class="cusrsor-pointer <?php echo $stripeAllPatientsPere ?>" href="{{route('allPatients')}}"><i class="fa fa-wheelchair"></i> <span>Patients</span></a>
                        </li>
                        @endif
                        @if(Auth::user()->user_roles == 'doctor' || Auth::user()->user_roles == 'secretaire' || Auth::user()->user_roles == 'adminM')
                        <li class="<?php echo $stripeAppointments ?>">
                            <a href="{{route('allAppointments')}}"><i class="fa fa-calendar"></i> <span>All Appointments</span></a>
                        </li>
                        <li class="<?php echo $stripeAddAppointments ?>">
                            <a href="{{route('addAppointment')}}"><i class="fa fa-plus"></i> <span>Add Appointment</span></a>
                        </li>
                        @endif
                        @if(Auth::user()->user_roles == 'adminM')
                        <li class="<?php echo $stripeAllServices ?>">
                            <a href="{{route('allservices')}}"><i class="fa fa-hospital-o"></i> <span>Services</span></a>
                        </li>
                        <li class="submenu">
                            <a class="cusrsor-pointer" ><i class="fa fa-article"></i> <span> Blogs </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="{{route('allblogs')}}">All Blogs</a></li>
                                <li><a href="{{route('detailsBlog')}}">Add Blog</a></li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
