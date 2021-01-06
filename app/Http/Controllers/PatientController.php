<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\User;

class PatientController extends Controller
{
      public function create()
      {
          return view('users.addUsers');
      }
      public function store(Request $request)
      {
          $patient = new Patient();
          $patient->nom = $request->input('nom');
          $patient->prenom = $request->input('prenom');
          $patient->Num_Secrurite_Social = $request->input('Num_Secrurite_Social');
          $patient->gender            =  $request->status == '1' ? 'Female' : 'Male' ;
          $patient->ville             = $request->input('ville');
          $patient->date_naissance    = $request->input('date_naissance');
          $patient->maladie_chronique = $request->input('maladie_chronique');
          $patient->allergie          = $request->input('allergie');
          $patient->antecedent        = $request->input('antecedent');
          $patient->commentaire       = $request->input('commentaire');
          $patient->save();

       }
}
