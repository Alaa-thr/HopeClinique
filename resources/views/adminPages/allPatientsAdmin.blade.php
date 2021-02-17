@extends('layouts.scrtrDoctorApp')
@section('content')
 		<div class="page-wrapper">
            <div class="content">
            	<div class="dash-widget">
	                <div class="row">
	                    <div class="col-sm-4 col-3">
	                        <h4 class="page-title">Patients</h4>
	                    </div>
	                    <div class="col-sm-8 col-9 text-right m-b-20">
	                        <a href="{{route('addUser',['type'=>'patient'])}}" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Patient</a>
	                    </div>
	                </div>
                  <form action="/searchPatient" method="get">
                  <div class="row">
                    <div class="col-lg-4 col-md-6 col-sl-3">
                        <div class="form-group form-focus">
                          <label class="focus-label">Patient Name</label>
                            <input type="text" class="form-control floating" name="search">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sl-3">
                        <div class="form-group form-focus">
                          <label class="focus-label">Phone Number</label>
                            <input type="text" class="form-control floating" name="searchp">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sl-3" id="sear">
                        <div class="form-group form-focus">
                          <button class="btn btn-success btn-block btn-rounded"> Search </button>
                        </div>
                    </div>
                  </div>
                  </form>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-border table-striped custom-table mb-0">
									<thead>
										<tr>
											<th>Name</th>
											<th>City</th>
											<th>Social Security Number</th>
											<th>Phone</th>
											<th>Email</th>
											<th class="text-right">Action</th>
										</tr>
									</thead>
									<tbody>
                    @foreach($listeP as $lp)  @foreach($userP as $up)
                    @if($up->id == $lp->user_id)
										<tr>
											<td><img width="28" height="28" src="{{ asset('scrtrDoctorPage/img/user.jpg')}}" class="rounded-circle m-r-5"
                        alt="">{{strtoupper ($lp->nom ) }} {{strtoupper ($lp->prenom) }}</td>
											<td>{{ $lp->ville }}</td>
											<td>{{ $lp->Num_Secrurite_Social }}</td>
											<td>{{ $up->phone }}</td>
											<td>{{ $up->email }}</td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
													<div class="dropdown-menu dropdown-menu-right">
                            <form action="{{ url('informationUsers/'.$lp->id )}}" method="get">
                               <button class="dropdown-item" data-toggle="modal">
                                 <input type="hidden" value="patient" name="role"/> + &nbsp; More
                               </button>
                            </form>
                            <form action="{{ url('editInformation/'.$lp->id )}}" method="get">
                               <button class="dropdown-item" data-toggle="modal">
                                 <input type="hidden" value="patient" name="role"/>
                                 <i class="fa fa-pencil m-r-5"></i> Edit</a>
                               </button>
                            </form>
													</div>
												</div>
											</td>
										</tr>
                       @endif
                    @endforeach
                 @endforeach
									</tbody>
								</table>
							</div>
						</div>
	         </div>
      	</div>
        <div class="row">
            <div class="col-sm-12" id="row">
                {{$listeP->links()}}
            </div>
        </div>
    </div>
  </div>

@endsection
