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
          $nameUser = \DB::table('patients')->where('user_id',Auth::user()->id)->get();
        }
        return  $nameUser;
    }

    public function dashboard()
    {
      //Statistique : Nbr Rvd de cette année
      $NombreRDVParMois = \DB::table("rdvs")
      ->select(\DB::raw('count(id) as `Nombre_RDV_Par_Mois`'),
      \DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
       ->groupby('month','year')
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
         ->groupby('month','year')
         ->having('year','=',date("Y"))
         ->get();
         $j=1;
         foreach ($NombrePrescriptionParMois as $nbr) {
                while($nbr->month != $j){
                  $data2[] = 0;
                  $j++;
                }
                  $data2[] = $nbr->Nombre_Prescription_Par_Mois;
                  $i++;
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
          $rdvs =
                \DB::table("rdvs")->join('medecins','medecins.id','=','rdvs.medecin_id')
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
          //print_r( $data3);
        return view('secrtrDoctorPages.dashboard',['users'=>$this->getNameUsers(),'data1'=> $data1,
        'data2'=> $data2,'data3'=> $data3,'data4'=> $data4,'mois'=> $mois,
    ]);
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
              $patient->maladie_chronique = $request->chronic_diseases;
              $patient->allergie          = $request->allergie;
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

        $appointments = \DB::table('rdvs')->join('patients','patients.id','=','rdvs.patient_id')->join('medecins','medecins.id','=','rdvs.medecin_id')->select('rdvs.*','patients.nom as patientName','patients.prenom as patientPrenom','date_naiss','medecins.prenom as medecinPrenom','medecins.nom as medecinName')->get();
        return view('adminPages.allAppointmentsAdmin',['today'=>$today,'users'=>$this->getNameUsers(),'appointments' => $appointments]);
      }elseif(Auth::user()->user_roles == 'doctor'){
        $appointments = \DB::table('rdvs')
                      ->join('medecins','medecins.id','=','rdvs.medecin_id')
                      ->select('rdvs.id','rdvs.patient_id','rdvs.date','rdvs.heure_debut','rdvs.heure_fin','user_id','medecins.prenom as medecinPrenom','medecins.nom as medecinName')
                      ->groupby('id','patient_id','heure_fin','date','heure_debut','user_id','medecinPrenom','medecinName')
                      ->having('user_id','=',Auth::user()->id)
                      ->get();
        $appointmentss = \DB::table('patients')->get();
        return view('adminPages.allAppointmentsAdmin',['today'=>$today,'users'=>$this->getNameUsers(),'appointmentss' => $appointmentss,'appointments' => $appointments]);
        }
        elseif(Auth::user()->user_roles == 'patient'){
          $appointments = \DB::table('rdvs')
                        ->join('patients','patients.id','=','rdvs.patient_id')
                        ->select('rdvs.deleted','rdvs.id','rdvs.patient_id','rdvs.medecin_id','rdvs.date','rdvs.heure_debut','rdvs.heure_fin','user_id','patients.prenom as patientPrenom','patients.nom as patientName','patients.date_naiss')
                        ->groupby('deleted','id','medecin_id','patient_id','heure_fin','date','heure_debut','user_id','patientName','patientPrenom','date_naiss')
                        ->having('user_id','=',Auth::user()->id)
                        ->having('deleted','=',0)
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
        return view('secrtrDoctorPages.addAppointment',['users'=>$this->getNameUsers(),'allPatients'=>$allPatients,'allDoctors'=>$allDoctors]);
    }

    public function showAddAppointmentID($id)
    {
        $allPatients = Patient::find($id);
        $allDoctors = Medecin::All();
        return view('secrtrDoctorPages.addAppointment',['users'=>$this->getNameUsers(),'allPatients'=>[$allPatients],'allDoctors'=>$allDoctors]);
    }

    public function addAppointment(AddAppointment $request)
    {
        $appointment = new Rdv();
        $idPatient = \DB::table('patients')->where('user_id',$request->patient)->select('id')->get();
        $appointment->medecin_id = $request->doctor;
        $appointment->patient_id = $idPatient[0]->id;
        $appointment->date = Carbon::createFromFormat('d-m-Y', $request->date)->format('Y-m-d');
        $appointment->heure_debut = date("h:i", strtotime( $request->time_beging ));
        $appointment->heure_fin = date("h:i", strtotime( $request->time_end ));
        $appointment->motif = $request->reason;
        $appointment->save();
        return back()->withSuccess("");
    }

    public function getsearchPatientDoctor(Request $request){

      $search = $request->get('search');//prendre le mot qui nous saisissons


      if($request->searchPatientDoctor == "birthday")
      {

        $liste  =\DB::table('rdvs')
        ->join('medecins','medecins.id','=','rdvs.medecin_id')
        ->join('patients','patients.id','=','rdvs.patient_id')
        ->where('date_naiss','like','%'.$search.'%')
        ->select('rdvs.*','patients.nom as patientName','patients.prenom as patientPrenom','date_naiss','medecins.prenom as medecinPrenom','medecins.nom as medecinName')
        ->get();
      }elseif($request->searchPatientDoctor == "name"){
        $liste  =\DB::table('rdvs')
        ->join('medecins','medecins.id','=','rdvs.medecin_id')
        ->join('patients','patients.id','=','rdvs.patient_id')
        ->where('patients.nom', 'like', '%'.$search.'%')
        ->orWhere('patients.prenom', 'like', '%'.$search.'%')
        ->orWhere('medecins.prenom', 'like', '%'.$search.'%')
        ->orWhere('medecins.prenom', 'like', '%'.$search.'%')
        ->select('rdvs.*','patients.nom as patientName','patients.prenom as patientPrenom','date_naiss','medecins.prenom as medecinPrenom','medecins.nom as medecinName')
        ->get();
      }
      return view('adminPages.allAppointmentsAdmin',['users'=>$this->getNameUsers(),'liste'=>$liste,'search' => $search,'appointments'=> $liste]);
    }
}
