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
      margin-top: 20px;
    }
    table{
      margin-top: 10px;
      border: 10;
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
              <h2 class="payslip-title"  id="divCliniquePDF">Clinique HopeClinique - TLEMCEN</h2>
              @foreach($patient as $patien)
              <div class="row">
                <div class="txt">
                 <b>Tlemcen,le</b> &nbsp;&nbsp;&nbsp;&nbsp;{{$patien->date}}
                  
                </div>
                <div class="txt">
                  <b>Docteur : </b>&nbsp;&nbsp;&nbsp;&nbsp;{{$users}}
                
                </div>
                <div class="txt">
                  <b>Spécialité : </b>&nbsp;&nbsp;&nbsp;&nbsp;{{$specialite}}
                  
                </div>
              </div>
              <hr>
              <div class="row">
                 <div>
                    <table>
                      <tbody>
                        <tr>
                          <th><h3>Mon cher confrère, </h3></th>
                        </tr>
                        <tr>
                          <td>Je vous adresse :<strong>{{strtoupper ($patien->nom ) }} {{strtoupper ($patien->prenom) }}</strong>,
                           </td>
                         </tr>
                         <tr>
                          <td>qui m'a consulté pour: <strong>{{ $patien->contenu }}</strong></td>
                        </tr>
                         <tr>
                          <td>vous l'adresse pour avis. </td>
                        </tr>
                        <tr>
                          <td>je vous remercie de l'attention que vous lui portez et vous prie
                              se croire, Mon cher confrère, en l'expression de mes sentiments
                              confraternels. </td>
                        </tr>
                      </tbody>
                    </table>
                 </div>
              </div>
              @endforeach
          </div>    
      </div>
</body>
</html>
