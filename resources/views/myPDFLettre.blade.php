<!DOCTYPE html>
<html>
<style>
    #divCliniquePDF{
      text-align: center;
      margin-top: -10px;
      margin-bottom: 5px;
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
      border: 10;
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
                          <h5 class="txt"><strong>Tlemcen,le &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                     {{$patien->date}}
                                              </strong>
                          </h5>
                          <h5 class="txt"><strong>Docteur :  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    {{$nameUser}}
                                              </strong>
                          </h5>
                          <h5 class="txt"><strong>Spécialité:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                      {{$specialite}}
                                              </strong>
                          </h5>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-striped custom-table">
                      <tbody>
                        <tr>
                          <th>Mon cher confrère, </th>
                        </tr>
                        <tr>
                          <td>Je vous adresse :{{strtoupper ($patien->nom ) }} {{strtoupper ($patien->prenom) }},
                           </td>
                         </tr>
                         <tr>
                          <td>qui m'a consulté pour: <strong>{{ $patien->contenu }}<strong></td>
                        </tr>
                         <tr>
                          <td>vous l'adresse pour avis, </td>
                        </tr>
                        <tr>
                          <td>je vous remercie de l'attention que vous lui portez et vous prie
                              se croire, Mon cher confrère, en l'expression de mes sentiments
                              confraternels, </td>
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
