@extends('layouts.scrtrDoctorApp')
@section('content')
<div class="page-wrapper">
            <div class="content">
              <div class="dash-widget"> <!--pour backround white-->
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Doctors</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="{{route('addUser',['type'=>'doctor'])}}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Doctor</a>
                    </div>
                </div>

                <div class="row ">
                      <div class="col-sm-6 col-md-4">
                          <div class="form-group form-focus">
                            <label class="focus-label">Doctor Name</label>
                            <form  action="/searchDoctor" method="get" class="col-sm-6 col-md-12">
                              <input type="text" class="form-control floating" name="search">
                              <input type="hidden" value="name" name="searchp"/>
                            </form>
                          </div>
                      </div>
                      <div class="col-sm-6 col-md-4">
                          <div class="form-group form-focus">
                              <label class="focus-label">Phone Number</label>
                              <form  action="/searchDoctor" method="get" class="col-sm-6 col-md-12">
                                <input type="text" class="form-control floating" name="search">
                                <input type="hidden" value="phone" name="searchp"/>
                              </form>
                          </div>
                      </div>
                      <div class="col-sm-6 col-md-3">
                          <a href="#" class="btn btn-success btn-block btn-rounded"> Search </a>
                      </div>
              </div>
            </div>  <!--pour backround white finish -->
				<div class="row doctor-grid">
          @foreach($liste as $l)
            @foreach($userM as $um)
              @if($um->id == $l->user_id)
          <div class="col-md-4 col-sm-4  col-lg-3">
                        <div class="profile-widget">
                            <div class="doctor-img">
                              <a class="avatar" href=""><img src="{{asset('storage/'.$l->avatar)}}" alt="user"/></a>
                            </div>
                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                  <form action="{{ url('informationUsers/'.$l->id )}}" method="get">
                                     <button class="dropdown-item" data-toggle="modal">
                                       <input type="hidden" value="doctor" name="role"/> + &nbsp; More
                                     </button>
                                  </form>
                                    <a class="dropdown-item" href="edit-doctor.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                      <form action="{{ url('addUserdelete/'.$l->id)}}" method="post"><!--car il n existe pas dans html sauf 2 method get et post-->
                                         {{ csrf_field() }}<!--pour générer token-->
                                         {{ method_field('DELETE')}}<!--pour générer input de type hidden et value put -->
                                         <button class="dropdown-item" data-toggle="modal" data-target="#delete_doctor">
                                           <input type="hidden" value="{{$um->user_roles}}" name="destroyU"/>
                                            <i class="fa fa-trash-o m-r-5"></i> Delete
                                         </button>
                                      </form>
                                </div>
                            </div>
                            <h4 class="doctor-name text-ellipsis"><a href="profile.html">{{strtoupper ($l->nom ) }} {{strtoupper ($l->prenom) }}</a></h4>
                            <div class="doc-prof">{{$l->specialite}}</div>
                            <div class="user-country">
                              <i class="fa fa-phone"></i> &nbsp;{{ $um->phone }} {{ $um->email }}
                            </div>
                        </div>
                    </div>
                    @endif
                  @endforeach
                @endforeach
       </div>
				<div class="row">
                    <div class="col-sm-12">
                        <div class="see-all">
                            <a class="see-all-btn" href="javascript:void(0);">Load More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
