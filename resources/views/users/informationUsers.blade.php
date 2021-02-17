@extends('layouts.scrtrDoctorApp')
@section('content')
@if($typeUser == 'doctor')
<link href="{{ asset('fullCalendar/lib/main.css')}}" rel='stylesheet' />
<link href="{{ asset('fullCalendar/lib/fullCalendar.css')}}" rel='stylesheet' />
<script src="{{ asset('fullCalendar/lib/main.js')}}"></script>
<script src="{{ asset('fullCalendar/lib/fullCalendar.js')}}"></script>
@endif
<div class="page-wrapper">
	<div class="content">
		@if(session()->has('success'))
						<div class="alert alert-success alert-dismissible fade show" role="alert">
								<strong>Success!</strong> Are  Blog
								@if(Session::get('success') == 'delete')
										has been <strong>deleted</strong> successfully.
								@endif
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
								</button>
						</div>
			@endif
			<div class="row">
					<div class="col-sm-12">

					</div>
			</div>
			@foreach($user as $p)
				@foreach($usersSelect as $u)
			  	@if($typeUser == 'patient')
					<div class="card-box">
						<h3 class="card-title">Basic Informations</h3>
						<div class="row">
							<div class="col-md-12">
								<div class="profile-basic">
									<div class="row">
										<div class="col-md-3">
											<label class="focus-label">First Name</label>
											<input type="text" class="form-control floating"  value="{{$p->nom}}"disabled>
										</div>
										<div class="col-md-3">
											<label class="focus-label">Last Name</label>
											<input type="text" class="form-control floating"  value="{{$p->prenom}}"disabled>
										</div>
										<div class="col-md-3">
											<label class="focus-label">Gender</label>
											<input type="text" class="form-control floating " value="{{$p->gender}}"disabled>
										</div>
									</div>
									<div style="padding:20px;"></div>
									<div class="row">
										<div class="col-md-3">
											<label class="focus-label">city</label>
											<input type="text" class="form-control floating"  value="{{$p->ville}}"disabled>
										</div>
										<div class="col-md-3">
											<label class="focus-label">Social Security Number</label>
											<input type="text" class="form-control floating " value="{{$p->Num_Secrurite_Social}}" disabled>
										</div>
										<div class="col-md-3">
											<label class="focus-label">Birthday</label>
											<input type="text" class="form-control floating " value="{{$p->date_naiss}}" disabled>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card-box">
						<h3 class="card-title">Contact Informations</h3>
						<div class="row">
							<div class="col-md-6">
								<label class="focus-label">Email</label>
								<input type="text" class="form-control floating"  value="{{$u->email}}" disabled>
							</div>
							<div class="col-md-6">
								<label class="focus-label">Phone</label>
								<input type="text" class="form-control floating"  value="{{$u->phone}}" disabled>
							</div>
						</div>
					</div>
					@if(Auth::user()->user_roles == 'doctor' || Auth::user()->user_roles == 'adminM')
					<div class="card-box">
						<h3 class="card-title"> Allergy & Chronic Illness</h3>
						<div class="row">
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-striped custom-table">
										<tbody>
											<tr>
												<th>Chronic Illness:</th>
												<td>{{$p->maladie_chronique}}</td>
											</tr>
										</tbody>
										<tbody>
											<tr>
												<th>Allergy:</th>
												<td>{{$p->allergie}}</td>
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
								<b>{{$p->antecedent}}</b>
							</div>
						</div>
					</div>
					<div class="card-box">
						<div class="row">
							<div class="col-sm-4 col-3">
								<h4 class="card-title">Comment:</h4>
							</div>
							<div class="col-sm-8 col-9 text-right">
								@if($p->commentaire == null)
									<a href="{{ url('commentaire/'.$p->id)}}"class="btn btn btn-primary btn-rounded float-right">
										<i class="fa fa-plus"></i>
										 	Add Comment
									</a>
								@else
									<a href="{{ url('commentaire/'.$p->id)}}"class="btn btn btn-success btn-rounded float-right">
											Update Comment
									</a>
								@endif
							</div>
						</div>
						<div class="row">
							<div class="col-md-10">
								<b>{{$p->commentaire}}</b>
							</div>
						</div>
					</div>
					@endif
					<div class="card-box">
						<h3 class="card-title"> Appointments: </h3>
						<div class="row">
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-striped custom-table">
										<thead>
											<tr>
												<th>Patient Name</th>
												<th>Doctor Name</th>
												<th>Date-Time</th>
												<th>Status</th>
												<td>Motif</td>
											</tr>
										</thead>
										@foreach($rdvs as $r)
											@foreach($medecins as $m)
												@if($r->medecin_id == $m->id || $r->medecin_id == NULL)
													<tr>
														<td>{{strtoupper ($p->nom ) }} {{strtoupper ($p->prenom) }}</td>
														@if($r->medecin_id == NULL)
														<td>{{strtoupper ($r->nom_medecin ) }} {{strtoupper ($r->prenom_medecin) }}</td>
															@elseif($r->medecin_id != NULL)
															<td>{{strtoupper ($m->nom ) }} {{strtoupper ($m->prenom) }}</td>
															@endif
														<td>{{$r->date}} / {{$r->heure_debut}} - {{$r->heure_fin}}</td>
														@if($today->diffInDays($r->date,false) < 0)
														<td><span class="custom-badge status-red">Inactive</span></td>
														@elseif($today->diffInDays($r->date,false) >= 0)
														<td><span class="custom-badge status-green">Active</span></td>
														@endif
														<td style="width: 250px">{{$r->motif}}</td>
													</tr>
												@endif
											@endforeach
										@endforeach
									</table>
								</div>
							</div>
			        	</div>
					</div>
					@if(Auth::user()->user_roles == 'doctor' || Auth::user()->user_roles == 'adminM')
					<div class="card-box">
						<div class="row">
							<div class="col-sm-4 col-3">
								<h4 class="card-title">Orientation Letter:</h4>
							</div>
							<div class="col-sm-8 col-9 text-right m-b-20">
								<a href="{{ url('lettre/'.$p->id)}}"class="btn btn btn-primary btn-rounded float-right">
									<i class="fa fa-plus"></i> Add Orientation Letter
								</a>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<table class="table table-striped custom-table mb-0 ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Lettres</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($lettres as $lettre)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td class="lettre-contenu">{{$lettre->contenu}}</td>
                                            <td>{{$lettre->date}}</td>
                                        </tr>

                                         <?php $i++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
							</div>
						</div>
					</div>
					<div class="card-box">
						<div class="row">
							<div class="col-sm-4 col-3">
								<h4 class="card-title">Ordinance:</h4>
							</div>
							<div class="col-sm-8 col-9 text-right m-b-20">
								<a href="{{ url('Ordonnance/'.$p->id)}}" class="btn btn btn-primary btn-rounded float-right">
									<i class="fa fa-plus"></i> Add Ordinance
								</a>
							</div>
							<div class="col-md-12">
								<table class="table table-striped custom-table mb-0 ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Doctor</th>
                                            <th>Date</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($prescription as $prts)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td class="lettre-contenu">Ordinance of Dr,
                                              @if($prts->nom_medecin == null and $prts->prenom_medecin == null)
                                                @foreach($doctors as $doctor)
                                                  @if($doctor->id == $prts->medecin_id)
                                                    {{strtoupper($doctor->nom)}} {{strtoupper($doctor->prenom)}}
                                                  @endif
                                                @endforeach
                                              @else
                                               {{strtoupper($prts->nom_medecin)}} {{strtoupper($prts->prenom_medecin)}}
                                              @endif
                                              </td>
                                            <td>{{$prts->date}}</td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="{{ url('getOrdannance/'.$prts->id )}}" target="_blank"><i class="fa fa-plus m-r-5"></i> Show</a>
                                                        <a class="dropdown-item" href="{{ url('generate-pdf/'.$prts->id )}}"><i class="fa fa-print m-r-5"></i> Print</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                         <?php $i++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
							</div>
						</div>
					</div>
					<div class="card-box">
						<form action="{{ url('addImagerie') }}" method="post" enctype="multipart/form-data">
							{{  csrf_field() }}
								<div class="row">
									<div class="col-sm-4 col-3">
											<h4 class="card-title">Images:</h4>
									</div>
									<div class="col-sm-8 col-9 text-right m-b-20">
										<button name="p" value="{{$p->id}}" style="margin-top: -35px;"class="btn btn btn-primary btn-rounded float-right">
											<i class="fa fa-plus"></i> Add Images
										</button>
										<input type="hidden" value="{{$p->id}}" name="idPatient">
									</div>
								</div>
							</form>
							<form action="{{ url('updateImg') }}" method="get">
								{{  csrf_field() }}
									<div class="row">
										<div class="col-sm-12 col-12 text-right m-b-40">
											<button style="margin-top: -35px;"class="btn btn btn-danger btn-rounded float-right">
										
												<i class="fa fa-pencil m-r-5"></i> Delete Image</a>
												</button>
											<input type="hidden" value="{{$p->id}}" name="idPatient">
										</div>
									</div>
								</form>
								<div class="content">
										<div id="lightgallery" class="row">
											@foreach($images as $img)
											<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 m-b-20">
												<a href="{{asset('storage/'.$img->image)}}">
												 <img class="img-thumbnail" src="{{asset('storage/'.$img->image)}}" alt="" id="c">
												</a>
											 </div>
											@endforeach
										</div>
								</div>
							<div class="sidebar-overlay" data-reff=""></div>
					</div>
					@endif
					@endif
					@if($typeUser == 'doctor')
					  <div class="card-box">
					    <h3 class="card-title">Basic Informations</h3>
					    <div class="row">
					        <div class="col-md-12">
					            <div class="profile-img-wrap">
					                <img class="inline-block" src="{{asset('storage/'.$p->avatar)}}" alt="user" >
					            </div>
					            <div class="profile-basic">
					              <div class="row">
					                  <div class="col-md-4">
					                        <label class="focus-label">First Name</label>
					                        <input type="text" class="form-control floating"  value="{{$p->nom}}"disabled>
					                        <input type="hidden" id="idDoc" value="{{$p->id}}">
					                  </div>
					                  <div class="col-md-4">
					                        <label class="focus-label">Last Name</label>
					                        <input type="text" class="form-control floating"  value="{{$p->prenom}}"disabled>
					                  </div>
					              </div>
					              <div style="padding:20px;"></div>
					                  <div class="row">
					                        <div class="col-md-4">
					                          <label class="focus-label">Gender</label>
					                          <input type="text" class="form-control floating " value="{{$p->gender}}"disabled>
					                        </div>
					                        <div class="col-md-4">
					                          <label class="focus-label">Specialite</label>
					                          <input type="text" class="form-control floating " value="{{$p->specialite}}" disabled>
					                        </div>
					                  </div>
					              </div>
					        </div>
					    </div>
					  </div>
					  <div class="card-box">
					 		<h3 class="card-title">Contact Informations</h3>
					 		<div class="row">
					 			<div class="col-md-6">
					 				<label class="focus-label">Email</label>
					 				<input type="text" class="form-control floating"  value="{{$u->email}}" disabled>
					 			</div>
					 			<div class="col-md-6">
					 				<label class="focus-label">Phone</label>
					 				<input type="text" class="form-control floating"  value="{{$u->phone}}" disabled>
					 			</div>
					 		</div>
					  </div>
					  <div class="card-box">
					  	<div class="row">
						 	<div class="col-sm-4 col-3">
		                        <h4 class="page-title">Appointments</h4>
		                    </div>
		                    <div class="col-sm-8 col-9 text-right m-b-20">
		                        <a href="{{route('addAppointment')}}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Appointment</a>
		                    </div>
	                	</div>
					 		<div class="row">
					 			<div  class="col-lg-12 col-md-12 " id="calendar"></div>
					 		</div>
					  </div>
					@endif
					@if($typeUser == 'secretarie')
							<div class="card-box">
								<h3 class="card-title">Basic Informations</h3>
								<div class="row">
									<div class="col-md-12">
										<div class="profile-img-wrap">
											<img class="inline-block" src="{{asset('storage/'.$p->avatar)}}" alt="user" >
										</div>
										<div class="profile-basic">
											<div class="row">
												<div class="col-md-4">
													<label class="focus-label">First Name</label>
													<input type="text" class="form-control floating"  value="{{$p->nom}}"disabled>
												</div>
												<div class="col-md-4">
													<label class="focus-label">Last Name</label>
													<input type="text" class="form-control floating"  value="{{$p->prenom}}"disabled>
												</div>
											</div>
											<div style="padding:20px;"></div>
											<div class="row">
												<div class="col-md-4">
													<label class="focus-label">Gender</label>
													<input type="text" class="form-control floating " value="{{$p->gender}}"disabled>
												</div>
											</div>
										</div>
									</div>
								</div>
							 </div>
							 <div class="card-box">
								<h3 class="card-title">Contact Informations</h3>
								<div class="row">
									<div class="col-md-6">
										<label class="focus-label">Email</label>
										<input type="text" class="form-control floating"  value="{{$u->email}}" disabled>
									</div>
									<div class="col-md-6">
										<label class="focus-label">Phone</label>
										<input type="text" class="form-control floating"  value="{{$u->phone}}" disabled>
									</div>
								</div>
							</div>
							@endif
					@endforeach
			  @endforeach
  		</div>
	</div>
<script src="{{asset('scrtrDoctorPage/js/blogs.js')}}"></script>
@endsection
