<?php

    $stripeDashboard=$stripeAllDoctors=$stripeAddDoctors=$stripeAllDoctorsPere=$stripeSecretaries=$stripeAddSecretaries=$stripeSecretariesPere=$stripeAllPatients=$stripeAllPatientsPere=$stripeAddPatients=$stripeAppointments=$stripeAllServices=$stripeProfile='';

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
    }
?>
<div class="header">
			<div class="header-left">
				<a href="index-2.html" class="logo">
					<img src="{{ asset('scrtrDoctorPage/img/logo.png')}}" width="35" height="35" alt=""> <span>Preclinic</span>
				</a>
			</div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
							<img class="rounded-circle" src="{{ asset('scrtrDoctorPage/img/user.jpg')}}" width="24" alt="Admin">
							<span class="status online"></span>
						</span>
						<span>{{$nameUser}}</span>
                    </a>
					<div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{route('profile')}}">My Account</a>
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
                    <a class="dropdown-item" href="{{route('dashboard')}}">My Account</a>
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
                            <a href="{{route('profile')}}"><i class="fa fa-dashboard"></i> <span>Profile</span></a>
                        </li>
                        @if(Auth::user()->user_roles == 'adminM')
						<li >
                            <a class="cusrsor-pointer <?php echo $stripeAllDoctorsPere ?>"><i class="fa fa-user-md"></i> <span>Doctors</span><span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li class="<?php echo $stripeAllDoctors ?>"><a href="{{route('allDoctors')}}">All Doctors</a></li>
                                <li class="<?php echo $stripeAddDoctors ?>"><a href="{{route('addUser',['type'=>'doctor'])}}">Add Doctors</a></li>
                            </ul>
                        </li>
                        <li >
                            <a class="cusrsor-pointer <?php echo $stripeSecretariesPere ?>"><i class="fa fa-user"></i><span>Secretaries</span><span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li class="<?php echo $stripeSecretaries ?>"><a href="{{route('allSecretaries')}}">All Secretaries</a></li>
                                <li class="<?php echo $stripeAddSecretaries ?>"><a href="{{route('addUser',['type'=>'secretaire'])}}">Add Secretaries</a></li>
                            </ul>
                        </li>
                        @endif
                        @if(Auth::user()->user_roles == 'secretaire' || Auth::user()->user_roles == 'doctor' || Auth::user()->user_roles == 'adminM')
                        <li >
                            <a class="cusrsor-pointer <?php echo $stripeAllPatientsPere ?>"><i class="fa fa-wheelchair"></i> <span>Patients</span><span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li class="<?php echo $stripeAllPatients ?>"><a href="{{route('allPatients')}}">All Patients</a></li>
                                @if(Auth::user()->user_roles != 'secretaire')
                                    <li class="<?php echo $stripeAddPatients ?>"><a href="{{route('addUser',['type'=>'patient'])}}">Add Patients</a></li>
                                @endif
                            </ul>
                        </li>
                        @endif
                        <li class="<?php echo $stripeAppointments ?>">
                            <a href="{{route('allAppointments')}}"><i class="fa fa-calendar"></i> <span>Appointments</span></a>
                        </li>
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
						<!--<li class="submenu">
							<a href="#"><i class="fa fa-money"></i> <span> Accounts </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="invoices.html">Invoices</a></li>
								<li><a href="payments.html">Payments</a></li>
								<li><a href="expenses.html">Expenses</a></li>
								<li><a href="taxes.html">Taxes</a></li>
								<li><a href="provident-fund.html">Provident Fund</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#"><i class="fa fa-book"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="salary.html"> Employee Salary </a></li>
								<li><a href="salary-view.html"> Payslip </a></li>
							</ul>
						</li>
                        <li>
                            <a href="chat.html"><i class="fa fa-comments"></i> <span>Chat</span> <span class="badge badge-pill bg-primary float-right">5</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-video-camera camera"></i> <span> Calls</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="voice-call.html">Voice Call</a></li>
                                <li><a href="video-call.html">Video Call</a></li>
                                <li><a href="incoming-call.html">Incoming Call</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-envelope"></i> <span> Email</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="compose.html">Compose Mail</a></li>
                                <li><a href="inbox.html">Inbox</a></li>
                                <li><a href="mail-view.html">Mail View</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-commenting-o"></i> <span> Blog</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="blog-details.html">Blog View</a></li>
                                <li><a href="add-blog.html">Add Blog</a></li>
                                <li><a href="edit-blog.html">Edit Blog</a></li>
                            </ul>
                        </li>
						<li>
							<a href="assets.html"><i class="fa fa-cube"></i> <span>Assets</span></a>
						</li>
						<li>
							<a href="activities.html"><i class="fa fa-bell-o"></i> <span>Activities</span></a>
						</li>
						<li class="submenu">
							<a href="#"><i class="fa fa-flag-o"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="expense-reports.html"> Expense Report </a></li>
								<li><a href="invoice-reports.html"> Invoice Report </a></li>
							</ul>
						</li>
                        <li>
                            <a href="settings.html"><i class="fa fa-cog"></i> <span>Settings</span></a>
                        </li>
                        <li class="menu-title">UI Elements</li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-laptop"></i> <span> Components</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="uikit.html">UI Kit</a></li>
                                <li><a href="typography.html">Typography</a></li>
                                <li><a href="tabs.html">Tabs</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-edit"></i> <span> Forms</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="form-basic-inputs.html">Basic Inputs</a></li>
                                <li><a href="form-input-groups.html">Input Groups</a></li>
                                <li><a href="form-horizontal.html">Horizontal Form</a></li>
                                <li><a href="form-vertical.html">Vertical Form</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-table"></i> <span> Tables</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="tables-basic.html">Basic Tables</a></li>
                                <li><a href="tables-datatables.html">Data Table</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="calendar.html"><i class="fa fa-calendar"></i> <span>Calendar</span></a>
                        </li>
                        <li class="menu-title">Extras</li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-columns"></i> <span>Pages</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="login.html"> Login </a></li>
                                <li><a href="register.html"> Register </a></li>
                                <li><a href="forgot-password.html"> Forgot Password </a></li>
                                <li><a href="change-password2.html"> Change Password </a></li>
                                <li><a href="lock-screen.html"> Lock Screen </a></li>
                                <li><a href="profile.html"> Profile </a></li>
                                <li><a href="gallery.html"> Gallery </a></li>
                                <li><a href="error-404.html">404 Error </a></li>
                                <li><a href="error-500.html">500 Error </a></li>
                                <li><a href="blank-page.html"> Blank Page </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="fa fa-share-alt"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Level 1</span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                                        <li class="submenu">
                                            <a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>
                                            <ul style="display: none;">
                                                <li><a href="javascript:void(0);">Level 3</a></li>
                                                <li><a href="javascript:void(0);">Level 3</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><span>Level 1</span></a>
                                </li>
                            </ul>
                        </li>-->
                    </ul>
                </div>
            </div>
        </div>
