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

      return view('users.informationUsers',['nameUser'=>$this->getNameUsers(),'patient' => $patient,'users' => $users]);
    }


}
