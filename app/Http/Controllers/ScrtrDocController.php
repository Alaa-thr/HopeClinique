<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Medecin;
use App\Models\Secretaire;
use App\Models\Patient;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AddUsersRequest;

class ScrtrDocController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	public function getNameUsers()
    {
        $nameUser = Medecin::find(Auth::user()->id)->nom.' '.Medecin::find(Auth::user()->id)->prenom;
        return $nameUser;
    }

    public function dashboard()
    {

        return view('secrtrDoctorPages.dashboard',['nameUser'=>$this->getNameUsers()]);
    }

    public function profile()
    {
        $userRole = Auth::user()->user_roles;
        if($userRole == 'secretaire'){
            $user = Secretaire::find(Auth::user()->id);
        }else if($userRole == 'doctor' || $userRole == 'adminM'){
            $user = Medecin::find(Auth::user()->id);
        }

        return view('users.profile',['nameUser'=>$this->getNameUsers(),'user' => $user]);
    }

     public function editProfile()
    {
        $userRole = Auth::user()->user_roles;
        if($userRole == 'secretaire'){
            $user = Secretaire::find(Auth::user()->id);
        }else if($userRole == 'doctor' || $userRole == 'adminM'){
            $user = Medecin::find(Auth::user()->id);
        }
        return view('users.editProfile',['nameUser'=>$this->getNameUsers(),'user' => $user]);
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
              $patient->date_naiss        = Carbon::createFromFormat('m/d/Y', $request->input('date_of_birth'))->format('Y-m-d');
              $patient->maladie_chronique = $request->chronic_diseases;
              $patient->allergie          = $request->allergie;
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


          return back()->withSuccess( 'Message you want show in View' );

    }
}
