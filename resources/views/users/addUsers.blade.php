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
	                                        <label>Nom<span class="text-danger">*</span></label>
	                                        <input class="form-control" type="text">
	                                    </div>
	                                </div>
	                                <div class="col-sm-6">
	                                    <div class="form-group">
	                                        <label>Prénom</label>
	                                        <input class="form-control" type="text">
	                                    </div>
	                                </div>
	                                <div class="col-sm-6">
	                                    <div class="form-group">
	                                        <label>Login<span class="text-danger">*</span></label>
	                                        <input class="form-control" type="text">
	                                    </div>
	                                </div>
	                                <div class="col-sm-6">
	                                    <div class="form-group">
	                                        <label>@-Email <span class="text-danger">*</span></label>
	                                        <input class="form-control" type="email">
	                                    </div>
	                                </div>
	                                <div class="col-sm-6">
	                                    <div class="form-group">
	                                        <label>Mot de passe</label>
	                                        <input class="form-control" type="password">
	                                    </div>
	                                </div>
	                                <div class="col-sm-6">
	                                    <div class="form-group">
	                                        <label>Confirm Mot de passe</label>
	                                        <input class="form-control" type="password">
	                                    </div>
	                                </div>
																	@if ($typeUser==='secretaire')

																	<div class="col-sm-12">
																		<div class="row">
																			<div class="col-sm-6">
																					<div class="form-group">
																							<label>Phone </label>
																							<input class="form-control" type="text">
																					</div>
																			</div>
@endif

																	@if ($typeUser==='doctor')
																	<div class="col-sm-6">
																			<div class="form-group">
																					<label>Spécialité</label>
																				 <select class="select">
																						 <option>Anesthésiste </option>
																						 <option>Dentiste‎ </option>
																						 <option>Psychiatre‎</option>
																						 <option>Hématologue‎</option>
																						 <option>Pharmacist</option>
																						 <option>Accountant</option>
																				 </select>
																			</div>
																	</div>
																@elseif ($typeUser==='ADMIN')
																<div class="col-sm-6">
																		<div class="form-group">
																				<label>Spécialité</label>
																			 <select class="select">
																					 <option>Anesthésiste </option>
																					 <option>Dentiste‎ </option>
																					 <option>Psychiatre‎</option>
																					 <option>Hématologue‎</option>
																					 <option>Pharmacist</option>
																					 <option>Accountant</option>
																			 </select>
																		</div>
																</div>
															@endif


																	@if ($typeUser=='patient')
															<div class="col-sm-6">
																	<div class="form-group">
																			<label>Date of Birth</label>
																			<div class="cal-icon">
																					<input type="text" class="form-control datetimepicker">
																			</div>
																	</div>
															</div>														@endif


	                                <div class="col-sm-6">
										<div class="form-group gender-select">
											<label class="gen-label">Gender:</label>
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
																@if ($typeUser=='doctor')
																<div class="col-sm-6">
																		<div class="form-group">
																				<label>Phone</label>
																				<input class="form-control" type="password">
																		</div>
																</div>
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

											@elseif ($typeUser=='patient')
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-6">
								<div class="form-group">
										<label>Phone </label>
										<input class="form-control" type="text">
								</div>
						</div>
						@elseif ($typeUser=='ADMIN')
<div class="col-sm-12">
<div class="row">
	<div class="col-sm-6">
			<div class="form-group">
					<label>Phone </label>
					<input class="form-control" type="text">
			</div>
	</div>

	<div class="col-sm-6">
			<div class="form-group">
					<label>Role</label>
					<select class="select">
							<option>Admin</option>
							<option>Doctor</option>
							<option>Secretaire</option>
							<option>Patient</option>

					</select>
			</div>
	



@endif

											@if ($typeUser=='patient')
											<div class="col-sm-6 col-md-6 col-lg-3">
																						<div class="form-group">
																							<label>Country</label>
																							<select class="form-control select">
																								<option>USA</option>
																								<option>United Kingdom</option>
																							</select>
																						</div>
																					</div>

																					<div class="col-sm-6 col-md-6 col-lg-3">
																						<div class="form-group">
																							<label>Sécurité Sociale</label>
																							<input type="text" class="form-control">
																						</div>
																					</div>


																								@endif


											</div>
									</div>


																	@if ($typeUser=='secretaire')
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
				<label>Maladies Chroniques<span class="text-danger">*</span></label>
				<input class="form-control" type="text">
		</div>
</div>
<div class="col-sm-6">
		<div class="form-group">
				<label>Antécédents</label>
				<input class="form-control" type="password">
		</div>
</div>
<div class="col-sm-6">
		<div class="form-group">
				<label>Allergies<span class="text-danger">*</span></label>
				<input class="form-control" type="text">
		</div>
</div>
<div class="col-sm-6">
		<div class="form-group">
			<label>Short Biography</label>
			<textarea class="form-control" rows="3" cols="30"></textarea>
		</div>
</div>
@endif
																@if ($typeUser=='secretaire')
																<div class="col-sm-6">
																		<div class="form-group">
																				<label>Role</label>
																				<select class="select">
																						<option>Admin</option>
																						<option>Doctor</option>
																						<option>Secretaire</option>
																						<option>Patient</option>

																				</select>
																		</div>
																</div>
																</div>
																	@elseif ($typeUser=='patient')
	                                <div class="col-sm-12">
	                                    <div class="form-group">
	                                        <label>Role</label>
	                                        <select class="select">
	                                            <option>Admin</option>
	                                            <option>Doctor</option>
	                                            <option>Secretaire</option>
	                                            <option>Patient</option>

	                                        </select>
	                                    </div>
	                                </div>
	                            </div>
															@elseif ($typeUser=='doctor')
															<div class="col-sm-12">
																	<div class="form-group">
																			<label>Role</label>
																			<select class="select">
																					<option>Admin</option>
																					<option>Doctor</option>
																					<option>Secretaire</option>
																					<option>Patient</option>

																			</select>
																	</div>
															</div>
													</div>
															@endif
														 @if ($typeUser=='doctor')
	                            <div class="m-t-20 text-center">
	                                <button class="btn btn-primary submit-btn">Create Doctor</button>
	                            </div>
															@elseif ($typeUser=='secretaire')
 	                            <div class="m-t-20 text-center">
 	                                <button class="btn btn-primary submit-btn">Create Secretaire</button>
 	                            </div>
															@elseif ($typeUser=='patient')
															<div class="m-t-20 text-center">
																	<button class="btn btn-primary submit-btn">Create Patient</button>
															</div>
															@elseif ($typeUser=='ADMIN')
 	                            <div class="m-t-20 text-center">
 	                                <button class="btn btn-primary submit-btn">Create Admin</button>
 	                            </div>
															@endif
	                        </form>
	                    </div>
	                </div>
	            </div>
        	</div>
        </div>
@endsection
