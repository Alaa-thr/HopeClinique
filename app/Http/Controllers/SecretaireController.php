<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Secretaire;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AddUsersRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Medecin;

class SecretaireController extends Controller
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
              }
      }
      public function getsearchSecretaires(Request $request){

        $search = $request->get('search');//prendre le mot qui nous saisissons
        $userS  = \DB::table('users')->get();


      if($request->search != "" && $request->searchp != ""){
        $listeS  =\DB::table('secretaires')->orWhere('nom', 'like', '%'.$request->search.'%')
                                       ->orWhere('prenom', 'like', '%'.$request->search.'%')
                                       ->get();
        $userS =\DB::table('users')->orWhere('phone', 'like', '%'.$request->searchp.'%')
                                       ->get();
      }
      elseif($request->search != ""){
        $listeS  =\DB::table('secretaires')->orWhere('nom', 'like', '%'.$request->search.'%')
                                        ->orWhere('prenom', 'like', '%'.$request->search.'%')
                                        ->get();
      }
      elseif($request->searchp != ""){
        $userS  =\DB::table('users')->orWhere('phone', 'like', '%'.$request->searchp.'%')
                                        ->get();
        $listeS  =\DB::table('secretaires')->get();
      }
      return view('search.SearchSecretaire',['users'=>$this->getNameUsers(),'listeS'=>$listeS,'search' => $search,'userS'=>$userS]);
    }
}
