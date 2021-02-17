@extends('layouts.scrtrDoctorApp')
@section('content')
@if(Auth::user()->user_roles == 'doctor' || Auth::user()->user_roles == 'adminM'){
	<link href="{{ asset('fullCalendar/lib/main.css')}}" rel='stylesheet' />
	<link href="{{ asset('fullCalendar/lib/fullCalendar.css')}}" rel='stylesheet' />
	<script src="{{ asset('fullCalendar/lib/main.js')}}"></script>
	<script src="{{ asset('fullCalendar/lib/fullCalendar.js')}}"></script>
@endif
        <div class="page-wrapper">
            <div class="content">
            	<div class="dash-widget">
                @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> The Appointment
                            @if(Session::get('success') == 'delete')
                                has been <strong>deleted</strong> successfully.
                            @endif
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                @endif
	                <div class="row">
	                    <div class="col-sm-4 col-3">
	                        <h4 class="page-title"><b>All Doctors' Appointments</b></h4>
	                    </div>
	                </div>
                  @if(Auth::user()->user_roles != 'patient')
									<form action="/searchPatientDoctor" method="get">
	                <div class="row">
	                  <div class="col-lg-4 col-md-6 col-sl-3">
	                      <div class="form-group form-focus">
	                        <label class="focus-label">Name of doctor or patient</label>
	                          <input type="text" class="form-control floating" name="name">
	                      </div>
	                  </div>
	                  <div class="col-lg-4 col-md-6 col-sl-3">
	                      <div class="form-group form-focus">
	                        <label class="focus-label">BirthdayBirthday</label>
	                          <input type="text" class="form-control floating" name="birthday">
	                      </div>
	                  </div>
	                  <div class="col-lg-2 col-md-6 col-sl-3" id="sear">
	                      <div class="form-group form-focus">
	                        <button class="btn btn-success btn-block btn-rounded"> Search </button>
	                      </div>
	                  </div>
										@if(Auth::user()->user_roles == 'doctor'|| Auth::user()->user_roles == 'adminM')
											 <input type="hidden" id="idDoc" value="{{$idDoctor}}">
										@endif
	              </div>
	            </form>
                  @endif
      		         <div class="row">
						            <div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table">
									<thead>
										<tr>
											<th>Patient Name</th>
											<th>Birthday</th>
											<th>Doctor Name</th>
											<th>Appointment Date</th>
											<th>Appointment Time</th>
											<th>Status</th>
											<th class="text-right">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($appointments as $appointment)
                    @if(Auth::user()->user_roles == 'doctor')
                    @foreach($appointmentss as $appoint)
                    @if($appointment->patient_id == $appoint->id)
                    <tr>
                      <td>{{$appoint->nom}}
                          {{$appoint->prenom}} </td>
                      <td>{{$appoint->date_naiss}}</td>
                      @endif
                      @endforeach
                      @else
										<tr>
											<td>{{$appointment->patientName}}
												{{$appointment->patientPrenom}} </td>
											<td>{{$appointment->date_naiss}}</td>
                      @endif
                      @if(Auth::user()->user_roles == 'patient')
                      @foreach($appointmentss as $appoint)
                      @if($appointment->medecin_id == $appoint->id)
											<td>{{$appoint->nom}} {{$appoint->prenom}}</td>
                      @endif
                      @endforeach
                      @else
                      <td>{{$appointment->medecinName}} {{$appointment->medecinPrenom}}</td>
                      @endif
											<td>{{$appointment->date}}</td>
											<td>{{$appointment->heure_debut}}</td>
                      @if($today->diffInDays($appointment->date,false) < 0)
                      <td><span class="custom-badge status-red">Inactive</span></td>
                      @elseif($today->diffInDays($appointment->date,false) >= 0)
                      <td><span class="custom-badge status-green">Active</span></td>
                      @endif
                      <td class="text-right">
                        @if($today->diffInDays($appointment->date,false) < 0)
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
													<div class="dropdown-menu dropdown-menu-right">
                            @if(Auth::user()->user_roles != 'patient')
														<a class="dropdown-item" href="edit-appointment.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="addAppointment/6"><i class="fa fa-plus m-r-5"></i> Add Appointment</a>
                            @endif
                            <form action="{{ url('deleteAppointment') }}" method="post" id="deleteBtn">
                                {{  csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="idRdv" value="{{$appointment->id}}">
                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#delete_department" onclick="deleteUser()"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                            </form>
                    			</div>
												</div>
                        @endif
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
	           </div>

           		</div>
              @if(Auth::user()->user_roles == 'patient')
              <div style="height:30px"></div>
              <div class="card-box">
                <div class="row">
                  <div class="col-sm-4 col-3">
                    <h4 class="card-title">Orientation Letter:</h4>
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
              @endif

              @if(Auth::user()->user_roles == 'doctor'|| Auth::user()->user_roles == 'adminM')
              <div style="height:30px"></div>
              <div class="card-box">
                <div class="row">
                <div class="col-sm-4 col-3">
                  <h4 class="page-title"><b>My Appointments</b></h4>
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

          </div>
		  </div>
<script src="{{asset('scrtrDoctorPage/js/users.js')}}"></script>
@endsection
