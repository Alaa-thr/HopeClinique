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
								@elseif ($typeUser=='ADMIN')
										Add Admin
								@endif
							</h4>
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-lg-8 offset-lg-2">
	                        <form>
	                            <div class="row">
	                                <div class="col-sm-6">
	                                    <div class="form-group">
	                                        <label>First Name<span class="text-danger">*</span></label>
	                                        <input class="form-control" type="text">
	                                    </div>
	                                </div>
	                                <div class="col-sm-6">
	                                    <div class="form-group">
	                                        <label>Last Name<span class="text-danger">*</span></label>
	                                        <input class="form-control" type="text">
	                                    </div>
	                                </div>
	                                <div class="col-sm-6">
	                                    <div class="form-group">
	                                        <label>Phone number <span class="text-danger">*</span></label>
	                                        <input class="form-control" type="tel">
	                                    </div>
	                                </div>
	                                <div class="col-sm-6">
	                                    <div class="form-group">
	                                        <label>Email <span class="text-danger">*</span></label>
	                                        <input class="form-control" type="email">
	                                    </div>
	                                </div>
	                                <div class="col-sm-6">
	                                    <div class="form-group">
	                                        <label>Password<span class="text-danger">*</span></label>
	                                        <input class="form-control" type="password">
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
														<input type="text" class="form-control datetimepicker">
													</div>
											</div>
										</div>									
									@endif
									<div class="col-sm-6">
										<div class="form-group gender-select">
											<label class="gen-label">Gender:<span class="text-danger">*</span></label>
											<div class="form-check-inline">
												<label class="form-check-label">
													<input type="radio" name="gender" class="form-check-input">Male
												</label>
											</div>
											<div class="form-check-inline">
												<label class="form-check-label">
													<input type="radio" name="gender" class="form-check-input">Female
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
									@if ($typeUser=='patient')
										<div class="col-sm-6">
											<div class="form-group">
												<label>City<span class="text-danger">*</span></label>
												<select class="form-control select">
													@foreach($villes as $v)
														<option>{{ $v->nom }}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Social Security Number<span class="text-danger">*</span></label>
												<input type="text" class="form-control">
											</div>
										</div>
									@endif
									@if ($typeUser=='patient')
										<div class="col-sm-6">
											<div class="form-group">
												<label>Chronic diseases</label>
												<select class="form-control select" multiple>
													@foreach($chroniques as $c)
														<option>{{ $c->nom }}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Antecedents</label>
												<input class="form-control" type="password">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Allergies</label>
												<select class="form-control select" multiple>
												 	@foreach($allergies as $a)
														<option>{{ $a->nom }}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Comment</label>
												<textarea class="form-control" rows="3" cols="30"></textarea>
											</div>
										</div>
									@endif
									<div class="col-sm-12">
										<div class="form-group">
											<label>Role<span class="text-danger">*</span></label>
											<select class="select">
												<option>Admin</option>
												<option>Doctor</option>
												<option>Secretaire</option>
												<option>Patient</option>
											</select>
										</div>
									</div>
								</div>
								@if ($typeUser=='doctor')
			                        <div class="m-t-20 text-center">
			                            <button class="btn btn-primary submit-btn">Add Doctor</button>
			                        </div>
								@elseif ($typeUser=='secretaire')
		 	                        <div class="m-t-20 text-center">
		 	                            <button class="btn btn-primary submit-btn">Add Secretaire</button>
		 	                        </div>
								@elseif ($typeUser=='patient')
									<div class="m-t-20 text-center">
										<button class="btn btn-primary submit-btn">Add Patient</button>
									</div>
								@elseif ($typeUser=='ADMIN')
		 	                        <div class="m-t-20 text-center">
		 	                            <button class="btn btn-primary submit-btn">Add Admin</button>
		 	                        </div>
								@endif
	                        </form>
	                    </div>
	                </div>
	            </div>
        	</div>
        </div>
@endsection
