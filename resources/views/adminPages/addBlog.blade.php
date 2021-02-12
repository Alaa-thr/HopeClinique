@extends('layouts.scrtrDoctorApp')
@section('content')
		<div class="page-wrapper">
            <div class="content ">
            	<div class="dash-widget">
	                <div class="row m-b-20">
	                    <div class="col-lg-8 offset-lg-2">
	                        <h4 class="page-title">
						                   ADD Bolg
							            </h4>
	                    </div>
	                </div>
      					@if(session()->has('success'))
      	                <div class="alert alert-success alert-dismissible fade show" role="alert">
      						<strong>Success!</strong> The	blog has been added successfully.
      						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
      							<span aria-hidden="true">&times;</span>
      						</button>
      					</div>
      					@endif
	                <div class="row">
	                    <div class="col-lg-8 offset-lg-2">
	                        <form enctype="multipart/form-data" action="{{ url('addBlogStore') }}" method="post">
                            <input type="hidden" name="idDoctor" value="{{Auth::user()->id}}">
														{{  csrf_field() }}
	                            <div class="row">
	                                <div class="col-sm-12">
	                                    <div class="form-group">
	                                        <label>Title<span class="text-danger">*</span></label>
	                                        <input class="form-control @error('title') is-invalid @enderror" type="text" name="title">
	                                        @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        	@enderror
	                                    </div>
	                                </div>
	                                <div class="col-sm-12">
	                                    <div class="form-group">
	                                        <label>Description <span class="text-danger">*</span></label>
	                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description">
                                          </textarea>
	                                        @error('description')
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
	                             <div class="m-t-20 text-center">
            										<button class="btn btn-primary submit-btn">Add Blog</button>
            									</div>
                          </form>
	                    </div>
	                </div>
	            </div>
        	</div>
        </div>
@endsection
