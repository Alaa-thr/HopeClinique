@extends('layouts.scrtrDoctorApp')
@section('content')
        <div class="page-wrapper">
            <div class="content">
                <div class="dash-widget">
                    <div class="row">
                        <div class="col-sm-4 col-3">
                            <h4 class="page-title">Secretaries</h4>
                        </div>
                        <div class="col-sm-8 col-9 text-right m-b-20">
                            <a href="add-employee.html" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Add Secretarie</a>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group form-focus">
                                <label class="focus-label">Secretarie ID</label>
                                <form  action="/searchSecretaires" method="get">
                                  <input type="text" class="form-control floating" name="search">
                                  <input type="hidden" value="id" name="searchp"/>
                                </form>
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group form-focus">
                                <label class="focus-label">Secretarie Name</label>
                                <form  action="/searchSecretaires" method="get">
                                <input type="text" class="form-control floating" name="search">
                                <input type="hidden" value="name" name="searchp"/>
                              </form>
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group form-focus">
                                <label class="focus-label">Phone Number</label>
                                <form  action="/searchSecretaires" method="get">
                                <input type="text" class="form-control floating" name="search">
                                <input type="hidden" value="phone" name="searchp"/>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <a href="#" class="btn btn-success btn-block btn-rounded"> Search </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
    						<div class="table-responsive">
                                <table class="table table-striped custom-table">
                                    <thead>
                                        <tr>
                                            <th style="min-width:200px;">Name</th>
                                            <th>Secretarie ID</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th style="min-width: 110px;">Join Date</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($listeS as $ls)    @foreach($userS as $us)
                                       @if($us->id == $ls->user_id)
                                      <tr>
                                        <td>
    											                <img width="28" height="28" src="{{ asset('scrtrDoctorPage/img/user.jpg')}}" class="rounded-circle" alt="">
                                          <h2>{{strtoupper ($ls->nom ) }} {{strtoupper ($ls->prenom) }}</h2>
    										                </td>
                                          <td>{{ $ls->id }}</td>
                                          <td>{{ $us->email }}</td>
                                          <td>{{ $us->phone }}</td>
                                          <td>{{ $ls->created_at }}</td>
                                          <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="edit-employee.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                        <form action="{{ url('addUserdelete/'.$ls->id)}}" method="post"><!--car il n existe pas dans html sauf 2 method get et post-->
                                                           {{ csrf_field() }}<!--pour générer token-->
                                                           {{ method_field('DELETE')}}<!--pour générer input de type hidden et value put -->
                                                           <button class="dropdown-item" data-toggle="modal" data-target="#delete_doctor">
                                                             <input type="hidden" value="{{$us->user_roles}}" name="destroyU"/>
                                                              <i class="fa fa-trash-o m-r-5"></i> Delete
                                                           </button>
                                                        </form>
                                                    </div>
                                                </div>
                                          </td>
                                      </tr>@endif
                                      @endforeach    @endforeach
                                    </tbody>
                                </table>
    						</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
