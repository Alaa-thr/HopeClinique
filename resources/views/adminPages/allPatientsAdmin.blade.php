@extends('layouts.scrtrDoctorApp')
@section('content')
 		<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Patients</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add-patient.html" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Patient</a>
                    </div>
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table datatable mb-0">
								<thead>
									<tr>
										<th>Name</th>
										<th>Age</th>
										<th>Address</th>
										<th>Phone</th>
										<th>Email</th>
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><img width="28" height="28" src="{{ asset('scrtrDoctorPage/img/user.jpg')}}" class="rounded-circle m-r-5" alt=""> Jennifer Robinson</td>
										<td>35</td>
										<td>1545 Dorsey Ln NE, Leland, NC, 28451</td>
										<td>(207) 808 8863</td>
										<td>jenniferrobinson@example.com</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="edit-patient.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_patient"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td><img width="28" height="28" src="{{ asset('scrtrDoctorPage/img/user.jpg')}}" class="rounded-circle m-r-5" alt=""> Terry Baker</td>
										<td>63</td>
										<td>555 Front St #APT 2H, Hempstead, NY, 11550</td>
										<td>(376) 150 6975</td>
										<td>terrybaker@example.com</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="edit-patient.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_patient"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td><img width="28" height="28" src="{{ asset('scrtrDoctorPage/img/user.jpg')}}" class="rounded-circle m-r-5" alt=""> Kyle Bowman</td>
										<td>7</td>
										<td>5060 Fairways Cir #APT 207, Vero Beach, FL, 32967</td>
										<td>(981) 756 6128</td>
										<td>kylebowman@example.com</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="edit-patient.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_patient"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td><img width="28" height="28" src="{{ asset('scrtrDoctorPage/img/user.jpg')}}" class="rounded-circle m-r-5" alt=""> Marie Howard</td>
										<td>22</td>
										<td>3501 New Haven Ave #152, Columbia, MO, 65201</td>
										<td>(634) 09 3833</td>
										<td>mariehoward@example.com</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="edit-patient.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_patient"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td><img width="28" height="28" src="{{ asset('scrtrDoctorPage/img/user.jpg')}}" class="rounded-circle m-r-5" alt=""> Joshua Guzman</td>
										<td>34</td>
										<td>4712 Spring Creek Dr, Bonita Springs, FL, 34134</td>
										<td>(407) 554 4146</td>
										<td>joshuaguzman@example.com</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="edit-patient.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_patient"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td><img width="28" height="28" src="{{ asset('scrtrDoctorPage/img/user.jpg')}}" class="rounded-circle m-r-5" alt=""> Julia Sims</td>
										<td>27</td>
										<td>517 Walker Dr, Houma, LA, 70364, United States</td>
										<td>(680) 432 2662</td>
										<td>juliasims@example.com</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="edit-patient.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_patient"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
                </div>
            </div>
        </div>

@endsection