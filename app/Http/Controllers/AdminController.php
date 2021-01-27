<?php

namespace App\Http\Controllers;
use DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Medecin;
use App\Models\Secretaire;
use App\Models\Patient;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Facades\UploadedFile;

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
            $nameUser = Medecin::find(Auth::user()->id)->nom.' '.Medecin::find(Auth::user()->id)->prenom;
        }else if(Auth::user()->user_roles == 'secretaire'){
            $nameUser = Secretaire::find(Auth::user()->id)->nom.' '.Secretaire::find(Auth::user()->id)->prenom;
        }
        return $nameUser;
    }
    
    public function allDoctorsAdmin()
    {
        $liste = Medecin::all();//pour afficher liste de medecin
        $userM  = \DB::table('users')->get();//pour afficher liste de users
        return view('adminPages.allDoctorsAdmin',['nameUser'=>$this->getNameUsers(),'liste'=>$liste,'userM'=>$userM]);
    }

    public function allPatientsAdmin()
    {
        $listeP = Patient::all();//pour afficher liste de patient
        $userP  = \DB::table('users')->get();//pour afficher liste de users
        return view('adminPages.allPatientsAdmin',['nameUser'=>$this->getNameUsers(),'listeP'=>$listeP,'userP'=>$userP]);
    }

    public function allAppointmentsAdmin()
    {
        return view('adminPages.allAppointmentsAdmin',['nameUser'=>$this->getNameUsers()]);
    }

    public function allSecretariesAdmin()
    {
        $listeS = Secretaire::all();//pour afficher liste de secretaire
        $userS  = \DB::table('users')->get();//pour afficher liste de users
        return view('adminPages.allSecretariesAdmin',['nameUser'=>$this->getNameUsers(),'listeS'=>$listeS,'userS'=>$userS]);
    }

    public function allservicesAdmin()
    {
        return view('adminPages.allservicesAdmin',['nameUser'=>$this->getNameUsers()]);
    }

    public function allblogsAdmin()
    {
        return view('adminPages.blogs',['nameUser'=>$this->getNameUsers()]);
    }

    public function detailsBlogAdmin()
    {
        return view('adminPages.detailsBlog',['nameUser'=>$this->getNameUsers()]);
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
        'chroniques'=>$chroniques,'allergies'=>$allergies,'nameUser'=>$this->getNameUsers()]);
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
    //pour supprimer les allDoctors
    public function destroy(Request $request,$id){
      if($request->input('destroyU') == 'doctor'){
              $doctor = \DB::table('medecins')->where([['id', $id]])->get();
              foreach ($doctor as $key ) {
                    $nomDoctor = $key->nom;
                    $prenomDoctor = $key->prenom;
                    $user_id = $key->user_id;
              }

              $prescriptions = \DB::table('prescriptions')->where('medecin_id', $id)->get();
                foreach ($prescriptions as $prs ) {
                    \DB::table('prescriptions')->where('id',$prs->id)
                    ->update(['nom_medecin'=>$nomDoctor,'prenom_medecin'=>$prenomDoctor]);

                    }
              $lettre_orientations = \DB::table('lettre_orientations')->where('medecin_id', $id)->get();
                foreach ($lettre_orientations as $l ) {
                      \DB::table('lettre_orientations')->where('id',$l->id)
                      ->update(['nom_medecin'=>$nomDoctor,'prenom_medecin'=>$prenomDoctor]);
                    }
              $rdvs = \DB::table('rdvs')->where('medecin_id', $id)->get();
                foreach ($rdvs as $r ) {
                          \DB::table('rdvs')->where('id',$r->id)
                          ->update(['nom_medecin'=>$nomDoctor,'prenom_medecin'=>$prenomDoctor]);
                        }
                $user = \DB::table('users')->where('id', $user_id)->delete();
                $doctor = \DB::table('medecins')->where([['id', $id]])->delete();
              }

        if($request->input('destroyU') == 'secretaire'){
                $secretaireID = \DB::table('secretaires')->where([['id', $id]])->value('user_id');
                $user = \DB::table('users')->where('id',$secretaireID)->delete();
                $secretaire = \DB::table('secretaires')->where([['id', $id]])->delete();
              }

          return back();
        }
}
