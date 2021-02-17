@extends('layouts.scrtrDoctorApp')
@section('content')
<div class="page-wrapper">
            <div class="content">
              <div class="dash-widget"> <!--pour backround white-->
                @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> The Doctor
                            @if(Session::get('success') == 'delete')
                                has been <strong>deleted</strong> successfully.
                            @endif
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                 @endif
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Doctors</h4>
                    </div>
                    @if(Auth::user()->user_roles == 'adminM')
                      <div class="col-sm-8 col-9 text-right m-b-20">
                          <a href="{{route('addUser',['type'=>'doctor'])}}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Doctor</a>
                      </div>
                    @endif
                </div>

                <form action="/searchDoctor" method="get">
                <div class="row">
                  <div class="col-lg-4 col-md-6 col-sl-3">
                      <div class="form-group form-focus">
                        <label class="focus-label">Doctor Name</label>
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
            </div>
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
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                  <i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                  <form action="{{ url('informationUsers/'.$l->id )}}" method="get">
                                     <button class="dropdown-item" data-toggle="modal">
                                       <input type="hidden" value="doctor" name="role"/> + &nbsp; More
                                     </button>
                                  </form>
                                  <form action="{{ url('editInformation/'.$l->id )}}" method="get">
                                     <button class="dropdown-item" data-toggle="modal">
                                       <input type="hidden" value="doctor" name="role"/>
                                       <i class="fa fa-pencil m-r-5"></i> Edit</a>
                                     </button>
                                  </form>
                                  <form action="{{ url('deleteUser') }}" method="post" id="deleteBtn{{$l->id}}">
                                      {{  csrf_field() }}
                                      <input type="hidden" name="_method"  value="DELETE">
                                      <input type="hidden" name="idUser"   value="{{$l->id}}">
                                      <input type="hidden" name="typeUser" value="doctor"/>
                                      <a href="#" class="dropdown-item" data-toggle="modal" data-target="#delete_department" onclick="deleteUser('deleteBtn{{$l->id}}')"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                  </form>
                                </div>
                            </div>
                            <h4 class="doctor-name text-ellipsis">
                                 <a>{{strtoupper ($l->nom) }} {{strtoupper ($l->prenom) }}</a>
                            </h4>
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
                    <div class="col-sm-12" id="row">
                        {{$liste->links()}}
                    </div>
                </div>
            </div>
        </div>
        <script src="{{asset('scrtrDoctorPage/js/users.js')}}"></script>
@endsection
