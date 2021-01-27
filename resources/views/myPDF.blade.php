<!DOCTYPE html>
<html>
<style>
    #divCliniquePDF{
      text-align: center;
      margin-top: -10px;
      margin-bottom: 5px;
    }
    h3{
      margin-left: 550px;
      width: 300px;
    }
    h5{
      margin-top: 15px;
    }
    hr{
      width: 1000px;
      margin-left: -50px;
      margin-bottom: 20px;
    }
    table{
      margin-top: 10px;
    }
    th{
      width: 200px;
    }
    td{
      width: 100px;
    }
</style>
<body>
  <div class="row">
      <div class="col-md-12">
          <div class="card-box">
              <h4 class="payslip-title"  id="divCliniquePDF">Clinique HopeClinique - TLEMCEN</h4>
              <div class="row">
                  <div class="col-sm-6 m-b-20">
                  </div>
              </div>
              @foreach($patient as $patien)
              <div class="row">
                          <h3 class="txt"><strong>
                                           Dr.{{$nameUser}}
                                    </strong>
                          </h3>
                          <h5 class="txt"><strong>Tlemcen,le &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                     {{$patien->date}}
                                              </strong>
                          </h5>
                          <h5 class="txt"><strong>Nom et prénom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                      {{strtoupper ($patien->nom ) }} {{strtoupper ($patien->prenom) }}
                                              </strong>
                          </h5>
                          <h5 class="txt"><strong>Date de naissance:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                      {{$patien->date_naiss}}
                                              </strong>
                          </h5>
                          <h5 class="txt"><strong>N de Secrurite_Social:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                      {{$patien->Num_Secrurite_Social}}
                                              </strong>
                          </h5>
              </div>
              @endforeach
              <hr>
              @foreach($prescriptions as $pres)
              <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-striped custom-table">
                      <tbody>
                        <tr>
                          <th>Médicament: {{$pres->medicament}}</th>
                          <td>Dose : {{$pres->dose}}</td>
                          <td>Duree : {{$pres->duree_traitement}}</td>
                          <td>Moment Prises : {{$pres->moment_prises}}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              @endforeach
          </div>
      </div>
  </div>
</body>
</html>
