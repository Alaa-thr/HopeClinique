@extends('layouts.scrtrDoctorApp')
@section('content')


	        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Plus Informations</h4>
                    </div>
                </div>
                {{  csrf_field() }}
                @foreach($patient as $p)    @foreach($users as $u)
                <div class="card-box">
                    <h3 class="card-title">Basic Informations</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-3">
                                            <label class="focus-label">First Name</label>
                                            <input type="text" class="form-control floating"  value="{{$p->nom}}"disabled>
                                    </div>
                                    <div class="col-md-3">
                                            <label class="focus-label">Last Name</label>
                                            <input type="text" class="form-control floating"  value="{{$p->prenom}}"disabled>
                                    </div>
                                    <div class="col-md-3">
                                            <label class="focus-label">Gender</label>
                                            <input type="text" class="form-control floating " value="{{$p->gender}}"disabled>
                                    </div>
                                </div>
                                <div style="padding:20px;"></div>
                                <div class="row">
                                    <div class="col-md-3">
                                            <label class="focus-label">Ville</label>
                                            <input type="text" class="form-control floating"  value="{{$p->ville}}"disabled>
                                    </div>
                                    <div class="col-md-3">
                                            <label class="focus-label">Num_Secrurite_Social</label>
                                            <input type="text" class="form-control floating " value="{{$p->Num_Secrurite_Social}}" disabled>
                                    </div>
                                    <div class="col-md-3">
                                            <label class="focus-label">date_naiss</label>
                                            <input type="text" class="form-control floating " value="{{$p->date_naiss}}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-box">
                    <h3 class="card-title">Contact Informations</h3>
                    <div class="row">
                      <div class="col-md-6">
                              <label class="focus-label">Email</label>
                              <input type="text" class="form-control floating"  value="{{$u->email}}" disabled>
                      </div>
                      <div class="col-md-6">
                              <label class="focus-label">Phone</label>
                              <input type="text" class="form-control floating"  value="{{$u->phone}}" disabled>
                      </div>
                    </div>
                </div>
                <div class="card-box">
                    <h3 class="card-title"> Maladie Chronique  Informations</h3>
                    <div class="row">
                        <div class="col-md-3">
                          <b>{{$p->maladie_chronique}}</b>
                        </div>
                    </div>
                </div>
                <div class="card-box">
                    <h3 class="card-title"> Allergie Informations</h3>
                    <div class="row">
                        <div class="col-md-3">
                          <b>{{$p->allergie}}</b>
                        </div>
                    </div>
                </div>
                <div class="card-box">
                    <h3 class="card-title"> Antecedent Informations</h3>
                    <div class="row">
                        <div class="col-md-3">
                          <b>{{$p->antecedent}}</b>
                        </div>
                    </div>
                </div>
                <div class="card-box">
                    <h3 class="card-title"> Commentaire: </h3>
                    <div class="row">
                        <div class="col-md-3">
                                <b>{{$p->commentaire}}</b>
                        </div>
                    </div>
                </div>
								<div class="card-box">
										<h3 class="card-title"> RDV: </h3>
								<div class="row doctor-grid">
									@foreach($rdvs as $r)    @foreach($medecins as $m)
									 @if($r->medecin_id == $m->id || $r->medecin_id == NULL)
				          <div class="col-md-4 col-sm-4  col-lg-3">
				                        <div class="profile-widget" id="br">
																	<h4 class="doctor-name text-ellipsis"><a href="profile.html">P:{{strtoupper ($p->nom ) }} {{strtoupper ($p->prenom) }}</a></h4>
																	@if($r->medecin_id == NULL)
																		<h4 class="doctor-name text-ellipsis"><a href="profile.html">M:{{strtoupper ($r->nom_medecin ) }} {{strtoupper ($r->prenom_medecin) }}</a></h4>
																		@elseif($r->medecin_id != NULL)
																		<h4 class="doctor-name text-ellipsis"><a href="profile.html">M:{{strtoupper ($m->nom ) }} {{strtoupper ($m->prenom) }}</a></h4>
																		@endif
																		<div class="doc-prof">Date:{{$r->date}}</div>
																	  <div class="doc-prof">Debu:{{$r->heure_debut}}</div>
																		<div class="doc-prof">Fin:{{$r->heure_fin}} </div>
																		<div class="doc-prof">Motif:{{$r->motif}}</div>
				                        </div>
				          </div>
									@endif
									@endforeach          @endforeach
				       </div></div>
								<div class="card-box">
										<h3 class="card-title"> Lettre: </h3>
										<div class="row">
												<div class="col-md-3">
																<b>{{$p->commentaire}}</b>
												</div>
										</div>
								</div>
								<div class="card-box">
										<h3 class="card-title"> Ordenance: </h3>
										<div class="row">
												<div class="col-md-3">
																<b>{{$p->commentaire}}</b>
												</div>
										</div>
								</div>
								<div class="card-box">
										<h3 class="card-title"> Imageries: </h3>
					            <div class="content">
													<div id="lightgallery" class="row">
														@foreach($images as $img)
  													<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 m-b-20">
					                    <a href="{{asset('storage/'.$img->image)}}">
					                     <img class="img-thumbnail" src="{{asset('storage/'.$img->image)}}" alt="" id="c">
					                    </a>
					                   </div>
														@endforeach
													</div>
					            </div>
 										<div class="sidebar-overlay" data-reff=""></div>
									</div>
                @endforeach  @endforeach
              </div>
          </div>
@endsection
