<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Medecin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

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
              $today = today();
              return view('users.informationUsers',['nameUser'=>$this->getNameUsers(),'user' => $user,'users' => $users,'rdvs' => $rdvs,'medecins' => $medecins,'images' => $images,'typeUser' => $typeUser,'today'=>$today]);
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

}
