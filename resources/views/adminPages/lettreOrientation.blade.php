@extends('layouts.scrtrDoctorApp')
@section('content')
<div class="page-wrapper">
     <div class="content">
        
                <div class="row">
                    <div class="col-sm-5 col-4">
                        <h4 class="page-title">Orientation Letters</h4>
                    </div>
                    
                </div>
        <div class="dash-widget">
                @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> The 
                            <a href="#" class="alert-link">Orientation Letter</a>
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
                    <div class="col-sm-4 col-3">
                        <h5 class="page-sub-title">Add Orientation Letter :</h5>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <form action="{{ url('informationUsers/'.$idPatient )}}" method="get">
                            <input type="hidden" value="patient" name="role"/>
                            <button class="btn btn btn-primary float-right"><i class="fa fa-back"></i>Go Back</button>
                         </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        
                        <div class="card-box ">
                            <h4 class="payslip-title">Clinique HopeClinique</h4>
                            <h4 class="payslip-title">TLEMCEN - IMAMA -  0555555555 </h4>
                            <div class="row">
                                <div class="col-sm-6 m-b-20">
                                  <img id="imgOrd" src="{{ asset('scrtrDoctorPage/img/favicon.ico')}}" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 m-b-20">
                                    <ul class="list-unstyled">
                                      @foreach($listeP as $p)
                                        <li><h5 class="txt"><strong>Tlemcen,le &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$date}} </strong></h5></li>
                                        <li><h5 class="txt"><strong>Nom et prénom du patient&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{strtoupper ($p->nom ) }} {{strtoupper ($p->prenom) }}</strong></h5></li>
                                        <li><h5 class="txt"><strong>Date de naissance:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$p->date_naiss}}</strong></h5></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        
                                <form action="{{ url('ADDLettre') }}" method="post" id="addButton">
                                 {{  csrf_field() }}
                                 <div class="row">
                                 	<div class="col-sm-9 col-lg-12 col-md-12">
                                 		<div class="form-group">
                                 			<label><b>Objet:</b><span class="text-danger">*</span></label>
                                            <button class="btn btn btn-primary float-right" >
                                                <i class="fa fa-plus"></i>
                                                             Add Orientation Letter
                                            </button>
                                            <input type="hidden" value="{{$idPatient}}" name="idPatient"/>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control @error('cause') is-invalid @enderror" type="text" name="cause" id="causeAddBtn"></textarea>
                                                @error('cause')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                 	</div>
                                 </div>
                                </form>
                              <form action="{{ url('updateLettre') }}" method="post" id="updateButton">
                                    {{  csrf_field() }}
                                    <input type="hidden" name="_method" value="PUT">
                                 <div class="row">
                                    <div class="col-sm-9 col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label><b>Objet:</b><span class="text-danger">*</span></label>
                                                <button class="btn btn btn-success float-right" >
                                                    <i class="fa fa-edit"></i>
                                                             Update Orientation Letter
                                                </button>
                                                <a href='#' class="btn btn btn-danger m-r-15 float-right" onclick="cancelUpdate()">
                                                    <i class="fa fa-cancel"></i>
                                                            Cancel
                                                </a>
                                            </form>
                                                
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="idLettre" id="idLettre"/>
                                                <textarea class="form-control @error('cause') is-invalid @enderror" type="text" name="cause" id="causeUpdateBtn"></textarea>
                                                @error('cause')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                    </div>
                                 </div>
                                
                              </form>
                        
                        </div>
                    </div>
                </div>
                <div class="row m-t-30">
                    <div class="col-sm-5 col-4 ">
                        <h5 class="page-sub-title">All Orientation Letters :</h5>
                    </div>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table mb-0 ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Lettres</th>
                                            <th>Date</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($lettres as $lettre)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td class="lettre-contenu">{{$lettre->contenu}}</td>
                                            <td>{{$lettre->date}}</td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="{{ url('lettreOrientation/'.$lettre->id )}}" target="_blank"><i class="fa fa-plus m-r-5"></i> Show</a>
                                                        <a class="dropdown-item" href="{{ url('generateLettre-pdf/'.$lettre->id )}}"><i class="fa fa-print m-r-5"></i> Print</a>
                                                        <a class="dropdown-item" href="#" onclick="getText('{{$lettre->contenu}}',{{$lettre->id}})"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                        <form action="{{ url('deleteLettre') }}" method="post" id="deleteBtn">
                                                            {{  csrf_field() }}
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="idLettre" value="{{$lettre->id}}">
                                                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#delete_department" onclick="deleteLettre()"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                         <?php $i++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>

    </div>
</div>
<script src="{{asset('scrtrDoctorPage/js/lettreOriantation.js')}}"></script>
@endsection
