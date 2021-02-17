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
use App\Http\Requests\AddLettreOrnt;
use App\Http\Requests\AddOrdonnance;
use App\Http\Requests\AddComment;

class PatientController extends Controller
{
   public function getNameUsers()
    {
        $nameUser = null;

        if(Auth::user()->user_roles == 'doctor' || Auth::user()->user_roles == 'adminM'){
            $nameUser = \DB::table('medecins')->where('user_id',Auth::user()->id)->select('nom','prenom','avatar')->get();

        }else if(Auth::user()->user_roles == 'secretaire'){
            $nameUser = \DB::table('secretaires')->where('user_id',Auth::user()->id)->select('nom','prenom','avatar')->get();
        }else if(Auth::user()->user_roles == 'patient'){
          $nameUser = \DB::table('patients')->where('user_id',Auth::user()->id)->get();
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
              $rdvs   = \DB::table('rdvs')->where([['patient_id', $id]])->orderBy('created_at','desc')->get();
              $medecins   = \DB::table('medecins')->get();
              $images   = \DB::table('images')->where([['patient_id', $id]])->get();
              $prescription   = \DB::table('prescriptions')
                ->where([['patient_id', $id],['deleted',0]])
                ->select('date','medecin_id','nom_medecin','prenom_medecin','id')
                ->orderBy('created_at','desc')
                ->get();
              $doctors = \DB::table('medecins')->select('id','nom','prenom')->get();
              $lettres = \DB::table('lettre__orientations')->where('patient_id', $id)->get();
              $today = today();
              $date=Carbon::now()->format('Y-m-d');
              $patient = \DB::table('prescriptions')->where([['patient_id', $id],['date', $date]])
                    ->join('patients','patients.id','=','prescriptions.patient_id')
                    ->select('prescriptions.date','patients.nom','patients.prenom',
                    'patients.Num_Secrurite_Social','patients.date_naiss')
                    ->get();
              $ligne__prescriptons = \DB::table('prescriptions')->where([['patient_id', $id],['deleted',0]])
                    ->join('ligne__prescriptons','ligne__prescriptons.prescription_id','=','prescriptions.id')
                    ->select('prescriptions.id','ligne__prescriptons.prescription_id','ligne__prescriptons.medicament',
                    'ligne__prescriptons.dose','ligne__prescriptons.moment_prises',
                    'ligne__prescriptons.duree_traitement')
                    ->get();

              return view('users.informationUsers',['patient'=>$patient,'users'=>$this->getNameUsers(),
              'user' => $user,'usersSelect' => $users,'rdvs' => $rdvs,'medecins' => $medecins,'doctors' => $doctors,'images' => $images,'typeUser' => $typeUser,'today'=>$today,'prescription'=>$prescription,'ligne__prescriptons'=>$ligne__prescriptons,'lettres'=>$lettres]);
         }
         elseif($request->role == "secretarie")
           {
             $typeUser = "secretarie";
             $user = \DB::table('secretaires')->where([['id', $id]])->get();
             $user_id = \DB::table('secretaires')->where([['id', $id]])->value('user_id');
             $users   = \DB::table('users')->where([['id', $user_id]])->get();
             return view('users.informationUsers',['users'=>$this->getNameUsers(),'user' => $user,'usersSelect' => $users,'typeUser' => $typeUser]);
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

      if($request->search != "" && $request->searchp != ""){
        $listeP  =\DB::table('patients')->orWhere('nom', 'like', '%'.$request->search.'%')
                                       ->orWhere('prenom', 'like', '%'.$request->search.'%')
                                       ->get();
        $userP  =\DB::table('users')->orWhere('phone', 'like', '%'.$request->searchp.'%')
                                       ->get();
      }
      elseif($request->search != ""){
        $listeP  =\DB::table('patients')->orWhere('nom', 'like', '%'.$request->search.'%')
                                        ->orWhere('prenom', 'like', '%'.$request->search.'%')
                                        ->get();
      }
      elseif($request->searchp != ""){
        $userP  =\DB::table('users')->orWhere('phone', 'like', '%'.$request->searchp.'%')
                                        ->get();
        $listeP  =\DB::table('patients')->get();
      }

    return view('search.SearchPatient',['users'=>$this->getNameUsers(),'listeP'=>$listeP,'search' => $search,'userP'=>$userP]);
  }
  public function addOrdannance(AddOrdonnance $request)
  {

      $prescriptions             = new Prescription();
      $prescriptions->medecin_id = $request->idDoctor;
      $prescriptions->patient_id = $request->idPatient;
      $prescriptions->date       =  Carbon::now()->format('Y-m-d');
      $prescriptions->save();

      foreach ($request->médicament as $m) {
              $médicamentTable[]=$m;
      }
      foreach ($request->duree_traitement as $d) {
                $DureeTable[]=$d;
      }
      foreach ($request->dose as $dd) {
                $doseTable[]=$dd;
      }
      foreach ($request->moment_prises as $p) {
                $momentTable[]=$p;
      }

          $i=0;
        foreach ($request->médicament as $m) {
                  $ligne_prescriptions = new Ligne_Prescripton();
                  if($doseTable[$i] != null  && $DureeTable[$i] != null){
                    $ligne_prescriptions->prescription_id = $prescriptions->id;
                    $ligne_prescriptions->medicament      = $médicamentTable[$i];
                    $ligne_prescriptions->dose            = $doseTable[$i];
                    $ligne_prescriptions->moment_prises   = $momentTable[$i];
                    $ligne_prescriptions->duree_traitement= $DureeTable[$i];
                    $ligne_prescriptions->save();

                  }
                  $i++;
        }
        return back()->withSuccess("add");

  }

  public function deleteOrdonnance(Request $request){

        $ordonnances  = Prescription::where('id',$request->idOrdonnance)->update(['deleted' => 1]);
        return  back()->withSuccess("delete");
  }

  public function PageOrdonnance($id){

      $medicaments = \DB::table('medicaments')->orderBy('id','asc')->get();
      $listeP    =\DB::table('patients')->where([['id', $id]])->get();
      $date      =  Carbon::now()->format('Y-m-d');
      $idDoctorUser = Medecin::find(Auth::user()->id)->id;
      $ordonnances  = \DB::table('prescriptions')
                ->where([['patient_id', $id],['deleted',0]])
                ->select('date','medecin_id','nom_medecin','prenom_medecin','id')
                ->orderBy('created_at','desc')
                ->get();
      $doctors = \DB::table('medecins')->select('id','nom','prenom')->get();
      return view('adminPages.ordonnance',['users'=>$this->getNameUsers(),'listeP'=>$listeP,
      'date'=>$date,'idDoctorUser'=>$idDoctorUser,'idPatient'=>$id,'medicaments'=>$medicaments,'ordonnances'=>$ordonnances,'doctors'=>$doctors]);
  }

    public function addImageriePatient(Request $request){

        if($request->hasFile('image')){
            foreach ($request->image as $imgs) {
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
      $lettres = \DB::table('lettre__orientations')->where([['patient_id', $id]])->orderBy('created_at', 'desc')->select('id','date','contenu')->get();

      return view('adminPages.lettreOrientation',['users'=>$this->getNameUsers(),'listeP'=>$listeP,'idPatient'=>$id,'date'=>$date,'lettres'=>$lettres]);
    }
    public function ADDLettre(AddLettreOrnt $request){

        $lettre_orientations             = new Lettre_Orientation();
        $lettre_orientations->medecin_id = Medecin::find(Auth::user()->id)->id;
        $lettre_orientations->patient_id = $request->idPatient;
        $lettre_orientations->date       =  Carbon::now()->format('Y-m-d');
        $lettre_orientations->contenu    =  $request->cause;
        $lettre_orientations->save();

        return back()->withSuccess("add");
    }
    public function updateLettre(AddLettreOrnt $request){

        $lettre_orientations  = Lettre_Orientation::find($request->idLettre);
        $lettre_orientations->contenu    =  $request->cause;
        $lettre_orientations->save();

        return  back()->withSuccess("update");
    }

    public function deleteLettre(Request $request){

        $lettre_orientations  = Lettre_Orientation::find($request->idLettre);
        $lettre_orientations->delete();

        return  back()->withSuccess("delete");
    }
    public function commentaire($id){

          $date      =  Carbon::now()->format('Y-m-d');
          $listeP    =\DB::table('patients')->where([['id', $id]])->get();

          return view('adminPages.commentaire',['users'=>$this->getNameUsers(),'listeP'=>$listeP,'idPatient'=>$id,'date'=>$date]);
    }
    public function ADDcommentaire(AddComment $request){

            $patients = Patient::find($request->idPatient);
            $patients->commentaire = $request->content;
            $patients->save();

            return back()->withSuccess("add");
    }
    public function deleteComment(Request $request){

            $patients = Patient::find($request->idPatient);
            $patients->commentaire = null;
            $patients->save();

            return back()->withSuccess("delete");
    }
    public function allOrdinancesPatient()
    {
      $medicaments = \DB::table('medicaments')->orderBy('id','asc')->get();
      $listeP    =\DB::table('patients')->where('user_id',Auth::user()->id)->get();
      $date      =  Carbon::now()->format('Y-m-d');
      $idd    =\DB::table('patients')->where('user_id',Auth::user()->id)->value('id');
      $ordonnances  = \DB::table('prescriptions')
                ->where([['patient_id',$idd ],['deleted',0]])
                ->select('date','medecin_id','nom_medecin','prenom_medecin','id')
                ->orderBy('created_at','desc')
                ->get();
      $doctors = \DB::table('medecins')->select('id','nom','prenom')->get();
      return view('users.Allordonnance',['users'=>$this->getNameUsers(),'listeP'=>$listeP,
      'date'=>$date,'idPatient'=>'user_id',Auth::user()->id,'medicaments'=>$medicaments,'ordonnances'=>$ordonnances,'doctors'=>$doctors]);
    }
    public function app($id){
          $allPatients = Patient::All();
          $allDoctors = Medecin::All();
          return view('secrtrDoctorPages.updatAppointment',['users'=>$this->getNameUsers(),'allPatients'=>$allPatients,'allDoctors'=>$allDoctors]);
      }
}
