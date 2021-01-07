@extends('layouts.scrtrDoctorApp')
@section('content')
		<div class="page-wrapper">
            <div class="content ">
            	<div class="dash-widget">
	                <div class="row m-b-20">
	                    <div class="col-lg-8 offset-lg-2">
	                        <h4 class="page-title">
								@if ($typeUser=='doctor')
									Add Doctor
								@elseif ($typeUser=='secretaire')
										Add Secretaire
								@elseif ($typeUser=='patient')
										Add Patient

								@endif
							</h4>
	                    </div>
	                </div>
	                <div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong>Error!</strong> There is a <a href="#" class="alert-link">problem</a> in the inputs, please check again.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
	                <div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Success!</strong> The 
						<a href="#" class="alert-link">
								@if ($typeUser=='doctor')
										Doctor
								@elseif ($typeUser=='secretaire')
										Secretaire
								@elseif ($typeUser=='patient')
										Patient
								@endif

						</a> 
						has been added successfully.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
	                <div class="row">
	                    <div class="col-lg-8 offset-lg-2">
	                        <form action="{{ url('addUser') }}" method="post">
														{{  csrf_field() }}
	                            <div class="row">
	                                <div class="col-sm-6">
	                                    <div class="form-group">
	                                        <label>First Name<span class="text-danger">*</span></label>
	                                        <input class="form-control" type="text" name="nom">
	                                    </div>
	                                </div>
	                                <div class="col-sm-6">
	                                    <div class="form-group">
	                                        <label>Last Name<span class="text-danger">*</span></label>
	                                        <input class="form-control" type="text" name="prenom">
	                                    </div>
	                                </div>
	                                <div class="col-sm-6">
	                                    <div class="form-group">
	                                        <label>Phone number <span class="text-danger">*</span></label>
	                                        <input class="form-control" type="tel" name="phone">
	                                    </div>
	                                </div>
	                                <div class="col-sm-6">
	                                    <div class="form-group">
	                                        <label>Email <span class="text-danger">*</span></label>
	                                        <input class="form-control" type="email" name="email">
	                                    </div>
	                                </div>
	                                <div class="col-sm-6">
	                                    <div class="form-group">
	                                        <label>Password<span class="text-danger">*</span></label>
	                                        <input class="form-control" type="password" name="password">
	                                    </div>
	                                </div>
	                                <div class="col-sm-6">
	                                    <div class="form-group">
	                                        <label>Confirm Password<span class="text-danger">*</span></label>
	                                        <input class="form-control" type="password">
	                                    </div>
	                                </div>
									@if ($typeUser==='doctor')
										<div class="col-sm-6">
											<div class="form-group">
												<label>Specialty<span class="text-danger">*</span></label>
												<select class="form-control select">
													@foreach($specialites as $s)
														<option>{{ $s->nom }}</option>
													@endforeach
												</select>
											</div>
										</div>
									@endif
									@if ($typeUser=='patient')
										<div class="col-sm-6">
											<div class="form-group">
												<label>Date of Birth<span class="text-danger">*</span></label>
													<div class="cal-icon">
														<input type="text" class="form-control datetimepicker" name="date_naissance">
													</div>
											</div>
										</div>
									@endif
									<div class="col-sm-6">
										<div class="form-group gender-select">
											<label class="gen-label">Gender:<span class="text-danger">*</span></label>
											<div class="form-check-inline">
												<label class="form-check-label"><input class="form-check-input" type="radio" name="gender" value="0" >Male
												</label>
											</div>
											<div class="form-check-inline">
												<label class="form-check-label"><input class="form-check-input" type="radio" name="gender" value="1" >Female
												</label>
											</div>
										</div>
	                				</div>
									@if ($typeUser=='doctor' || $typeUser=='secretaire')
									<div class="col-sm-6">
									  <div class="form-group">
									    <label>Avatar</label>
									    <div class="profile-upload">
									      <div class="upload-img">
									        <img alt="" src="{{ asset('scrtrDoctorPage/img/user.jpg')}}">
									      </div>
									      <div class="upload-input">
									        <input type="file" class="form-control">
									      </div>
									    </div>
									  </div>
									</div>
									@endif
									@if ($typeUser=='doctor' )
									<div class="col-sm-6" >
									  <div class="form-group">
									    <label>Role<span class="text-danger">*</span></label>
									    <select class="select">
									        <option>Doctor</option>
									        <option>Doctor Admin</option>
									    </select>
									  </div>
									</div>

									@endif
									@if ($typeUser=='patient')
										<div class="col-sm-6">
											<div class="form-group">
												<label>City<span class="text-danger">*</span></label>
												<select class="form-control select" name="ville" >
													@foreach($villes as $v)
														<option>{{ $v->nom }}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Social Security Number<span class="text-danger">*</span></label>
												<input type="tel" class="form-control" name="Num_Secrurite_Social">
											</div>
										</div>
									@endif
									@if ($typeUser=='patient')
										<div class="col-sm-6">
											<div class="form-group">
												<label>Chronic diseases</label>
												<select class="form-control select" multiple name=maladie_chronique>
													@foreach($chroniques as $c)
														<option>{{ $c->nom }}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-sm-6">
												<div class="form-group">
														<label>antecedent</label>
														<input class="form-control" type="text" name="antecedent">
												</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>allergie</label>
												<select class="form-control select" multiple name="allergie">
												 	@foreach($allergies as $a)
														<option>{{ $a->nom }}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>commentaire</label>
												<textarea class="form-control" rows="3" cols="30" name="commentaire"></textarea>
											</div>
										</div>
									@endif

								</div>
								@if ($typeUser =='doctor' || $typeUser =='adminM')
			                        <div class="m-t-20 text-center">
			                            <button class="btn btn-primary submit-btn">Add Doctor</button>
			                        </div>
								@elseif ($typeUser =='secretaire')
		 	                        <div class="m-t-20 text-center">
		 	                            <button class="btn btn-primary submit-btn">Add Secretaire</button>
		 	                        </div>
								@elseif ($typeUser =='patient')
									<div class="m-t-20 text-center">
										<button class="btn btn-primary submit-btn">Add Patient</button>
									</div>

								@endif
	                        </form>
	                    </div>
	                </div>
	            </div>
        	</div>
        </div>
@endsection
