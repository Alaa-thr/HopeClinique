<!DOCTYPE html>
<html>
<head>
    <title>Hi</title>
</head>
<body>
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
              <div class="row">
                <div class="col-sm-5">
                    <div id="hh">
                        <h4 class="m-b-10"><strong>Médicament</strong></h4>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div>
                        <h4 class="m-b-10"><strong>Dose</strong></h4>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div>
                        <h4 class="m-b-10"><strong>Duree</strong></h4>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div>
                        <h4 class="m-b-10"><strong>Moment Prises</strong></h4>

                    </div>
                </div>
              </div>
          </div>
      </div>
  </div>
</body>
</html>
