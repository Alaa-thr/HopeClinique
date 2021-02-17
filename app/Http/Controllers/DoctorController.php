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
use App\Models\Rdv;

class DoctorController extends Controller
{
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


    if($request->search != "" && $request->searchp != ""){
      $liste  =\DB::table('medecins')->orWhere('nom', 'like', '%'.$request->search.'%')
                                     ->orWhere('prenom', 'like', '%'.$request->search.'%')
                                     ->get();
      $userM  =\DB::table('users')->orWhere('phone', 'like', '%'.$request->searchp.'%')
                                     ->get();
    }
    elseif($request->search != ""){
      $liste  =\DB::table('medecins')->orWhere('nom', 'like', '%'.$request->search.'%')
                                      ->orWhere('prenom', 'like', '%'.$request->search.'%')
                                      ->get();
    }
    elseif($request->searchp != ""){
      $userM  =\DB::table('users')->orWhere('phone', 'like', '%'.$request->searchp.'%')
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
  public function deleteAppointments(Request $request){

      if(Auth::user()->user_roles == 'doctor'){
        $rdvs  = Rdv::where('id',$request->idRdv)->update(['deleted' => 1]);
      }elseif(Auth::user()->user_roles == 'adminM'){
          $rdvs  = Rdv::where('id',$request->idRdv)->update(['deletedA' => 1]);
        }elseif(Auth::user()->user_roles == 'patient'){
        $rdvs  = Rdv::where('id',$request->idRdv)->update(['deletedP' => 1]);
      }
      return  back()->withSuccess("delete");
  }
}
