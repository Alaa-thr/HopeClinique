<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Medecin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Prescription;
use App\Models\Ligne_Prescripton;

class PatientController extends Controller
{
    public function getNameUsers()
    {
        $nameUser = Medecin::find(Auth::user()->id)->nom.' '.Medecin::find(Auth::user()->id)->prenom;
        return $nameUser;
    }
    public function plusinformation(Request $request,$id){

        if($request->role == "patient")
          {
              $typeUser = "patient";
              $user = \DB::table('patients')->where([['id', $id]])->get();
              $user_id = \DB::table('patients')->where([['id', $id]])->value('user_id');
              $users   = \DB::table('users')->where([['id', $user_id]])->get();
              $rdvs   = \DB::table('rdvs')->where([['patient_id', $id]])->get();
              $medecins   = \DB::table('medecins')->get();
              $images   = \DB::table('images')->where([['patient_id', $id]])->get();
              $prescription   = \DB::table('prescriptions')->where([['patient_id', $id]])->get();
              $today = today();
              $date=Carbon::now()->format('Y-m-d');
              $patient = \DB::table('prescriptions')->where([['patient_id', $id],['date', $date]])
                    ->join('patients','patients.id','=','prescriptions.patient_id')
                    ->select('prescriptions.date','patients.nom','patients.prenom',
                    'patients.Num_Secrurite_Social','patients.date_naiss')
                    ->get();
              $prescriptions = \DB::table('prescriptions')->where([['patient_id', $id],['date', $date]])
                    ->join('ligne__prescriptons','ligne__prescriptons.prescription_id','=','prescriptions.id')
                    ->select('ligne__prescriptons.medicament as medicament',
                    'ligne__prescriptons.dose as dose','ligne__prescriptons.moment_prises as moment_prises',
                    'ligne__prescriptons.duree_traitement as duree_traitement')
                    ->get();
              return view('users.informationUsers',['patient'=>$patient,'prescriptions'=>$prescriptions,'nameUser'=>$this->getNameUsers(),
              'user' => $user,'users' => $users,'rdvs' => $rdvs,'medecins' => $medecins,'images' => $images,
              'typeUser' => $typeUser,'today'=>$today,'prescription'=>$prescription]);
         }
         elseif($request->role == "secretarie")
           {
             $typeUser = "secretarie";
             $user = \DB::table('secretaires')->where([['id', $id]])->get();
             $user_id = \DB::table('secretaires')->where([['id', $id]])->value('user_id');
             $users   = \DB::table('users')->where([['id', $user_id]])->get();
             return view('users.informationUsers',['nameUser'=>$this->getNameUsers(),'user' => $user,'users' => $users,'typeUser' => $typeUser]);
         }

        elseif($request->role == "doctor")
          {
            $typeUser = "doctor";
            $user = \DB::table('medecins')->where([['id', $id]])->get();
            $user_id = \DB::table('medecins')->where([['id', $id]])->value('user_id');
            $users   = \DB::table('users')->where([['id', $user_id]])->get();
            return view('users.informationUsers',['nameUser'=>$this->getNameUsers(),'user' => $user,'users' => $users,'typeUser' => $typeUser]);
        }
    }
    public function getsearchPatient(Request $request){

        $search = $request->get('search');//prendre le mot qui nous saisissons
        $userP  = \DB::table('users')->get();

        if($request->searchp == "id")
        {
          $listeP  =\DB::table('patients')->where('Num_Secrurite_Social', 'like','%'.$search.'%')->get();
        }
      elseif($request->searchp == "name"){
        $listeP  =\DB::table('patients')->orWhere('nom', 'like', '%'.$search.'%')
                                        ->orWhere('prenom', 'like', '%'.$search.'%')
                                        ->get();
      }
      elseif($request->searchp == "phone"){
        $userP  =\DB::table('users')->orWhere('phone', 'like', '%'.$search.'%')
                                        ->get();
        $listeP  =\DB::table('patients')->get();
      }
    return view('search.SearchPatient',['nameUser'=>$this->getNameUsers(),'listeP'=>$listeP,'search' => $search,'userP'=>$userP]);
  }
  public function PageOrdonnance($id){

      $medicaments = \DB::table('medicaments')->orderBy('id','asc')->get();
      $listeP    =\DB::table('patients')->where([['id', $id]])->get();
      $date      =  Carbon::now()->format('Y-m-d');
      $idDoctorUser = Medecin::find(Auth::user()->id)->id;

      return view('adminPages.ordonnance',['nameUser'=>$this->getNameUsers(),'listeP'=>$listeP,
      'date'=>$date,'idDoctorUser'=>$idDoctorUser,'idPatient'=>$id,'medicaments'=>$medicaments]);
    }

    public function addOrdannance(Request $request)
    {

              $prescriptions = new Prescription();
              $prescriptions->medecin_id = $request->idDoctor;
              $prescriptions->patient_id = $request->idPatient;
              $prescriptions->date       = "2021-01-10 20:09:39";
              $prescriptions->save();

            //  $doseTable[];$médicamentTable[];$DureeTable[];

              foreach ($request->médicament as $m) {
                      $médicamentTable[]=$m;}

              foreach ($request->duree_traitement as $d) {
                        $DureeTable[]=$d;}
              foreach ($request->dose as $dd) {
                        $doseTable[]=$dd;}
              foreach ($request->moment_prises as $p) {
                        $momentTable[]=$p;}

                  $i=0;
                foreach ($request->médicament as $m) {
                          $ligne_prescriptions = new Ligne_Prescripton();
                          $ligne_prescriptions->prescription_id = $prescriptions->id;
                          $ligne_prescriptions->medicament      = $médicamentTable[$i];
                          $ligne_prescriptions->dose            = $doseTable[$i];
                          $ligne_prescriptions->moment_prises   = $doseTable[$i];
                          $ligne_prescriptions->duree_traitement= $momentTable[$i];
                            $i++;
                          $ligne_prescriptions->save();
                        }



          return back();

    }
}
