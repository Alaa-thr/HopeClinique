@extends('layouts.scrtrDoctorApp')
@section('content')
        <div class="page-wrapper">
            <div class="content">
                <div class="dash-widget">
                  @if(session()->has('success'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                              <strong>Success!</strong> The Secretaire
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
                            <h4 class="page-title">Secretaries</h4>
                        </div>
                        <div class="col-sm-8 col-9 text-right m-b-20">
                            <a href="{{route('addUser',['type'=>'secretaire'])}}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Add Secretarie</a>
                        </div>
                    </div>
                    <form action="/searchSecretaires" method="get">
                    <div class="row">
                      <div class="col-lg-4 col-md-6 col-sl-3">
                          <div class="form-group form-focus">
                            <label class="focus-label">Secretarie Name</label>
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
                                <table class="table table-striped custom-table">
                                    <thead>
                                        <tr>
                                            <th style="min-width:200px;">Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th style="min-width: 110px;">Join Date</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($listeS as $ls)
                                          @foreach($userS as $us)
                                            @if($us->id == $ls->user_id)
                                      <tr>
                                        <td>
    											                <img width="28" height="28" src="{{asset('storage/'.$ls->avatar)}}" class="rounded-circle" alt="">
                                          <h2>{{strtoupper ($ls->nom ) }} {{strtoupper ($ls->prenom) }}</h2>
    										                </td>
                                          <td>{{ $us->email }}</td>
                                          <td>{{ $us->phone }}</td>
                                          <td>{{ $ls->created_at }}</td>
                                          <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <form action="{{ url('informationUsers/'.$ls->id )}}" method="get">
                                                           <button class="dropdown-item" data-toggle="modal">
                                                             <input type="hidden" value="secretarie" name="role"/> + &nbsp; More
                                                           </button>
                                                        </form>
                                                        <form action="{{ url('editInformation/'.$ls->id )}}" method="get">
                                                           <button class="dropdown-item" data-toggle="modal">
                                                             <input type="hidden" value="secretarie" name="role"/>
                                                             <i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                           </button>
                                                        </form>
                                                        <form action="{{ url('deleteUser') }}" method="post" id="deleteBtn">
                                                            {{  csrf_field() }}
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="idUser" value="{{$ls->id}}">
                                                            <input type="hidden" value="secretaire" name="typeUser"/>
                                                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#delete_department" onclick="deleteUser()"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
                        {{$listeS->links()}}
                    </div>
                </div>
            </div>
        </div>
<script src="{{asset('scrtrDoctorPage/js/secretaire.js')}}"></script>
@endsection
