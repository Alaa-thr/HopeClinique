@extends('layouts.scrtrDoctorApp')
@section('content')
		<div class="page-wrapper">
            <div class="content">
                <div class="dash-widget">
                    <div class="row">
                        <div class="col-sm-5 col-5">
                            <h4 class="page-title">Services</h4>
                        </div>
                        <div class="col-sm-7 col-7 text-right m-b-30">
                            <a href="{{ url('service/'.Auth::user()->id)}}" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add Services</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Services Name</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
																			@foreach($allservices as $service)
																			  <tr>
                                            <td>{{$service->id}}</td>
                                            <td>{{strtoupper ($service->nom ) }}</td>
                                            <td class="text-right">
																							<form action="{{ url('deleteService') }}" method="post" id="deleteBtn">
																								{{  csrf_field() }}
																								<input type="hidden" name="_method" value="DELETE">
																								<input type="hidden" name="service" value="{{$service->id}}">
																						  <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_department" onclick="deleteService()"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                    </div>
                                                </div>
																							</form>
                                            </td>
                                        </tr>
																				@endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
										<div class="row">
												<div class="col-sm-12" id="row">
														{{$allservices->links()}}
												</div>
										</div>
                </div>
            </div>
        </div>
@endsection
