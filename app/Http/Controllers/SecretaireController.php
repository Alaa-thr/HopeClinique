<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Secretaire;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AddUsersRequest;
use Illuminate\Support\Facades\Storage;

class SecretaireController extends Controller
{


      public function store(AddUsersRequest $request)
      {
              if($request->s == "secretaire"){

              $user = new User();
              $user->phone = $request->phone;
              $user->email = $request->email;
              $user->password = Hash::make($request->password);
              $user->user_roles = "secretaire";
              $user->save();

              $secretaire = new Secretaire();
              $secretaire->nom      = $request->input('nom');
              $secretaire->prenom   = $request->input('prenom');
              $secretaire->user_id  = $user->id;
              $secretaire->avatar   = $request->input('avatar');
              $secretaire->gender   = $request->status == '1' ? 'Female' : 'Male' ;
              $secretaire->save();

              return back();
}}
}
