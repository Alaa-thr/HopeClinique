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
					@if(session()->has('success'))
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
					@endif
	                <div class="row">
	                    <div class="col-lg-8 offset-lg-2">
	                        <form enctype="multipart/form-data" action="{{ url('addUser') }}" method="post">
														{{  csrf_field() }}
	                            <div class="row">
	                                <div class="col-sm-6">
	                                    <div class="form-group">
	                                        <label>First Name<span class="text-danger">*</span></label>
	                                        <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name">
	                                        @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        	@enderror
	                                    </div>
	                                </div>
	                                <div class="col-sm-6">
	                                    <div class="form-group">
	                                        <label>Last Name<span class="text-danger">*</span></label>
	                                        <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name">
	                                        @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        	@enderror
	                                    </div>
	                                </div>
	                                @if ($typeUser==='doctor')
										<div class="col-sm-6">
											<div class="form-group">
												<label>Specialty<span class="text-danger">*</span></label>
												<input class="form-control @error('Specialty') is-invalid @enderror" type="text" name="Specialty">
												@error('Specialty')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        		@enderror
											</div>
										</div>
									@endif
									@if ($typeUser=='patient')
										<div class="col-sm-6">
											<div class="form-group">
												<label>Date of Birth<span class="text-danger">*</span></label>
													<div class="cal-icon">
														<input type="text" class="form-control datetimepicker @error('date_of_birth') is-invalid @enderror" name="date_of_birth">
														@error('date_of_birth')
                                                			<span class="invalid-feedback" role="alert">
                                                   				<strong>{{ $message }}</strong>
                                                			</span>
                                        				@enderror
													</div>
											</div>
										</div>
									@endif
	                                <div class="col-sm-6">
	                                    <div class="form-group">
	                                        <label>Phone number <span class="text-danger">*</span></label>
	                                        <input class="form-control @error('phone_number') is-invalid @enderror" type="tel" name="phone_number">
	                                        @error('phone_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        	@enderror
	                                    </div>
	                                </div>
	                                <div class="col-sm-6">
	                                    <div class="form-group">
	                                        <label>Email <span class="text-danger">*</span></label>
	                                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email">
	                                        @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        	@enderror
	                                    </div>
	                                </div>
	                                <div class="col-sm-6">
	                                    <div class="form-group">
	                                        <label>Password<span class="text-danger">*</span></label>
	                                        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password">
	                                        @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        	@enderror
	                                    </div>
	                                </div>
									<div class="col-sm-6">
										<div class="form-group gender-select">
											<label class="gen-label">Gender:<span class="text-danger">*</span></label>
											<div class="form-check-inline">
												<label class="form-check-label">
													<input class="form-check-input" type="radio" name="gender" value="0" checked>Male
												</label>
											</div>
											<div class="form-check-inline">
												<label class="form-check-label ">
													<input class="form-check-input" type="radio" name="gender" value="1" >Female
												</label>
											</div>
										</div>
	                </div>
									@if ($typeUser=='doctor' )
									<div class="col-sm-6" >
										  <div class="form-group">
									    <label>Role<span class="text-danger">*</span></label>
									    <select class="select @error('role') is-invalid @enderror" name="role">
									    	<option selected disabled>Choose role</option>
									        <option>Doctor</option>
									        <option>Doctor Admin</option>
									    </select>
									    @error('role')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                      @enderror
									  </div>
									</div>

									@endif
									@if ($typeUser=='doctor' || $typeUser=='secretaire')
									<div class="col-sm-12">
									  <div class="form-group">
									    <label>Avatar</label>
									    <div class="profile-upload">
									      <div class="upload-img">
									        <img alt="" src="{{ asset('scrtrDoctorPage/img/user.jpg')}}">
									      </div>
									      <div class="upload-input">
									        <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar">
									        @error('avatar')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        	@enderror
									      </div>
									    </div>
									  </div>
									</div>
									@endif
									@if ($typeUser=='patient')
										<div class="col-sm-6">
											<div class="form-group">
												<label>City<span class="text-danger">*</span></label>
												<select class="form-control select @error('city') is-invalid @enderror" name="city" >
													<option selected disabled>Choose a city</option>
													@foreach($villes as $v)
														<option>{{ $v->nom }}</option>
													@endforeach
												</select>
												@error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        		@enderror
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Social Security Number<span class="text-danger">*</span></label>
												<input type="tel" class="form-control @error('social_security_number') is-invalid @enderror" name="social_security_number">
												@error('social_security_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        		@enderror
											</div>
										</div>
									@endif
									@if ($typeUser=='patient')
										<div class="col-sm-6">
											<div class="form-group">
												<label>Chronic diseases</label>
												<select class="form-control select @error('chronic_diseases') is-invalid @enderror" multiple name=chronic_diseases>
													@foreach($chroniques as $c)
														<option>{{ $c->nom }}</option>
													@endforeach
												</select>
												@error('chronic_diseases')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        		@enderror
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Antecedent</label>
												<input class="form-control @error('antecedent') is-invalid @enderror" type="text" name="antecedent">
												@error('antecedent')
                                                	<span class="invalid-feedback" role="alert">
                                                    	<strong>{{ $message }}</strong>
                                                	</span>
                                        		@enderror
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<label>Allergie</label>
												<select class="form-control select @error('allergie') is-invalid @enderror" multiple name="allergie">
												 	@foreach($allergies as $a)
														<option>{{ $a->nom }}</option>
													@endforeach
												</select>
												@error('allergie')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        		@enderror
											</div>
										</div>
									@endif
									<input type="hidden" value="{{$typeUser}}" name="typeUser"/>
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
