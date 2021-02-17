@extends('layouts.scrtrDoctorApp')
@section('content')

		<div class="page-wrapper">
       <div class="content">
                <div class="row">
                    <div class="col-sm-7 col-6">
                        <h4 class="page-title">My Profile</h4>
                    </div>
										@if(Auth::user()->user_roles == 'doctor'|| Auth::user()->user_roles == 'adminM')
                    <div class="col-sm-5 col-6 text-right m-b-30">
                        <a href="{{route('editProfile')}}" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Edit Profile</a>
                    </div>
										@endif
                </div>
                <div class="card-box profile-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
															@if(Auth::user()->user_roles == 'doctor'|| Auth::user()->user_roles == 'adminM')
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#"><img class="avatar" src=" {{asset('storage/'.$user->avatar)}}" alt=""></a>
                                    </div>
                                </div>
																@endif
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0">{{$user->nom.' '.$user->prenom}}</h3>
                                                @if(Auth::user()->user_roles == 'doctor'|| Auth::user()->user_roles == 'adminM')
                                                	<small class="text-muted">{{$user->specialite}}</small>
                                                @endif
                                                @if(Auth::user()->user_roles == 'secretaire')
                                                	<div class="staff-id">Secretaire</div>
                                                @elseif(Auth::user()->user_roles == 'doctor'|| Auth::user()->user_roles == 'adminM')
                                                	<div class="staff-id">Doctor</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <span class="title">Phone:</span>
                                                    <span class="text"><a>{{Auth::user()->phone}}</a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Email:</span>
                                                    <span class="text"><a>{{Auth::user()->email}}</a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Gender:</span>
                                                    <span class="text">{{$user->gender}}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
								<div class="profile-tabs">
										<ul class="nav nav-tabs nav-tabs-bottom">
											<li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-toggle="tab">Profile</a></li>
										</ul>
								</div>

						@if(Auth::user()->user_roles == 'patient')
						<div style="height:30px"></div>
						<div class="card-box">
							<h3 class="card-title"> Allergy & Chronic Illness</h3>
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive">
										<table class="table table-striped custom-table">
											<tbody>
												<tr>
													<th>Chronic Illness:</th>
													<td>{{$user->maladie_chronique}}</td>
												</tr>
											</tbody>
											<tbody>
												<tr>
													<th>Allergy:</th>
													<td>{{$user->allergie}}</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								</div>
								</div>
						<div class="card-box">
							<h3 class="card-title"> Antecedent Informations</h3>
							<div class="row">
								<div class="col-md-3">
									<b>{{$user->antecedent}}</b>
								</div>
							</div>
						</div>
						<div class="card-box">
							<div class="row">
								<div class="col-sm-4 col-3">
									<h4 class="card-title">Comment:</h4>
								</div>
							</div>
							<div class="row">
								<div class="col-md-10">
									<b>{{$user->commentaire}}</b>
								</div>
							</div>
						</div>
						@endif
        </div>
   </div>

@endsection
