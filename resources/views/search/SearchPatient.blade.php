@extends('layouts.scrtrDoctorApp')
@section('content')
 		<div class="page-wrapper">
            <div class="content">
            	<div class="dash-widget">
	                <div class="row">
	                    <div class="col-sm-4 col-3">
	                        <h4 class="page-title">Patients</h4>
	                    </div>
	                    <div class="col-sm-8 col-9 text-right m-b-20">
	                        <a href="add-patient.html" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Patient</a>
	                    </div>
	                </div>
	                <div class="row ">
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group form-focus">
                                <label class="focus-label">Patient Name</label>
                                <form  action="/searchPatient" method="get">
                                <input type="text" class="form-control floating" name="search">
                                <input type="hidden" value="name" name="searchp"/>
                              </form>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group form-focus">
                                <label class="focus-label">Phone Number</label>
                                <form  action="/searchPatient" method="get">
                                <input type="text" class="form-control floating" name="search">
                                <input type="hidden" value="phone" name="searchp"/>
                              </form>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                                  <div class="form-group form-focus">
                                      <label class="focus-label">Social Security</label>
                                      <form  action="/searchPatient" method="get">
                                      <input type="text" class="form-control floating" name="search">
                                      <input type="hidden" value="id" name="searchp"/>
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
								<table class="table table-border table-striped custom-table mb-0">
									<thead>
										<tr>
											<th>Name</th>
											<th>City</th>
											<th>Social Security Number</th>
											<th>Phone</th>
											<th>Email</th>
											<th class="text-right">Action</th>
										</tr>
									</thead>
									<tbody>
                    @foreach($listeP as $lp)  @foreach($userP as $up)
                    @if($up->id == $lp->user_id)
										<tr>
											<td><img width="28" height="28" src="{{ asset('scrtrDoctorPage/img/user.jpg')}}" class="rounded-circle m-r-5"
                        alt="">{{strtoupper ($lp->nom ) }} {{strtoupper ($lp->prenom) }}</td>
											<td>{{ $lp->ville }}</td>
											<td>{{ $lp->Num_Secrurite_Social }}</td>
											<td>{{ $up->phone }}</td>
											<td>{{ $up->email }}</td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<form action="{{ url('informationUsers/'.$lp->id )}}" method="get">
							                               <button class="dropdown-item" data-toggle="modal">
							                                 <input type="hidden" value="patient" name="role"/> + &nbsp; More
							                               </button>
							                            </form>
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_patient"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>@endif
                    @endforeach           @endforeach
									</tbody>
								</table>
							</div>
						</div>
	                </div>
            	</div>
            </div>
        </div>

@endsection
