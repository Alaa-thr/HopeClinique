<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AddUsersRequest;


class PatientController extends Controller
{


      public function store(AddUsersRequest $request)
      {
        if($request->p == 'patient'){
          $user = new User();
          $user->phone = $request->phone;
          $user->email = $request->email;
          $user->password = Hash::make($request->password);
          $user->user_roles = "patient";
          $user->save();

          $patient = new Patient();
          $patient->nom = $request->input('nom');
          $patient->prenom = $request->input('prenom');
          $patient->Num_Secrurite_Social = $request->input('Num_Secrurite_Social');
          $patient->gender            = $request->gender == '1' ? 'Female' : 'Male' ;
          $patient->ville             = $request->input('ville');
          $patient->date_naiss        = Carbon::createFromFormat('m/d/Y', $request->input('date_naissance'))->format('Y-m-d');
          $patient->maladie_chronique = $request->input('maladie_chronique');
          $patient->allergie          = $request->input('allergie');
          $patient->antecedent        = $request->input('antecedent');
          $patient->commentaire       = $request->input('commentaire');
          $patient->save();
          return view('users.addUsers',['typeUser'=>$typeUser,'nameUser'=>$this->getNameUsers()]);

          return back();
}
}
}
