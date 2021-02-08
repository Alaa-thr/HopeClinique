@extends('layouts.scrtrDoctorApp')
@section('content')
<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-5 col-4">
                        <h4 class="page-title">Add Commantaire</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box" id="divClinique">
                            <h4 class="payslip-title">Clinique HopeClinique</h4>
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
                            <form enctype="multipart/form-data" action="{{ url('ADDcommentaire') }}" method="post">
                             {{  csrf_field() }}
                             <div class="row">
                             	<div class="col-sm-9">
                             			<div class="form-group">
                             					<label>Contenu:<span class="text-danger">*</span></label>
                             					<textarea id="textareaLettre" class="form-control @error('contenu') is-invalid @enderror" type="text" name="contenu"></textarea>
                             					@error('contenu')
                             								<span class="invalid-feedback" role="alert">
                             										<strong>{{ $message }}</strong>
                             								</span>
                             					@enderror
                             			</div>
                             	</div>
                             </div>
                            <div id="chLettre" class="col-sm-4">
                                  <input type="hidden" value="{{$idPatient}}" name="idPatient"/>
                                  <button class="btn btn btn-primary">
                                    <i class="fa fa-plus"></i>
                                     Add Commantaire</button>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
@endsection