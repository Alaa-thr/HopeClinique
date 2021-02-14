@extends('layouts.scrtrDoctorApp')
@section('content')
		<div class="page-wrapper">
            <div class="content ">
            	<div class="dash-widget">
								<div class="row">
										<div class="col-sm-4 col-3">
												<h5 class="page-sub-title">Add Services :</h5>
										</div>
								</div>
      					@if(session()->has('success'))
      	                <div class="alert alert-success alert-dismissible fade show" role="alert">
      						<strong>Success!</strong> The	service has been added successfully.
      						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
      							<span aria-hidden="true">&times;</span>
      						</button>
      					</div>
      					@endif
	                <div class="row">
	                    <div class="col-lg-8 offset-lg-2">
	                        <form enctype="multipart/form-data" action="{{ url('serviceStore') }}" method="post">
                            <input type="hidden" name="idDoctor" value="{{Auth::user()->id}}">
														{{  csrf_field() }}
														<div class="row">
																<div class="col-sm-9 col-lg-12 col-md-12">
																	<div class="form-group">
																					<button class="btn btn btn-primary float-right" >
																							<i class="fa fa-plus"></i>
																									Add Service
																					</button>
																	</div>
																</div>
															</div>
	                            <div class="row">
	                                <div class="col-sm-12">
	                                    <div class="form-group">
	                                        <label>Name Specialty<span class="text-danger">*</span></label>
	                                        <input class="form-control @error('name_specialty') is-invalid @enderror" type="text" name="name_specialty">
	                                        @error('name_specialty')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        	@enderror
	                                    </div>
	                                </div>
	                                <div class="col-sm-12">
              									  <div class="form-group">
              									    <label>Image</label>
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
                          </form>
	                    </div>
	                </div>
	            </div>
        	</div>
        </div>
@endsection
