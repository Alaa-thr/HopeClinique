<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AddUsersRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Medecin;

class DoctorController extends Controller
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
  public function store(AddUsersRequest $request)
  {
    if($request->d == 'doctor')
    {

          if($request->input('role') == 'Doctor')
            {
              $isDoctor ="doctor";
            }
        else
          {
              $isDoctor = "adminM";
          }
              $user = new User();
              $user->phone = $request->phone;
              $user->email = $request->email;
              $user->password = Hash::make($request->password);
              $user->user_roles = $isDoctor;
              $user->save();


              $medecin = new Medecin();
              $medecin->nom                  = $request->input('nom');
              $medecin->prenom               = $request->input('prenom');
              $medecin->gender               = $request->status == '1' ? 'Female' : 'Male' ;
              $medecin->user_id              = $user->id;
              $medecin->avatar               = $request->input('avatar');
              $medecin->specialite           = $request->input('specialite');
              $medecin->save();

      return back();
    }
  }
  public function getsearchDoctor(Request $request){

      $search = $request->get('search');//prendre le mot qui nous saisissons
      $userM  = \DB::table('users')->get();

      if($request->searchp == "id")
      {
        $liste  =\DB::table('medecins')->where('id', 'like','%'.$search.'%')->get();
      }
    elseif($request->searchp == "name"){
      $liste  =\DB::table('medecins')->orWhere('nom', 'like', '%'.$search.'%')
                                      ->orWhere('prenom', 'like', '%'.$search.'%')
                                      ->get();
    }
    elseif($request->searchp == "phone"){
      $userM  =\DB::table('users')->orWhere('phone', 'like', '%'.$search.'%')
                                      ->get();
      $liste  =\DB::table('medecins')->get();
    }
    return view('search.SearchDoctor',['users'=>$this->getNameUsers(),'liste'=>$liste,'search' => $search,'userM'=>$userM]);
  }
  public function getEventsDoctor($idDoc)
  {
    $events = \DB::table('rdvs')
            ->join('patients','patients.id','=','rdvs.patient_id')
            ->where('medecin_id', $idDoc)
            ->select('nom','prenom','rdvs.id','date','heure_debut','heure_fin')->get();
    return response()->json([
        'events' => $events,
      ]);
  }
}
