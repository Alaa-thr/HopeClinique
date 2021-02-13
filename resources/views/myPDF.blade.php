<!DOCTYPE html>
<html>
<style>
    #divCliniquePDF{
      text-align: center;
      margin-top: -15px;
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
      margin-top: 20px;
    }
    table{
      margin-top: 10px;
      border: 10;
    }
    tr{
      width: 100%;
    }
    td{
      width: 120px;
      height: 60px;
    }
    .row{
        margin-top: 50px;
        margin-left: 20px;
        margin-right: 20px;
        
    }
    .card-box{
      margin-left: 5px;
      margin-right: 5px;
    }
    .txt{
      height: 35px;
    }
</style>
<body>
  <div class="row">
          <div class="card-box">
              <h2 id="divCliniquePDF">Clinique HopeClinique - TLEMCEN</h2>
              @foreach($patient as $patien)
              <div class="row">
                <div class="txt" style="text-align: center;font-size: 20px;margin-bottom: 10px">
                  <b>
                    Dr.{{strtoupper($users)}}
                  </b>
                </div>
                <div class="txt">
                  <b>Tlemcen,le</b> &nbsp;&nbsp;&nbsp;&nbsp;{{$patien->date}}
                </div>
                <div class="txt">
                  <b>Nom et prénom :</b>&nbsp;&nbsp;&nbsp;&nbsp;
                    {{strtoupper ($patien->nom ) }} {{strtoupper ($patien->prenom) }}
                  
                </div>
                <div class="txt">
                  <b>Date de naissance:</b>&nbsp;&nbsp;&nbsp;&nbsp;
                    {{$patien->date_naiss}}
                  
                </div>
              </div>
              @endforeach
              <hr>
              <div class="row">
                    <table style="width: 100%">
                      <tbody>
                        @foreach($prescriptions as $pres)
                        <tr>
                          <td><b>Médicament :</b> {{$pres->medicament}}</td>
                          <td><b>Dose :</b> {{$pres->dose}}</td>
                          <td><b>Duree :</b> {{$pres->duree_traitement}}</td>
                          <td><b>Moment Prises :</b> {{$pres->moment_prises}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
              </div>
              
          </div>
      </div>
</body>
</html>
