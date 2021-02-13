@extends('layouts.scrtrDoctorApp')
@section('content')
<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-5 col-4">
                        <h4 class="page-title">Comment</h4>
                    </div>
                </div>
              <div class="dash-widget">
                @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> The 
                            <a href="#" class="alert-link">Comment</a>
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
                        <h5 class="page-sub-title">Add Comment :</h5>
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
                                        <?php $comment = $p->commentaire; ?>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                             <form action="{{ url('ADDcommentaire') }}" method="post">
                                 {{  csrf_field() }}
                                 <div class="row">
                                    <div class="col-sm-9 col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label><b>Comment:</b><span class="text-danger">*</span></label>
                                            @if($comment == null)
                                                <button class="btn btn btn-primary float-right" >
                                                  <i class="fa fa-plus"></i>Add Comment
                                                </button>
                                            @else

                                                <button class="btn btn btn-success float-right" > Update Comment
                                                </button>
                                                <a  class="btn btn btn-danger float-right m-r-15 text-white" onclick="deleteComment()"> Delete
                                                </a>
                                            @endif
                                            <input type="hidden" value="{{$idPatient}}" name="idPatient"/>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control @error('content') is-invalid @enderror" type="text" name="content" id="causeAddBtn">{{$comment}}</textarea>
                                                @error('content')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>
                                 </div>
                            </form>
                            <form action="{{ url('deleteComment') }}" method="post" id="deleteBtn">
                                 {{  csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="idPatient" value="{{$idPatient}}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <script src="{{asset('scrtrDoctorPage/js/comment.js')}}"></script>
@endsection
