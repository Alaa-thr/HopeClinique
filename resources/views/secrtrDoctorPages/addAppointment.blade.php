@extends('layouts.scrtrDoctorApp')
@section('content')

<div class="page-wrapper">
            <div class="content">
            	<div class="dash-widget">
	                <div class="row">
	                    <div class="col-lg-8 offset-lg-2">
	                        <h4 class="page-title">Add Appointment</h4>
	                    </div>
	                </div>
	                @if(session()->has('success'))
		                <div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Success!</strong> The
							<a href="#" class="alert-link">Appointment</a>
							@if(Session::get('success') == 'add')
                                has been <strong>added</strong> successfully.
                            @elseif(Session::get('success') == 'update')
                                has been <strong>updated</strong> successfully.
                            @endif
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					@endif
					@if(!$updatePage)
	                <div class="row">
	                    <div class="col-lg-8 offset-lg-2">
	                        <form action="{{ url('addAppointmentInfo') }}" method="post">
	                        	{{  csrf_field() }}
	                            <div class="row">
	                                <div class="col-md-6">
										<div class="form-group">
											<label>Patient Name</label>
											<select class="form-control select  @error('patient') is-invalid @enderror" multiple name="patient" id="patientSelect" onchange="addInfoPatient(event)">

												@foreach($allPatients as $patient)
														<option value="{{$patient->user_id}}">{{$patient->nom}}
														{{$patient->prenom}}  {{$patient->date_naiss}}</option>

													@endforeach
											</select>

											@error('patient')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        	@enderror
										</div>
	                                </div>
	                                <div class="col-md-6">
	                                    <div class="form-group">
	                                        <label>Doctor</label>
	                                        <select class="form-control select @error('doctor') is-invalid @enderror" multiple name="doctor" id="doctorSelect">
                  								@foreach($allDoctors as $doctor)
                  									<option value="{{$doctor->id}}">{{$doctor->nom}}  {{$doctor->prenom}}  {{$doctor->specialite}}</option>
                  								@endforeach
	                                        </select>
	                                        @error('doctor')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        	@enderror
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="row">
	                                <div class="col-md-6">
	                                    <div class="form-group">
	                                        <label>Date</label>
	                                        <div class="cal-icon">
	                                            <input type="text" class="form-control datetimepicker @error('date') is-invalid @enderror" name="date" id="date" onblur="checkAppointmentDate(this)">
	                                        </div>
	                                        @error('date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        	@enderror
                                        	<span class="invalid-feedback" role="alert" style="display: none" id='dateExiste'>
			                                    <strong>There's an appointment in this date and time.</strong>
			                                </span>
	                                    </div>
	                                </div>
	                                <div class="col-md-6">
	                                	<div class="row">
	                                		<div class="col-md-6">
			                                    <div class="form-group">
			                                        <label>Time Beging</label>
			                                        <div>
			                                            <input type="time" class="form-control  @error('time_beging') is-invalid @enderror" id="time_beging" name="time_beging" onblur="checkTime(this)">
			                                            @error('time_beging')
			                                                <span class="invalid-feedback" role="alert">
			                                                    <strong>{{ $message }}</strong>
			                                                </span>
			                                        	@enderror
			                                        	<span class="invalid-feedback" role="alert" style="display: none" id='tempDebutSuppr'>
			                                                <strong>The time begining must less than time end.</strong>
			                                            </span>
			                                        </div>
			                                    </div>
			                                </div>
			                                <div class="col-md-6">
			                                    <div class="form-group">
			                                        <label>Time End</label>
			                                        <div>
			                                            <input type="time" class="form-control  @error('time_end') is-invalid @enderror" name="time_end" onblur="checkTime(this)">
			                                            @error('time_end')
			                                                <span class="invalid-feedback" role="alert">
			                                                    <strong>{{ $message }}</strong>
			                                                </span>
			                                        	@enderror
			                                        </div>
			                                    </div>
			                                </div>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="row">
	                                <div class="col-md-6">
	                                    <div class="form-group">
	                                        <label>Patient Email</label>
	                                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email">
	                                        @error('email')
	                                            <span class="invalid-feedback" role="alert">
	                                                <strong>{{ $message }}</strong>
	                                            </span>
	                                        @enderror
	                                    </div>
	                                </div>
	                                <div class="col-md-6">
	                                    <div class="form-group">
	                                        <label>Patient Phone Number</label>
	                                        <input class="form-control @error('phone_number') is-invalid @enderror" type="text" name="phone_number" id="phone_number">
	                                        @error('phone_number')
	                                            <span class="invalid-feedback" role="alert">
	                                                <strong>{{ $message }}</strong>
	                                            </span>
	                                        @enderror
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <label>Reason</label>
	                                <textarea cols="30" rows="4" class="form-control @error('reason') is-invalid @enderror" name="reason"></textarea>
	                                @error('reason')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                            <div class="m-t-20 text-center">
	                                <button class="btn btn-primary submit-btn" type="submit" id="createAppointmentButton">Create Appointment</button>
	                            </div>
	                        </form>
	                    </div>
	                </div>
	                @else
	                <div class="row">
	                    <div class="col-lg-8 offset-lg-2">
	                        <form action="{{ url('updateAppointmentInfo') }}" method="post">
	                        	{{  csrf_field() }}
	                        	<input type="hidden" name="_method" value="PUT">
	                        	@foreach($appointments as $appointment)
	                        	<input type="hidden" name="idAppointment" value="{{$appointment->id}}">
	                            <div class="row">
	                                <div class="col-md-6">
										<div class="form-group">
											<label>Patient Name</label>
											<select class="form-control select  @error('patient') is-invalid @enderror" multiple name="patient" id="patientSelect">
												<option value="{{$appointment->patientId}}" selected>
													{{$appointment->patientName}} {{$appointment->patientSecondName}} {{$appointment->date_naiss}}
												</option>
											</select>

											@error('patient')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        	@enderror
										</div>
	                                </div>
	                                <div class="col-md-6">
	                                    <div class="form-group">
	                                        <label>Doctor</label>
	                                        <select class="form-control select @error('doctor') is-invalid @enderror" multiple name="doctor" id="doctorSelect">
                  								<option value="{{$appointment->doctorId}}" selected>
													{{$appointment->doctorName}} {{$appointment->doctorSecondName}} {{$appointment->specialite}}
												</option>
	                                        </select>
	                                        @error('doctor')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        	@enderror
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="row">
	                                <div class="col-md-6">
	                                    <div class="form-group">
	                                        <label>Date</label>
	                                        <div class="cal-icon">
	                                            <input type="text" class="form-control datetimepicker @error('date') is-invalid @enderror" name="date" id="date" value="{{$date}}">
	                                        </div>
	                                        @error('date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        	@enderror
                                        	<span class="invalid-feedback" role="alert" style="display: none" id='dateExiste'>
			                                    <strong>There's an appointment in this date and time.</strong>
			                                </span>
	                                    </div>
	                                </div>
	                                <div class="col-md-6">
	                                	<div class="row">
	                                		<div class="col-md-6">
			                                    <div class="form-group">
			                                        <label>Time Beging</label>
			                                        <div>
			                                            <input type="time" class="form-control  @error('time_beging') is-invalid @enderror" id="time_begingg" name="time_beging" value="{{$appointment->heure_debut}}">
			                                            @error('time_beging')
			                                                <span class="invalid-feedback" role="alert">
			                                                    <strong>{{ $message }}</strong>
			                                                </span>
			                                        	@enderror
			                                        	<span class="invalid-feedback" role="alert" style="display: none" id='tempDebutSuppr'>
			                                                <strong>The time begining must less than time end.</strong>
			                                            </span>
			                                        </div>
			                                    </div>
			                                </div>
			                                <div class="col-md-6">
			                                    <div class="form-group">
			                                        <label>Time End</label>
			                                        <div>
			                                            <input type="time" class="form-control  @error('time_end') is-invalid @enderror" name="time_end"value="{{$appointment->heure_fin}}" id="time_endd">
			                                            @error('time_end')
			                                                <span class="invalid-feedback" role="alert">
			                                                    <strong>{{ $message }}</strong>
			                                                </span>
			                                        	@enderror
			                                        </div>
			                                    </div>
			                                </div>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="row">
	                                <div class="col-md-6">
	                                    <div class="form-group">
	                                        <label>Patient Email</label>
	                                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" value="{{$appointment->email}}">
	                                        @error('email')
	                                            <span class="invalid-feedback" role="alert">
	                                                <strong>{{ $message }}</strong>
	                                            </span>
	                                        @enderror
	                                    </div>
	                                </div>
	                                <div class="col-md-6">
	                                    <div class="form-group">
	                                        <label>Patient Phone Number</label>
	                                        <input class="form-control @error('phone_number') is-invalid @enderror" type="text" name="phone_number" id="phone_number" value="{{$appointment->phone}}">
	                                        @error('phone_number')
	                                            <span class="invalid-feedback" role="alert">
	                                                <strong>{{ $message }}</strong>
	                                            </span>
	                                        @enderror
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <label>Reason</label>
	                                <textarea cols="30" rows="4" class="form-control @error('reason') is-invalid @enderror" name="reason">{{$appointment->motif}}</textarea>
	                                @error('reason')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                            <div class="m-t-20 text-center">
	                                <button class="btn btn-success submit-btn" type="submit">Update Appointment</button>
	                            </div>
	                            @endforeach
	                        </form>
	                    </div>
	                </div>
	                @endif
            	</div>
            </div>
        </div>
<script src="{{ asset('scrtrDoctorPage/js/appointment.js') }}"></script>
@endsection
