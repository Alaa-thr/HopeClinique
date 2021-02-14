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
@endsection
