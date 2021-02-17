<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Medecin;
use App\Models\Secretaire;
use App\Models\Patient;
use App\Models\User;
use App\Models\Rdv;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AddUsersRequest;
use App\Http\Requests\AddAppointment;
use App\Http\Controllers\AdminController;
use App\Models\Specialite;

class ScrtrDocAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	public function getNameUsers()
    {
        $nameUser = null;

        if(Auth::user()->user_roles == 'doctor' || Auth::user()->user_roles == 'adminM'){
            $nameUser = \DB::table('medecins')->where('user_id',Auth::user()->id)->select('nom','prenom','avatar')->get();

        }else if(Auth::user()->user_roles == 'secretaire'){
            $nameUser = \DB::table('secretaires')->where('user_id',Auth::user()->id)->select('nom','prenom','avatar')->get();
        }else if(Auth::user()->user_roles == 'patient'){
          $nameUser = \DB::table('patients')->where('user_id',Auth::user()->id)->select('nom','prenom')->get();
        }
        return  $nameUser;
    }

    public function dashboard()
    {
      $data3[]=0;$data4[]=0;

      $nombrDoctors =  \DB::table("medecins")->count();
      $nombrPatients = \DB::table("patients")->count();
      $nombrPatientsPerDoctor = \DB::table("rdvs")->where('medecin_id','=',Medecin::find(Auth::user()->id)->id)->distinct('patient_id')->count();
      $nombrSecretary = \DB::table("secretaires")->count();
      //Statistique : Nbr Rvd de cette année (return le nmbr et lannee et le mois(chiffre))
      $NombreRDVParMois = \DB::table("rdvs")
      ->select(\DB::raw('count(id) as `Nombre_RDV_Par_Mois`'),
      \DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
       ->groupby('year','month')
       ->having('year','=',date("Y"))
       ->get();
       $i=1;
       foreach ($NombreRDVParMois as $nbr) {
              while($nbr->month != $i){
                $data1[] = 0;
                $i++;
              }
                $data1[] = $nbr->Nombre_RDV_Par_Mois;
                $i++;
        }
        for($i;$i<13;$i++){
          $data1[] = 0;
        }
        //Statistique : Nbr Prescription de cette année
        $NombrePrescriptionParMois = \DB::table("prescriptions")
        ->select(\DB::raw('count(id) as `Nombre_Prescription_Par_Mois`'),
        \DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
         ->groupby('year','month')
         ->having('year','=',date("Y"))
         ->get();
         $j=1;
         foreach ($NombrePrescriptionParMois as $nbr) {
                while($nbr->month != $j){
                  $data2[] = 0;
                  $j++;
                }
                  $data2[] = $nbr->Nombre_Prescription_Par_Mois;
                  $j++;
          }
          for($j;$j<13;$j++){
            $data2[] = 0;
          }
          //Statistique : Nbr Rvd de moins précedent pour tous les doctors
          $mois = date("m"); $annee = date("Y");
          if($mois == 1){
            $mois = 12;
            $annee--;
          }else{
            $mois--;
          }
          $rdvs =\DB::table("rdvs")->join('medecins','medecins.id','=','rdvs.medecin_id')
                ->select("medecins.id",'medecins.nom','medecins.prenom',\DB::raw('count(rdvs.id) as `Nombre_RDV`'),
                \DB::raw('YEAR(rdvs.created_at) year, MONTH(rdvs.created_at) month'))
                 ->groupby("medecins.id",'month','year','medecins.nom','medecins.prenom')
                 ->having('month','=',$mois)
                 ->having('year','=',$annee)
                 ->get();
          foreach ($rdvs as $r) {
            $data3[] = $r->nom." ".$r->prenom;
            $data4[] = $r->Nombre_RDV;
          }
          if(count($data1)==0){
            $data3[] = 0;
          }elseif(count($data2)==0){
            $data4[] = 0;
          }
          $nombrPatientsParMois = \DB::table("patients")
                ->select(\DB::raw('count(patients.id) as `Nombre_Patient`'),
                \DB::raw('YEAR(patients.created_at) year, MONTH(patients.created_at) month'))
                 ->groupby('month','year')
                 ->having('year','=',date("Y"))
                 ->get();
          $i=1;
          foreach ($nombrPatientsParMois as $nbr) {
                while($nbr->month != $i){
                  $data5NbrPatient[] = 0;
                  $i++;
                }
                  $data5NbrPatient[] = $nbr->Nombre_Patient;
                  $i++;
          }
          for($i;$i<13;$i++){
            $data5NbrPatient[] = 0;
          }
          $nombreAppointmentDocPerMonth = \DB::table("rdvs")
                ->where('medecin_id','=',Medecin::find(Auth::user()->id)->id)
                ->select(\DB::raw('count(rdvs.id) as `Nombre_RDV`'),
                \DB::raw('YEAR(rdvs.created_at) year, MONTH(rdvs.created_at) month'))
                 ->groupby('month','year')
                 ->having('year','=',$annee)
                 ->get();
          $i=1;
          foreach ($nombreAppointmentDocPerMonth as $nbr) {
                while($nbr->month != $i){
                  $dataNombreAppointmentDocPerMonth[] = 0;
                  $i++;
                }
                  $dataNombreAppointmentDocPerMonth[] = $nbr->Nombre_RDV;
                  $i++;
          }
          for($i;$i<13;$i++){
            $dataNombreAppointmentDocPerMonth[] = 0;
          }

          $nombreOrdonnanceDocPerMonth = \DB::table("prescriptions")
                ->where('medecin_id','=',Medecin::find(Auth::user()->id)->id)
                ->select(\DB::raw('count(prescriptions.id) as `Nombre_RDV`'),
                \DB::raw('YEAR(prescriptions.created_at) year, MONTH(prescriptions.created_at) month'))
                 ->groupby('month','year')
                 ->having('year','=',$annee)
                 ->get();
          $i=1;
          foreach ($nombreOrdonnanceDocPerMonth as $nbr) {
                while($nbr->month != $i){
                  $dataNombreOrdonnanceDocPerMonth[] = 0;
                  $i++;
                }
                  $dataNombreOrdonnanceDocPerMonth[] = $nbr->Nombre_RDV;
                  $i++;
          }
          for($i;$i<13;$i++){
            $dataNombreOrdonnanceDocPerMonth[] = 0;
          }
         //return $nombreOrdonnanceDocPerMonth;
        return view('secrtrDoctorPages.dashboard',['users'=>$this->getNameUsers(),'data1'=> $data1,'data2'=> $data2,'data3'=> $data3,'data4'=> $data4,'mois'=> $mois,'nombrDoctors'=> $nombrDoctors,'nombrPatients'=> $nombrPatients,'nombrSecretary'=> $nombrSecretary,'data5NbrPatient'=> $data5NbrPatient,'nombrPatientsPerDoctor'=>$nombrPatientsPerDoctor,'dataNombreAppointmentDocPerMonth'=>$dataNombreAppointmentDocPerMonth,'dataNombreOrdonnanceDocPerMonth'=>$dataNombreOrdonnanceDocPerMonth]);
    }

    public function profile()
    {
        $userRole = Auth::user()->user_roles;
        if($userRole == 'secretaire'){
            $user = Secretaire::find(Auth::user()->id);
        }else if($userRole == 'doctor' || $userRole == 'adminM'){
            $user = Medecin::find(Auth::user()->id);
        }else if($userRole == 'patient'){
            $user = Patient::find(Auth::user()->id);
        }

        return view('users.profile',['users'=>$this->getNameUsers(),'user' => $user]);
    }

     public function editProfile()
    {
        $userRole = Auth::user()->user_roles;
        if($userRole == 'secretaire'){
            $user = Secretaire::find(Auth::user()->id);
        }else if($userRole == 'doctor' || $userRole == 'adminM'){
            $user = Medecin::find(Auth::user()->id);
        }
        return view('users.editProfile',['users'=>$this->getNameUsers(),'user' => $user]);
    }

    public function store(AddUsersRequest $request)
    {

          $user = new User();
          $user->phone = $request->phone_number;
          $user->email = $request->email;
          $user->password = Hash::make($request->password);

          if($request->typeUser == 'patient'){
              $user->user_roles = 'patient';
              $user->save();
              $patient = new Patient();
              $patient->nom = $request->first_name;
              $patient->prenom = $request->last_name;
              $patient->Num_Secrurite_Social = $request->social_security_number;
              $patient->gender            = $request->gender == '1' ? 'Female' : 'Male' ;
              $patient->ville             = $request->city;
              $patient->date_naiss        = Carbon::createFromFormat('m-d-Y', $request->date_of_birth)->format('Y-m-d');
              $allergie = $chronic_diseases = "";

              foreach ($request->allergie as $key) {
                $allergie = $allergie.' '.$key;
              }
              foreach ($request->chronic_diseases as $key) {
                $chronic_diseases = $chronic_diseases.' '.$key;
              }
              $patient->maladie_chronique = $allergie;
              $patient->allergie          = $chronic_diseases;
              $patient->age               = Carbon::parse($request->date_of_birth)->age;
              $patient->antecedent        = $request->antecedent;
              $patient->user_id           = $user->id;
              $patient->save();

          }else if($request->typeUser == 'doctor' || $request->typeUser == 'adminM'){
              if($request->typeUser == 'doctor'){
                  $user->user_roles = 'doctor';
              }else{
                  $user->user_roles = 'adminM';
              }
              $user->save();
              $medecin = new Medecin();
              $medecin->nom = $request->first_name;
              $medecin->prenom = $request->last_name;
              $medecin->specialite = $request->Specialty;
              $medecin->gender     = $request->gender == '1' ? 'Female' : 'Male' ;
              $medecin->user_id     = $user->id;
              if($request->hasFile('avatar')){
                $medecin->avatar = $request->avatar->store('users_Avatar/doctor');
              }
              $medecin->save();


          }else if($request->typeUser == 'secretaire'){
            $user->user_roles = 'secretaire';
            $user->save();
            $secretaire = new Secretaire();
            $secretaire->nom = $request->first_name;
            $secretaire->prenom = $request->last_name;
            $secretaire->gender     = $request->gender == '1' ? 'Female' : 'Male' ;
            $secretaire->user_id     = $user->id;
            if($request->hasFile('avatar')){
                $secretaire->avatar = $request->avatar->store('users_Avatar/secretaire');
            }
            $secretaire->save();

          }


          return back()->withSuccess("hh");

    }
    public function getPatientSelected($id)
    {
      $user = User::find($id);
      return response()->json([
        'email' => $user->email,
        'phone' =>  $user->phone,
      ]);
    }

    public function checkDateAppointment($date,$timeD,$timeF)
    {
      $rdv = \DB::table('rdvs')->where([['date','=',Carbon::createFromFormat('d-m-Y', $date)->format('Y-m-d')],['heure_debut','=',$timeD],['heure_fin','=',$timeF]])->get();
      if(count($rdv) != 0){
        return response()->json([
          'appointmentExist' => True,
        ]);
      }else{
        return response()->json([
          'appointmentExist' => false,
        ]);
      }

    }

    public function allAppointmentsAdmin()
    {
      $today = today();
      if( Auth::user()->user_roles == 'adminM'){

        $appointments = \DB::table('rdvs')->join('patients','patients.id','=','rdvs.patient_id')
        ->join('medecins','medecins.id','=','rdvs.medecin_id')
        ->select('rdvs.deletedA','rdvs.id','rdvs.patient_id','rdvs.date','rdvs.heure_debut','rdvs.heure_fin','patients.nom as patientName','patients.prenom as patientPrenom','date_naiss',
        'medecins.prenom as medecinPrenom','medecins.nom as medecinName')
        ->groupby('deletedA','id','patient_id','heure_fin','date','heure_debut','patientName','patientPrenom','medecinPrenom','date_naiss','medecinName')
        ->having('deletedA','=',0)
        ->orderBy('rdvs.date','desc')
        ->orderBy('rdvs.heure_debut','asc')
        ->get();
        $idDoctor = \DB::table('medecins')->where('user_id',Auth::user()->id)->value('id');
        return view('adminPages.allAppointmentsAdmin',['idDoctor'=>$idDoctor,'today'=>$today,'users'=>$this->getNameUsers(),'appointments' => $appointments]);

      }elseif(Auth::user()->user_roles == 'doctor'){
        $appointments = \DB::table('rdvs')
                      ->join('medecins','medecins.id','=','rdvs.medecin_id')
                      ->select('rdvs.deleted','rdvs.id','rdvs.patient_id','rdvs.date','rdvs.heure_debut','rdvs.heure_fin','user_id','medecins.prenom as medecinPrenom','medecins.nom as medecinName')
                      ->groupby('deleted','id','patient_id','heure_fin','date','heure_debut','user_id','medecinPrenom','medecinName')
                      ->having('user_id','=',Auth::user()->id)
                      ->having('deleted','=',0)
                      ->orderBy('rdvs.date','desc')
                      ->orderBy('rdvs.heure_debut','asc')
                      ->get();
        $appointmentss = \DB::table('patients')->get();
        $idDoctor = \DB::table('medecins')->where('user_id',Auth::user()->id)->value('id');
        return view('adminPages.allAppointmentsAdmin',['idDoctor'=>$idDoctor,'today'=>$today,'users'=>$this->getNameUsers(),'appointmentss' => $appointmentss,'appointments' => $appointments]);
        }
        elseif(Auth::user()->user_roles == 'patient'){
          $appointments = \DB::table('rdvs')
                        ->join('patients','patients.id','=','rdvs.patient_id')
                        ->select('rdvs.deletedP','rdvs.id','rdvs.patient_id','rdvs.medecin_id','rdvs.date','rdvs.heure_debut','rdvs.heure_fin','user_id','patients.prenom as patientPrenom','patients.nom as patientName','patients.date_naiss')
                        ->groupby('deletedP','id','medecin_id','patient_id','heure_fin','date','heure_debut','user_id','patientName','patientPrenom','date_naiss')
                        ->having('user_id','=',Auth::user()->id)
                        ->having('deletedP','=',0)
                        ->orderBy('rdvs.date','desc')
                        ->orderBy('rdvs.heure_debut','asc')
                        ->get();
          $appointmentss = \DB::table('medecins')->get();
          $idd = \DB::table('patients')->where('user_id',Auth::user()->id)->value('id');
          $lettres = \DB::table('lettre__orientations')->where('patient_id',$idd)->get();
          return view('adminPages.allAppointmentsAdmin',['lettres' => $lettres,'users'=>$this->getNameUsers(),'appointmentss' => $appointmentss,'appointments' => $appointments,'today'=>$today]);
        }
    }

    public function showAddAppointment()
    {
        $allPatients = Patient::All();
        $allDoctors = Medecin::All();
        return view('secrtrDoctorPages.addAppointment',['users'=>$this->getNameUsers(),'allPatients'=>$allPatients,'allDoctors'=>$allDoctors,'updatePage'=> false]);
    }

    public function showUpdateAppointment($idAppointment)
    {
     
        $appointment = \DB::table('rdvs')
            ->join('patients','patients.id','=','rdvs.patient_id')
            ->join('medecins','medecins.id','=','rdvs.medecin_id')
            ->join('users','users.id','=','patients.user_id')
            ->where('rdvs.id',$idAppointment)
            ->select('rdvs.*','patients.nom as patientName','patients.prenom as patientSecondName','patients.id as patientId','medecins.nom as doctorName','medecins.prenom as doctorSecondName','medecins.id as doctorId','date_naiss','specialite','email','phone')
            ->get();
        $date = Carbon::createFromFormat('Y-m-d',$appointment[0]->date)->format('d-m-Y');
        return view('secrtrDoctorPages.addAppointment',['users'=>$this->getNameUsers(),'appointments'=>$appointment,'updatePage'=> true,'date'=>$date]);
    }

    public function addAppointment(Request $request)
    {
      $appointment = new Rdv();
      $idPatient = \DB::table('patients')->where('user_id',$request->patient)->select('id')->get();
      $appointment->medecin_id = $request->doctor;
      //return $appointment;
      $appointment->patient_id = $idPatient[0]->id;
      $appointment->date = Carbon::createFromFormat('d-m-Y', $request->date)->format('Y-m-d');
      $appointment->heure_debut = date("h:i", strtotime( $request->time_beging ));
      $appointment->heure_fin = date("h:i", strtotime( $request->time_end ));
      $appointment->motif = $request->reason;
      $appointment->save();
      return back()->withSuccess("add");
      return $request;

    }

    public function updateAppointmentInfo(Request $request)
    {
      $appointment = Rdv::find($request->idAppointment);
      $appointment->date = Carbon::createFromFormat('d-m-Y', $request->date)->format('Y-m-d');
      $appointment->heure_debut = date("h:i", strtotime( $request->time_beging));
      $appointment->heure_fin = date("h:i", strtotime( $request->time_end));
      $appointment->motif = $request->reason;
      $appointment->save();
      return back()->withSuccess("update");

    }

    public function getsearchPatientDoctor(Request $request){

      $search = $request->get('search');//prendre le mot qui nous saisissons
      $today = today();
      $idDoctor = \DB::table('medecins')->where('user_id',Auth::user()->id)->value('id');

      if($request->birthday != "" && $request->name != ""){

        $liste  =\DB::table('rdvs')
        ->join('medecins','medecins.id','=','rdvs.medecin_id')
        ->join('patients','patients.id','=','rdvs.patient_id')
        ->where([['date_naiss','like','%'.$search.'%'],['patients.nom', 'like', '%'.$search.'%']])
        ->orwhere([['date_naiss','like','%'.$search.'%'],['patients.prenom', 'like', '%'.$search.'%']])
        ->orwhere([['date_naiss','like','%'.$search.'%'],['patients.prenom', 'like', '%'.$search.'%']])
        ->orwhere([['date_naiss','like','%'.$search.'%'],['medecins.nom', 'like', '%'.$search.'%']])
        ->orwhere([['date_naiss','like','%'.$search.'%'],['medecins.prenom', 'like', '%'.$search.'%']])
        ->select('rdvs.*','patients.nom as patientName','patients.prenom as patientPrenom','date_naiss','medecins.prenom as medecinPrenom','medecins.nom as medecinName')
        ->get();
      }
      elseif($request->birthday != "")
      {
        $liste  =\DB::table('rdvs')
        ->join('medecins','medecins.id','=','rdvs.medecin_id')
        ->join('patients','patients.id','=','rdvs.patient_id')
        ->where('date_naiss','like','%'.$search.'%')
        ->select('rdvs.*','patients.nom as patientName','patients.prenom as patientPrenom','date_naiss','medecins.prenom as medecinPrenom','medecins.nom as medecinName')
        ->get();

      }elseif($request->name != ""){
        $liste  =\DB::table('rdvs')
        ->join('medecins','medecins.id','=','rdvs.medecin_id')
        ->join('patients','patients.id','=','rdvs.patient_id')
        ->where('patients.nom', 'like', '%'.$search.'%')
        ->orWhere('patients.prenom', 'like', '%'.$search.'%')
        ->orWhere('medecins.nom', 'like', '%'.$search.'%')
        ->orWhere('medecins.prenom', 'like', '%'.$search.'%')
        ->select('rdvs.*','patients.nom as patientName','patients.prenom as patientPrenom','date_naiss','medecins.prenom as medecinPrenom','medecins.nom as medecinName')
        ->get();
      }
        return view('adminPages.allAppointmentsAdmin',['idDoctor'=>$idDoctor,
        'today'=>$today,'users'=>$this->getNameUsers(),'liste'=>$liste,'search' => $search,
        'appointments'=> $liste]);
    }
    public function deleteServices(Request $request){

          $specialites  = Specialite::where('id',$request->service)->delete();
          return  back()->withSuccess("delete");
    }
}
