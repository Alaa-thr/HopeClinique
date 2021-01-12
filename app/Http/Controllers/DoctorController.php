<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Medecin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AddUsersRequest;

class DoctorController extends Controller
{
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
    public function update(){

      
    }
}
