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
      						<strong>Success!</strong> The	service 
                  @if(Session::get('success') == 'add')
                                has been <strong>added</strong> successfully.
                            @elseif(Session::get('success') == 'update')
                                has been <strong>updated</strong> successfully.
                            @elseif(Session::get('success') == 'delete')
                                has been <strong>deleted</strong> successfully.
                            @endif
      						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
      							<span aria-hidden="true">&times;</span>
      						</button>
      					</div>
      					@endif
	                <div class="row">
	                    <div class="col-lg-8 offset-lg-2">
                        @if(!$updatePage)
	                        <form enctype="multipart/form-data" action="{{ url('serviceStore') }}" method="post">
                        @else
                          <form enctype="multipart/form-data" action="{{ url('serviceUpdate') }}" method="post">
                              <input type="hidden" name="_method" value="PUT">
                              <input type="hidden" name="idService" value="{{$service->id}}">
                        @endif
														{{  csrf_field() }}
														<div class="row">
																<div class="col-sm-9 col-lg-12 col-md-12">
																	<div class="form-group">
                                    @if(!$updatePage)
																					<button class="btn btn btn-primary float-right" >
																							<i class="fa fa-plus"></i>
																									Add Service
																					</button>
                                    @else
                                          <button class="btn btn btn-success float-right" >
                                                  Update Service
                                          </button>
                                    @endif
																	</div>
																</div>
															</div>
	                            <div class="row">
	                                <div class="col-sm-12">
	                                    <div class="form-group">
                                          <label>Name Specialty<span class="text-danger">*</span></label>
                                          @if(!$updatePage)
                                            <input class="form-control @error('name_specialty') is-invalid @enderror" type="text" name="name_specialty">
                                          @else
                                            <input class="form-control @error('name_specialty') is-invalid @enderror" type="text" name="name_specialty" value="{{$service->nom}}">
                                          @endif
                                          @error('name_specialty')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                          @enderror
                                      </div>
                                      <div class="form-group"> 
                                          <label>Description<span class="text-danger">*</span></label>
                                          @if(!$updatePage)
                                            <textarea class="form-control @error('description') is-invalid @enderror" name="description"></textarea>
                                          @else
                                            <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{$service->discription}}</textarea>
                                          @endif
                                          @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                          @enderror
                                      </div>
	                                </div>
	                                <div class="col-sm-12">
              									  <div class="form-group">
              									    <label>Image<span class="text-danger">*</span></label>
              									    <div class="profile-upload">
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
