<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Medecin;
use Illuminate\Support\Facades\Auth;


class PatientController extends Controller
{
    public function getNameUsers()
    {
        $nameUser = Medecin::find(Auth::user()->id)->nom.' '.Medecin::find(Auth::user()->id)->prenom;
        return $nameUser;
    }
    public function plusinformation($id){

              $patient = \DB::table('patients')->where([['id', $id]])->get();
              $patient_id = \DB::table('patients')->where([['id', $id]])->value('user_id');
              $users   = \DB::table('users')->where([['id', $patient_id]])->get();
              $rdvs   = \DB::table('rdvs')->where([['patient_id', $id]])->get();
              $medecins   = \DB::table('medecins')->get();
              $images   = \DB::table('images')->where([['patient_id', $id]])->get();

      return view('users.informationUsers',['nameUser'=>$this->getNameUsers(),'patient' => $patient,'users' => $users,'rdvs' => $rdvs,'medecins' => $medecins,'images' => $images]);
    }
    public function getsearchPatient(Request $request){

        $search = $request->get('search');//prendre le mot qui nous saisissons
        $userP  = \DB::table('users')->get();

        if($request->searchp == "id")
        {
          $listeP  =\DB::table('patients')->where('id', 'like','%'.$search.'%')->get();
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
