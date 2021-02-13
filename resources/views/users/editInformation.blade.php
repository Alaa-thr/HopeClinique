@extends('layouts.scrtrDoctorApp')
@section('content')
<div class="page-wrapper">
	<div class="content">
			<div class="row">
					<div class="col-sm-12">
							<H3>	Edit Information </H3>
					</div>
			</div>
			@foreach($user as $p)
				@foreach($usersSelect as $u)
					@if($typeUser == 'doctor')
          <form enctype="multipart/form-data" action="{{ url('updateInformation/'.$u->id) }}" method="post">
              {{  csrf_field() }}
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="roleU" value="doctor">
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
																	<input class="form-control floating @error('first_name') is-invalid @enderror" type="text" name="first_name" value="{{$p->nom}}">
																	@error('first_name')
																				<span class="invalid-feedback" role="alert">
																						<strong>{{ $message }}</strong>
																				</span>
																	@enderror
					                  </div>
					                  <div class="col-md-4">
					                        <label class="focus-label">Last Name</label>
																	<input class="form-control floating @error('last_name') is-invalid @enderror" value="{{$p->prenom}}" type="text" name="last_name">
																	@error('last_name')
																				<span class="invalid-feedback" role="alert">
																						<strong>{{ $message }}</strong>
																				</span>
																	@enderror
					                  </div>
					              </div>
					              <div style="padding:20px;"></div>
					                  <div class="row">
					                        <div class="col-md-4">
																		<label class="focus-label @error('gender') is-invalid @enderror">Gender*Male/Female</label>
																		<input type="text" class="form-control floating " value="{{$p->gender}}" name="gender">
																		@error('gender')
																		<span class="invalid-feedback" role="alert">
																		<strong>{{ $message }}</strong>
																		</span>
																		@enderror
																	 </div>
					                        <div class="col-md-4">
					                          <label class="focus-label @error('specialite') is-invalid @enderror">Specialite</label>
					                          <input type="text" class="form-control floating " value="{{$p->specialite}}" name="specialite">
																		@error('specialite')
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
					  <div class="card-box">
					 		<h3 class="card-title">Contact Informations</h3>
					 		<div class="row">
					 			<div class="col-md-6">
					 				<label class="focus-label @error('email') is-invalid @enderror" >Email</label>
					 				<input type="text" class="form-control floating"  value="{{$u->email}}" name="email">
									@error('email')
									<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
									</span>
									@enderror
					 			</div>
					 			<div class="col-md-6">
					 				<label class="focus-label @error('phone') is-invalid @enderror">Phone</label>
					 				<input type="text" class="form-control floating"  value="{{$u->phone}}" name="phone">
									@error('phone')
									<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
									</span>
									@enderror
					 			</div>
					 		</div>
					  </div>
            <div class="text-center m-t-20">
                <button class="btn btn-primary submit-btn " type="submit" >Save</button>
            </div>
              </form>
							@endif

					@endforeach

					@if($typeUser == 'patient')
					<form enctype="multipart/form-data" action="{{ url('updateInformation/'.$p->id) }}" method="post">
					    {{  csrf_field() }}
					    <input type="hidden" name="_method" value="PUT">
					    <input type="hidden" name="roleU" value="patient">
							<div class="card-box">
								<h3 class="card-title">Basic Informations</h3>
								<div class="row">
									<div class="col-md-12">
										<div class="profile-basic">
											<div class="row">
												<div class="col-md-3">
													<label class="focus-label">First Name</label>
													<input class="form-control floating @error('first_name') is-invalid @enderror" type="text" name="first_name" value="{{$p->nom}}">
													@error('first_name')
																<span class="invalid-feedback" role="alert">
																		<strong>{{ $message }}</strong>
																</span>
													@enderror
												</div>
												<div class="col-md-3">
													<label class="focus-label">Last Name</label>
													<input class="form-control floating @error('last_name') is-invalid @enderror" value="{{$p->prenom}}" type="text" name="last_name">
													@error('last_name')
																<span class="invalid-feedback" role="alert">
																		<strong>{{ $message }}</strong>
																</span>
													@enderror
												</div>
												<div class="col-md-3">
													<label class="focus-label @error('last_name') is-invalid @enderror">Gender*Male/Female</label>
													<input type="text" class="form-control floating " value="{{$p->gender}}" name="gender">
													@error('gender')
													<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
													</span>
													@enderror
												</div>
											</div>
											<div style="padding:20px;"></div>
											<div class="row">
												<div class="col-md-3">
													<label class="focus-label">city</label>
													<input type="text" class="form-control floating @error('city') is-invalid @enderror"  value="{{$p->ville}}" name="city">
													@error('city')
													<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
													</span>
													@enderror
												</div>
												<div class="col-md-3">
													<label class="focus-label">Social Security Number</label>
													<input type="text" class="form-control floating floating @error('social_security') is-invalid @enderror" value="{{$p->Num_Secrurite_Social}}" name="social_security">
													@error('social_security')
													<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
													</span>
													@enderror
												</div>
												<div class="col-md-3">
													<label class="focus-label">Birthday</label>
													<input type="date" class="form-control floating @error('date_of_birth') is-invalid @enderror" value="{{$p->date_naiss}}" name="date_of_birth">
													@error('date_of_birth')
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
							<div class="card-box">
								<h3 class="card-title">Contact Informations</h3>
								<div class="row">
									<div class="col-md-6">
										<label class="focus-label">Email</label>
										<input type="text" class="form-control floating @error('email') is-invalid @enderror"  value="{{$u->email}}" name="email">
										@error('email')
										<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
									<div class="col-md-6">
										<label class="focus-label @error('phone') is-invalid @enderror">Phone</label>
										<input type="text" class="form-control floating"  value="{{$u->phone}}" name=phone>
										@error('phone')
										<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>
							</div>

									<div class="card-box">
										<div class="row">
													<div class="col-sm-4 col-3">
															<h4 class="card-title">Allergy :</h4>
													</div>
													<div class="col-md-12">
																	<select class="form-control select @error('allergie') is-invalid @enderror" name="allergie" multiple>
																		<option selected> {{$p->allergie}}</option>
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
									</div>
									<div class="card-box">
										<div class="row">
													<div class="col-sm-4 col-3">
															<h4 class="card-title">Chronic Illness :</h4>
													</div>
													<div class="col-md-12">
														<select class="form-control select @error('chronic_diseases') is-invalid @enderror"  name="chronic_diseases" multiple>
															<option selected> {{$p->maladie_chronique}}</option>
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
									</div>

							<div class="card-box">
								<div class="row">
											<div class="col-sm-4 col-3">
													<h4 class="card-title">Antecedent Informations:</h4>
											</div>
											<div class="col-md-12">
															<input class="form-control floating col-md-12 @error('antecedent') is-invalid @enderror" type="text" name="antecedent" value="{{$p->antecedent}}">
															@error('antecedent')
																	<span class="invalid-feedback" role="alert">
																			<strong>{{ $message }}</strong>
																	</span>
															@enderror
											</div>
									</div>
							</div>

							<div class="card-box">
								<div class="row">
											<div class="col-sm-4 col-3">
													<h4 class="card-title">Comment:</h4>
											</div>
											<div class="col-md-12">
															<input class="form-control floating col-md-12 @error('comment') is-invalid @enderror" type="text" name="comment" value="{{$p->commentaire}}">
															@error('comment')
																	<span class="invalid-feedback" role="alert">
																			<strong>{{ $message }}</strong>
																	</span>
															@enderror
											</div>
									</div>
							</div>

						<div class="text-center m-t-20">
					      <button class="btn btn-primary submit-btn " type="submit" >Save</button>
					  </div>
					    </form>
					@endif
					@if($typeUser == 'secretaire')
					<form enctype="multipart/form-data" action="{{ url('updateInformation/'.$p->id) }}" method="post">
							{{  csrf_field() }}
							<input type="hidden" name="_method" value="PUT">
							<input type="hidden" name="roleU" value="secretaire">
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
																	<input class="form-control floating @error('first_name') is-invalid @enderror" type="text" name="first_name" value="{{$p->nom}}">
																	@error('first_name')
																				<span class="invalid-feedback" role="alert">
																						<strong>{{ $message }}</strong>
																				</span>
																	@enderror
														</div>
														<div class="col-md-4">
																	<label class="focus-label">Last Name</label>
																	<input class="form-control floating @error('last_name') is-invalid @enderror" value="{{$p->prenom}}" type="text" name="last_name">
																	@error('last_name')
																				<span class="invalid-feedback" role="alert">
																						<strong>{{ $message }}</strong>
																				</span>
																	@enderror
														</div>
												</div>
												<div style="padding:20px;"></div>
														<div class="row">
																	<div class="col-md-4">
																		<label class="focus-label @error('last_name') is-invalid @enderror">Gender*Male/Female</label>
																		<input type="text" class="form-control floating " value="{{$p->gender}}" name="gender">
																		@error('gender')
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
						<div class="card-box">
							<h3 class="card-title">Contact Informations</h3>
							<div class="row">
								<div class="col-md-6">
									<label class="focus-label @error('email') is-invalid @enderror" >Email</label>
									<input type="text" class="form-control floating"  value="{{$u->email}}" name="email">
									@error('email')
									<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
								<div class="col-md-6">
									<label class="focus-label @error('phone') is-invalid @enderror">Phone</label>
									<input type="text" class="form-control floating"  value="{{$u->phone}}" name="phone">
									@error('phone')
									<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
						</div>
						<div class="text-center m-t-20">
								<button class="btn btn-primary submit-btn " type="submit" >Save</button>
						</div>
							</form>
							@endif

				@endforeach
  		</div>
	</div>
@endsection
