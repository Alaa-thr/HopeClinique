<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Medecin;
use App\Models\Secretaire;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Prescription;
use App\Models\Ligne_Prescripton;
use App\Models\Rdv;
use App\Models\Image;
use App\Models\Lettre_Orientation;
use Illuminate\Http\Facades\UploadedFile;

class PatientController extends Controller
{
   public function getNameUsers()
    {
        $nameUser = null;
        
        if(Auth::user()->user_roles == 'doctor' || Auth::user()->user_roles == 'adminM'){
            $nameUser = \DB::table('medecins')->where('user_id',Auth::user()->id)->select('nom','prenom','avatar')->get();
          
        }else if(Auth::user()->user_roles == 'secretaire'){
            $nameUser = \DB::table('secretaires')->where('user_id',Auth::user()->id)->select('nom','prenom','avatar')->get();
        }
        return  $nameUser;
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
              $ligne__prescriptons = \DB::table('prescriptions')->where([['patient_id', $id]])
                    ->join('ligne__prescriptons','ligne__prescriptons.prescription_id','=','prescriptions.id')
                    ->select('prescriptions.id','ligne__prescriptons.prescription_id','ligne__prescriptons.medicament',
                    'ligne__prescriptons.dose','ligne__prescriptons.moment_prises',
                    'ligne__prescriptons.duree_traitement')
                    ->get();

              return view('users.informationUsers',['patient'=>$patient,'prescriptions'=>$prescriptions,'users'=>$this->getNameUsers(),
              'user' => $user,'usersSelect' => $users,'rdvs' => $rdvs,'medecins' => $medecins,'images' => $images,'typeUser' => $typeUser,'today'=>$today,'prescription'=>$prescription]);
         }
         elseif($request->role == "secretarie")
           {
             $typeUser = "secretarie";
             $user = \DB::table('secretaires')->where([['id', $id]])->get();
             $user_id = \DB::table('secretaires')->where([['id', $id]])->value('user_id');
             $users   = \DB::table('users')->where([['id', $user_id]])->get();
             return view('users.informationUsers',['nameUser'=>$this->getNameUsers(),'user' => $user,'usersSelect' => $users,'typeUser' => $typeUser]);
         }

        elseif($request->role == "doctor")
          {    
            $typeUser = "doctor";
            $user = \DB::table('medecins')->where([['id', $id]])->get();
            $user_id = \DB::table('medecins')->where([['id', $id]])->value('user_id');
            $users   = \DB::table('users')->where([['id', $user_id]])->get();
            
            return view('users.informationUsers',['users'=>$this->getNameUsers(),'user' => $user,'usersSelect' => $users,'typeUser' => $typeUser]);
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
    return view('search.SearchPatient',['users'=>$this->getNameUsers(),'listeP'=>$listeP,'search' => $search,'userP'=>$userP]);
  }
  public function addOrdannance(Request $request)
  {

      $prescriptions             = new Prescription();
      $prescriptions->medecin_id = $request->idDoctor;
      $prescriptions->patient_id = $request->idPatient;
      $prescriptions->date       =  Carbon::now()->format('Y-m-d');
      $prescriptions->save();

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
                  $ligne_prescriptions->moment_prises   = $momentTable[$i];
                  $ligne_prescriptions->duree_traitement= $DureeTable[$i];
                    $i++;
                  $ligne_prescriptions->save();
                }
              return back();

  }
  public function PageOrdonnance($id){

      $medicaments = \DB::table('medicaments')->orderBy('id','asc')->get();
      $listeP    =\DB::table('patients')->where([['id', $id]])->get();
      $date      =  Carbon::now()->format('Y-m-d');
      $idDoctorUser = Medecin::find(Auth::user()->id)->id;

      return view('adminPages.ordonnance',['users'=>$this->getNameUsers(),'listeP'=>$listeP,
      'date'=>$date,'idDoctorUser'=>$idDoctorUser,'idPatient'=>$id,'medicaments'=>$medicaments]);
    }

    public function addImageriePatient(Request $request){

        if($request->hasFile('image')){
            foreach ($request->image as $imgs) {// pour les photos du produits
              $images = new Image;
              $images->image = $imgs->store('users_Avatar/patient');
              $images->patient_id = $request->idPatient;
              $images->save();
                                              }
                                        }
    return back();
  }

  public function lettre($id){

      $date      =  Carbon::now()->format('Y-m-d');
      $listeP    =\DB::table('patients')->where([['id', $id]])->get();

      return view('adminPages.lettreOrientation',['nameUser'=>$this->getNameUsers(),'listeP'=>$listeP,'idPatient'=>$id,'date'=>$date]);
    }
    public function ADDLettre(Request $request){

        $lettre_orientations             = new Lettre_Orientation();
        $lettre_orientations->medecin_id = Medecin::find(Auth::user()->id)->id;
        $lettre_orientations->patient_id = $request->idPatient;
        $lettre_orientations->date       =  Carbon::now()->format('Y-m-d');
        $lettre_orientations->contenu    =  $request->cause;
        $lettre_orientations->save();

        return back();
      }
      public function commentaire($id){

          $date      =  Carbon::now()->format('Y-m-d');
          $listeP    =\DB::table('patients')->where([['id', $id]])->get();

          return view('adminPages.commentaire',['nameUser'=>$this->getNameUsers(),'listeP'=>$listeP,'idPatient'=>$id,'date'=>$date]);
        }
        public function ADDcommentaire(Request $request){

            $patients = Patient::find($request->idPatient);
            $patients->commentaire = $patients->commentaire." ,".$request->contenu;
            $patients->save();
          echo $patients->commentaire;

            return back();
          }
}
