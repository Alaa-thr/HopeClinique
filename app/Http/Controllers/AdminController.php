<?php

namespace App\Http\Controllers;
use DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Medecin;
use App\Models\Secretaire;
use App\Http\Requests\ProfileRequest;
use App\Models\Patient;
use App\Http\Requests\updateInforRequest;
use Illuminate\Http\Facades\UploadedFile;
use Illuminate\Support\Carbon;
use App\Models\Blog;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\ServiceRequest;
use App\Http\Requests\ServiceUpdateRequest;
use App\Models\Specialite;

class AdminController extends Controller
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
        }
        return  $nameUser;
    }

    public function allDoctorsAdmin()
    {
        $liste = Medecin::paginate(8);//pour afficher liste de medecin
        $userM  = \DB::table('users')->get();//pour afficher liste de users
        return view('adminPages.allDoctorsAdmin',['users'=>$this->getNameUsers(),'liste'=>$liste,'userM'=>$userM]);
    }

    public function allPatientsAdmin()
    {
        $listeP = Patient::paginate(10);//pour afficher liste de patient
        $userP  = \DB::table('users')->get();//pour afficher liste de users
        return view('adminPages.allPatientsAdmin',['users'=>$this->getNameUsers(),'listeP'=>$listeP,'userP'=>$userP]);
    }

    public function allAppointmentsAdmin()
    {
        return view('adminPages.allAppointmentsAdmin',['users'=>$this->getNameUsers()]);
    }

    public function allSecretariesAdmin()
    {
        $listeS = Secretaire::paginate(10);//pour afficher liste de secretaire
        $userS  = \DB::table('users')->get();//pour afficher liste de users
        return view('adminPages.allSecretariesAdmin',['users'=>$this->getNameUsers(),'listeS'=>$listeS,'userS'=>$userS]);
    }

    public function allservicesAdmin()
    {
      $allservices = Specialite::paginate(6);
      return view('adminPages.allservicesAdmin',['users'=>$this->getNameUsers(),'allservices'=>$allservices]);
    }

    public function allblogsAdmin()
    {
        $blogs = Blog::paginate(10);

        return view('adminPages.blogs',['users'=>$this->getNameUsers(),'blogs'=>$blogs]);
    }

    public function detailsBlogAdmin($id)
    {
        $medecin_id = \DB::table('blogs')->where('id',$id)->value('medecin_id');
        $user = \DB::table('medecins')->where('user_id',$medecin_id)->get();
        $detailBlog = \DB::table('blogs')->where('id',$id)->get();

        return view('adminPages.detailsBlog',['users'=>$this->getNameUsers(),'detailBlog'=>$detailBlog,'user'=>$user]);
    }

    public function addUser($type)
    {
        //tq clique sur adduser test type if admin ,sec,patient ou doctor for t3abik l page adduser ta3ou
        $typeUser = $type;

        //pour récupérer les villes m bdd
        $villes=\DB::table('villes')->orderBy('id','asc')->get();

        //pour récupérer les maladies chroniques m bdd
        $chroniques=\DB::table('maladieschroniques')->orderBy('id','asc')->get();

        //pour récupérer les allergies m bdd
        $allergies=\DB::table('allergies')->orderBy('id','asc')->get();

        return view('users.addUsers',['typeUser'=>$typeUser,'villes'=>$villes,
        'chroniques'=>$chroniques,'allergies'=>$allergies,'users'=>$this->getNameUsers()]);
    }

    public function updateProfile(ProfileRequest $request)
    {
        $userRole = Auth::user()->user_roles;
        $userAuth = Auth::user();
        $userAuth->email = $request->email;
        $userAuth->phone = $request->phone_number;
        if($userRole == 'secretaire'){

            $secretaire = Secretaire::find(Auth::user()->id);
            $secretaire->nom = $request->first_name;
            $secretaire->prenom = $request->last_name;
            $secretaire->gender  = $request->gender;
            if($request->hasFile('avatar')){
                $secretaire->avatar = $request->avatar->store('users_Avatar/secretaire');
            }
            $secretaire->save();

        }else if($userRole == 'doctor' || $userRole == 'adminM'){

            $user = Medecin::find(Auth::user()->id);
            $user->nom = $request->first_name;
            $user->prenom = $request->last_name;
            $user->gender = $request->gender;
            if($request->hasFile('avatar')){
                $user->avatar = $request->avatar->store('users_Avatar/doctor');
            }

            $user->save();
        }

        $userAuth->save();
        return back();
    }
    //pour supprimer Doctors/secretaire/paient
    public function destroy(Request $request){

      if($request->typeUser == 'doctor'){
              $doctor = \DB::table('medecins')->where([['id', $request->idUser]])->get();
              foreach ($doctor as $key ) {
                    $nomDoctor = $key->nom;
                    $prenomDoctor = $key->prenom;
                    $user_id = $key->user_id;echo"dd1";
              }

              $prescriptions = \DB::table('prescriptions')->where('medecin_id', $request->idUser)->get();
                foreach ($prescriptions as $prs ) {
                    \DB::table('prescriptions')->where('id',$prs->id)
                    ->update(['nom_medecin'=>$nomDoctor,'prenom_medecin'=>$prenomDoctor]);

                    }
              $lettre_orientations = \DB::table('lettre__orientations')->where('medecin_id', $request->idUser)->get();
                foreach ($lettre_orientations as $l ) {
                      \DB::table('lettre__orientations')->where('id',$l->id)
                      ->update(['nom_medecin'=>$nomDoctor,'prenom_medecin'=>$prenomDoctor]);
                    }
              $rdvs = \DB::table('rdvs')->where('medecin_id', $request->idUser)->get();
                foreach ($rdvs as $r ) {
                          \DB::table('rdvs')->where('id',$r->id)
                          ->update(['nom_medecin'=>$nomDoctor,'prenom_medecin'=>$prenomDoctor]);
                     }
              $blogs = \DB::table('blogs')->where('medecin_id', $request->idUser)->get();
                foreach ($blogs as $r ) {
                        \DB::table('rdvs')->where('id',$r->id)
                            ->update(['nom_medecin'=>$nomDoctor,'prenom_medecin'=>$prenomDoctor]);
                       }

                $user = \DB::table('users')->where('id', $user_id)->delete();
                return back()->withSuccess("delete");
              }

              elseif($request->typeUser == 'secretaire'){
                  $secretaire = \DB::table('secretaires')->where([['id', $request->idUser]])->get();
                  foreach ($secretaire as $key ) {
                          $user_id = $key->user_id;
                      }
                $user = \DB::table('users')->where('id', $user_id)->delete();

                return  back()->withSuccess("delete");
            }
          /*  elseif($request->typeUser == 'patient'){
                $patient = \DB::table('patients')->where([['id', $request->idUser]])->get();
                foreach ($patient as $key ) {
                        $user_id = $key->user_id;
                    }
              $user = \DB::table('users')->where('id', $user_id)->delete();

              return  back()->withSuccess("delete");
          }*/
        }
        public function editInformations(Request $request,$id)
       {
           //if(Auth::user()->user_roles == 'adminM'){
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
                 $allergies=\DB::table('allergies')->orderBy('id','asc')->get();
                 $chroniques=\DB::table('maladieschroniques')->orderBy('id','asc')->get();
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

                 return view('users.editInformation',['chroniques'=>$chroniques,'allergies'=>$allergies,'patient'=>$patient,'users'=>$this->getNameUsers(),
                 'user' => $user,'usersSelect' => $users,'rdvs' => $rdvs,'medecins' => $medecins,'images' => $images,'typeUser' => $typeUser,'today'=>$today,'prescription'=>$prescription,'ligne__prescriptons'=>$ligne__prescriptons]);
            }
            elseif($request->role == "secretarie")
              {
                $typeUser = "secretaire";
                $user = \DB::table('secretaires')->where([['id', $id]])->get();
                $user_id = \DB::table('secretaires')->where([['id', $id]])->value('user_id');
                $users   = \DB::table('users')->where([['id', $user_id]])->get();
                return view('users.editInformation',['users'=>$this->getNameUsers(),'user' => $user,'usersSelect' => $users,'typeUser' => $typeUser]);
            }

           elseif($request->role == "doctor")
             {
               $typeUser = "doctor";
               $user = \DB::table('medecins')->where([['id', $id]])->get();
               $user_id = \DB::table('medecins')->where([['id', $id]])->value('user_id');
               $users   = \DB::table('users')->where([['id', $user_id]])->get();

               return view('users.editInformation',['users'=>$this->getNameUsers(),'user' => $user,'usersSelect' => $users,'typeUser' => $typeUser]);
           }
       }
       public function updateInformations(updateInforRequest $request,$id)
       {

          if($request->roleU == 'doctor'){
            if(Auth::user()->user_roles == 'adminM'){
              $doctor = Medecin::find($id);
              $user = User::find($doctor->user_id);
              $doctor->nom    = $request->first_name;
              $doctor->prenom = $request->last_name;
              $doctor->gender = $request->gender;
              $doctor->specialite = $request->specialite;
              $user->email   = $request->email;
              $user->phone = $request->phone;
              $doctor->save();
              $user->save();
                                        }
                                    }
          if($request->roleU == 'patient'){
            $patient = Patient::find($id);
            $user    = User::find($patient->user_id);

            if(Auth::user()->user_roles == 'adminM' || Auth::user()->user_roles == 'doctor'){
              $patient->nom    = $request->first_name;
              $patient->prenom = $request->last_name;
              $patient->gender = $request->gender;
              $patient->ville = $request->city;
              $patient->Num_Secrurite_Social   = $request->social_security;
              $patient->date_naiss   = $request->date_of_birth;
              $patient->maladie_chronique   = $request->chronic_diseases;
              $patient->allergie   = $request->allergie;
              $patient->antecedent   = $request->antecedent;
              $patient->commentaire   = $request->comment;
              $user->phone = $request->phone;
              $user->email = $request->email;
              $patient->save();
              $user->save();  }

          if(Auth::user()->user_roles == 'secretaire'){
                $patient->nom    = $request->first_name;
                $patient->prenom = $request->last_name;
                $patient->gender = $request->gender;
                $patient->ville = $request->city;
                $patient->Num_Secrurite_Social   = $request->social_security;
                $patient->date_naiss   = $request->date_of_birth;
                $patient->maladie_chronique   = $patient->maladie_chronique ;
                $patient->allergie   = $patient->allergie;
                $patient->antecedent   = $patient->antecedent;
                $patient->commentaire   = $patient->comment;
                $user->phone = $user->phone;
                $user->email = $user->email;
                $patient->save();
                $user->save();  }
                                          }

          if($request->roleU == 'secretaire'){
               if(Auth::user()->user_roles == 'adminM'){
                  $secretaire = Secretaire::find($id);
                  echo $secretaire;
                  $user    = User::find($secretaire->user_id);
                  $secretaire->nom    = $request->first_name;
                  $secretaire->prenom = $request->last_name;
                  $secretaire->gender = $request->gender;
                //  $secretaire->specialite = $request->specialite;
                  $user->email   = $request->email;
                  $user->phone = $request->phone;
                  $secretaire->save();
                  $user->save();
                                                                  }
                            }
          return back();

       }
       public function blog($type)
       {
           return view('adminPages.addBlog',['users'=>$this->getNameUsers()]);
       }
       public function store(BlogRequest $request)
       {
         if(Auth::user()->user_roles == 'doctor' || Auth::user()->user_roles == 'adminM'){
                 $bloge = new Blog();
                 $bloge->medecin_id = $request->idDoctor;
                 $bloge->title = $request->title;
                 $bloge->description = $request->description;
                 if($request->hasFile('avatar')){
                       $bloge->avatr = $request->avatar->store('users_Avatar/blog');
                    }
                 $bloge->save();
              }
             return back()->withSuccess("Ok");
       }
       public function addServicePage()
       {
           return view('adminPages.addService',['users'=>$this->getNameUsers(),'updatePage' => false]);
       }
       public function updateServicePage($idService)
       {
          $service = Specialite::find($idService);
           return view('adminPages.addService',['users'=>$this->getNameUsers(),'updatePage' => true,'service' => $service]);
       }
       public function storeSsrvice(ServiceRequest $request)
       {
          $specialites = new Specialite();
          $specialites->nom = $request->name_specialty;
          $specialites->discription = $request->description;
          if($request->hasFile('avatar')){
            $specialites->avatar = $request->avatar->store('service');
          }
          $specialites->save();
          return back()->withSuccess("add");
       }
       public function serviceUpdate(ServiceUpdateRequest $request)
       {
          $specialites = Specialite::find($request->idService);

          $specialites->nom = $request->name_specialty;
          $specialites->discription = $request->description;
          if($request->hasFile('avatar')){
            $specialites->avatar = $request->avatar->store('service');
          }
          $specialites->save();
          return back()->withSuccess("update");
       }
      public function deleteService(Request $request)
       {
          $specialite = Specialite::find($request->idService);
          $specialite->delete();
          return back()->withSuccess("delete");
       }
}
