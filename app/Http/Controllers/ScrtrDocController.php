<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Medecin;
use App\Models\Secretaire;
use App\Models\Patient;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AddUsersRequest;

class ScrtrDocController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	  public function getNameUsers()
    {
        $nameUser = null;
        if(Auth::user()->user_roles == 'doctor' || Auth::user()->user_roles == 'adminM'){
            $nameUser = Medecin::find(Auth::user()->id)->nom.' '.Medecin::find(Auth::user()->id)->prenom;
        }else if(Auth::user()->user_roles == 'secretaire'){
            $nameUser = Secretaire::find(Auth::user()->id)->nom.' '.Secretaire::find(Auth::user()->id)->prenom;
        }
        return $nameUser;
    }


}
