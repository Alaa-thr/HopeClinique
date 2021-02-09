@extends('layouts.scrtrDoctorApp')
@section('content')
        <div class="page-wrapper">
            <div class="content">
            	<div class="dash-widget">
	                <div class="row">
	                    <div class="col-sm-4 col-3">
	                        <h4 class="page-title">Appointments</h4>
	                    </div>
	                    <div class="col-sm-8 col-9 text-right m-b-20">
	                        <a href="{{route('addAppointment')}}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Appointment</a>
	                    </div>
	                </div>
	                <div class="row ">
                      <div class="col-sm-6 col-md-4" >
                          <div class="form-group form-focus" >
                          	<label class="focus-label ">Name of doctor or patient</label>
                            <form  action="{{route('searchPatientDoctor')}}" method="get" class="col-sm-6 col-md-12">
                              <input type="text" class="form-control floating" name="search">
                              <input type="hidden" value="name" name="searchPatientDoctor"/>
                            </form>
                          </div>
                      </div>
                      <div class="col-sm-6 col-md-4">
                          <div class="form-group form-focus">
                              <label class="focus-label">Birthday</label>
                              <form  action="{{route('searchPatientDoctor')}}" method="get" class="col-sm-6 col-md-12">
                                <input type="text" class="form-control floating" name="search">
                                <input type="hidden" value="birthday" name="searchPatientDoctor"/>
                              </form>
                          </div>
                      </div>
                      <div class="col-sm-6 col-md-3">
                          <a href="#" class="btn btn-success btn-block btn-rounded"> Search </a>
                      </div>
              		</div>
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
										<tr>
											<td>{{$appointment->patientName}}
												{{$appointment->patientPrenom}} </td>
											<td>{{$appointment->date_naiss}}</td>
											<td>{{$appointment->medecinName}} {{$appointment->medecinPrenom}}</td>
											<td>{{$appointment->date}}</td>
											<td>{{$appointment->heure_debut}}</td>
											<td><span class="custom-badge status-red">Inactive</span></td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="edit-appointment.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="addAppointment/6"><i class="fa fa-plus m-r-5"></i> Add Appointment</a>
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_appointment"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
	                </div>
           		</div>
            </div>
		</div>
@endsection