@extends('layouts.scrtrDoctorApp')
@section('content')
<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-5 col-4">
                        <h4 class="page-title">Add Ordonnance</h4>
                    </div>
                    <div class="col-sm-7 col-8 text-right m-b-30">
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-white">CSV</button>
                            <button class="btn btn-white">PDF</button>
                            <form action="{{ url('generate-pdf')}}" method="get">
                               <button class="btn btn-white" >
                                 <i class="fa fa-print fa-lg"></i> Print
                               </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box" id="divClinique">
                            <h4 class="payslip-title">Clinique HopeClinique Dr.{{$nameUser}} - TLEMCEN</h4>
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
                                        <li><h5 class="txt"><strong>N de Secrurite_Social:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$p->Num_Secrurite_Social}}</strong></h5></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div id="add">
                              <button  class="btn btn-success" id ="demo" onclick="myFunction()">Add Médicament</button>
                            </div>
                            <form enctype="multipart/form-data" action="{{ url('ADDOrdonnance') }}" method="post">
                             {{  csrf_field() }}
                            <div class="row" id="myList">
                              <div class="col-sm-5">
                                  <div id="hh">
                                      <h4 class="m-b-10"><strong>Médicament</strong></h4>
                                      <select class="form-control select" name="médicament[]" id="medicament" multiple>
                                        @foreach($medicaments as $m)
                                       <option>{{$m->nom}}</option>
                                       @endforeach
                                     </select>
                                  </div>
                              </div>
                              <div class="col-sm-2">
                                  <div>
                                      <h4 class="m-b-10"><strong>Dose</strong></h4>
                                      <input class="form-control" type="text" name="dose[]">
                                  </div>
                              </div>
                              <div class="col-sm-2">
                                  <div>
                                      <h4 class="m-b-10"><strong>Duree</strong></h4>
                                      <input class="form-control" type="text" name="duree_traitement[]">
                                  </div>
                              </div>
                              <div class="col-sm-3">
                                  <div>
                                      <h4 class="m-b-10"><strong>Moment Prises</strong></h4>
                                      <select class="form-control select" name="moment_prises[]">
                                        <option>Matin</option>
                                        <option>Soir</option>
                                     </select>
                                  </div>
                              </div>
                            </div>
                            <div id="ch" class="col-sm-4">
                                  <input type="hidden" value="{{$idDoctorUser}}" name="idDoctor"/>
                                  <input type="hidden" value="{{$idPatient}}" name="idPatient"/>
                                  <button class="btn btn btn-primary">
                                    <i class="fa fa-plus"></i>
                                     Add Ordonnance</button>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <script>
          function myFunction() {
            var txt1 ="<div id='fonction'><div class='row'><div class='col-sm-5'><div><h4 class='m-b-10'><strong>Médicament</strong></h4><select class='form-control select' name='médicament[]'>@foreach($medicaments as $m)<option>{{$m->nom}}</option>@endforeach</select></div></div><div class='col-sm-2'><div><h4 class='m-b-10'><strong>Dose</strong></h4><input class='form-control' type='text' name='dose[]'></div></div><div class='col-sm-2'><div><h4 class='m-b-10'><strong>Duree</strong></h4><input class='form-control' type='text' name='duree_traitement[]'></div></div><div class='col-sm-3'><div><h4 class='m-b-10'><strong>Moment Prises</strong></h4><select class='form-control select' name='moment_prises[]'><option>Matin</option><option>Soir</option></select></div></div></div></div>";
            $("#myList").append(txt1);
          };
          </script>
@endsection
