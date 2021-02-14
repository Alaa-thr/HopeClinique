@extends('layouts.scrtrDoctorApp')
@section('content')
<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-5 col-4">
                        <h4 class="page-title">Ordinances</h4>
                    </div>
                </div>
             <div class="dash-widget">
                @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> The 
                            <a href="#" class="alert-link">Ordinances</a>
                            @if(Session::get('success') == 'add')
                                has been <strong>added</strong> successfully.
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
                        <h5 class="page-sub-title">Add Ordinances :</h5>
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
                        <div class="card-box" id="divClinique">
                            <h4 class="payslip-title">Clinique HopeClinique Dr.
                            @foreach($users as $user)
                              {{$user->nom}} {{$user->prenom}}
                            @endforeach
                          </h4>
                            <h4 class="payslip-title">TLEMCEN - IMAMA -  0555555555 </h4>
                            <div class="row">
                                <div class="col-sm-6 m-b-20">
                                  <img id="imgOrd" src="{{ asset('scrtrDoctorPage/img/favicon.ico')}}" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 m-b-20">
                                    <ul class="list-unstyled">
                                      @foreach($listeP as $p)
                                        <li><h5 class="txt"><strong>Tlemcen,le &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$date}} </strong></h5></li>
                                        <li><h5 class="txt"><strong>Nom et prénom du patient&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{strtoupper ($p->nom ) }} {{strtoupper ($p->prenom) }}</strong></h5></li>
                                        <li><h5 class="txt"><strong>Date de naissance:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$p->date_naiss}}</strong></h5></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <form enctype="multipart/form-data" action="{{ url('ADDOrdonnance') }}" method="post">
                             {{  csrf_field() }}
                              <div class="row">
                                  <div class="col-sm-9 col-lg-12 col-md-12">
                                    <div class="form-group">
                                      <label><strong>Medecament:</strong></label>
                                            <button class="btn btn btn-primary float-right" >
                                                <i class="fa fa-plus"></i>
                                                             Add Ordinance
                                            </button>
                                            <input type="hidden" value="{{$idDoctorUser}}" name="idDoctor"/>
                                            <input type="hidden" value="{{$idPatient}}" name="idPatient"/>
                                    </div>
                                  </div>
                                </div>

                            <div class="row" id="myList">
                              <div class="col-sm-5 m-b-10">
                                  <div id="hh">
                                      <h4 class="m-b-10"><strong>Name</strong></h4>
                                      <select class="form-control select @error('médicament') is-invalid @enderror" name="médicament[]" id="medicament" multiple>
                                        @foreach($medicaments as $m)
                                       <option>{{$m->nom}}</option>
                                       @endforeach
                                     </select>
                                     @error('médicament')
                                        <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="col-sm-2">
                                  <div>
                                      <h4 class="m-b-10"><strong>Dose</strong></h4>
                                      <input class="form-control @error('dose') is-invalid @enderror" type="text" name="dose[]">
                                      @error('dose')
                                        <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="col-sm-2">
                                  <div>
                                      <h4 class="m-b-10"><strong>Duree</strong></h4>
                                      <input class="form-control @error('duree_traitement') is-invalid @enderror" type="text" name="duree_traitement[]">
                                      @error('duree_traitement')
                                        <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror
                                  </div>
                              </div>
                              <div class="col-sm-2">
                                  <div>
                                      <h4 class="m-b-10"><strong>Moment Prises</strong></h4>
                                      <select class="form-control select @error('moment_prises') is-invalid @enderror" name="moment_prises[]">
                                        <option>Matin</option>
                                        <option>Soir</option>
                                     </select>
                                      @error('moment_prises')
                                        <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror
                                  </div>
                              </div>
                            </div>
                          </form>
                          <div class="m-t-30">
                             <center><button  class="btn btn-success" id ="demo" onclick="addMedecament()">Add Medicament</button></center>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="row m-t-30">
                    <div class="col-sm-5 col-4">
                        <h5 class="page-sub-title">All Ordinances :</h5>
                    </div>
                    <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table mb-0 ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Doctor</th>
                                            <th>Date</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($ordonnances as $ordonnance)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td class="lettre-contenu">Ordinance of Dr, 
                                              @if($ordonnance->nom_medecin == null and $ordonnance->prenom_medecin == null)
                                                @foreach($doctors as $doctor)
                                                  @if($doctor->id == $ordonnance->medecin_id)
                                                    {{strtoupper($doctor->nom)}} {{strtoupper($doctor->prenom)}}
                                                  @endif
                                                @endforeach
                                              @else
                                               {{strtoupper($ordonnance->nom_medecin)}} {{strtoupper($ordonnance->prenom_medecin)}}
                                              @endif
                                              </td>
                                            <td>{{$ordonnance->date}}</td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="{{ url('getOrdannance/'.$ordonnance->id )}}" target="_blank"><i class="fa fa-plus m-r-5"></i> Show</a>
                                                        <a class="dropdown-item" href="{{ url('generate-pdf/'.$ordonnance->id )}}"><i class="fa fa-print m-r-5"></i> Print</a>
                                                        <form action="{{ url('deleteOrdonnance') }}" method="post" id="deleteBtn">
                                                            {{  csrf_field() }}
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="idOrdonnance" value="{{$ordonnance->id}}">
                                                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#delete_department" onclick="deleteOrdonnance()"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
  <script src="{{asset('scrtrDoctorPage/js/ordonnance.js')}}"></script>
  <script>
 
    function addMedecament() {

      var txt1 ='<div class="col-sm-5 m-b-10" id="select'+idDiv+'"><div><h4 class="m-b-10"><strong>Name</strong></h4><select class="form-control select select-addMedecat" name="médicament[]" onchange="change(event)">@foreach($medicaments as $m)<option>{{$m->nom}}</option>@endforeach</select></div></div><div class="col-sm-2" id="dose'+idDiv+'"><div><h4 class="m-b-10"><strong>Dose</strong></h4><input class="form-control" type="text" name="dose[]"></div></div><div class="col-sm-2" id="duree'+idDiv+'"><div><h4 class="m-b-10"><strong>Duree</strong></h4><input class="form-control" type="text" name="duree_traitement[]"></div></div><div class="col-sm-2" id="moment'+idDiv+'"><div><h4 class="m-b-10"><strong>Moment Prises</strong></h4><select class="form-control select" name="moment_prises[]"><option>Matin</option><option>Soir</option></select></div></div><div class="col-sm-1" id="hide'+idDiv+'" onclick="deleteLigne(select'+idDiv+',dose'+idDiv+',duree'+idDiv+',moment'+idDiv+',hide'+idDiv+')"><div class="m-t-33"><a ><i class="fa fa-times text-red"></i></a></div></div>';
      $("#myList").append(txt1);
      idDiv++;
    };
  </script>
@endsection
