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
                            <a href="{{ url('addService/')}}" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add Services</a>
                        </div>
                    </div>
                    @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> The 
                            <a href="#" class="alert-link">Service</a>
                                has been <strong>deleted</strong> successfully.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th></th>
                                            <th>Services Name</th>
                                            <th>Description</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
								        @foreach($allservices as $service)
										 <tr>
                                            <td>{{$i}}</td>
                                            <td><img width="28" height="28" src="{{ asset('storage/'.$service->avatar)}}" class="rounded-circle m-r-5" alt=""/> </td>
                                            <td>{{strtoupper ($service->nom ) }}</td>
                                            <td>{{$service->discription}}</td>
                                            <td class="text-right">
												<form action="{{ url('deleteService') }}" method="post" id="deleteBtn">
													{{  csrf_field() }}
													<input type="hidden" name="_method" value="DELETE">
													<input type="hidden" name="service" value="{{$service->id}}">
													<div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="{{ url('updateService/'.$service->id)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                            <form action="{{ url('deleteService') }}" method="post" id="deleteBtn{{$service->id}}">
                                                            {{  csrf_field() }}
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="idService" value="{{$service->id}}">
                                                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#delete_department" onclick="deleteService('deleteBtn{{$service->id}}')"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                            </form>
                                                        </div>
                                                    </div>
												</form>
                                            </td>
                                         </tr>
                                         <?php $i++; ?>
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
<script src="{{asset('scrtrDoctorPage/js/service.js')}}"></script>
@endsection
