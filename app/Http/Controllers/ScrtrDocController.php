<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Medecin;
use App\Models\Secretaire;

class ScrtrDocController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	public function getNameUsers()
    {
        $nameUser = Medecin::find(Auth::user()->id)->nom.' '.Medecin::find(Auth::user()->id)->prenom;
        return $nameUser;
    }

    public function dashboard()
    {

        return view('secrtrDoctorPages.dashboard',['nameUser'=>$this->getNameUsers()]);
    }

    public function profile()
    {
        $userRole = Auth::user()->user_roles;
        if($userRole == 'secretaire'){
            $user = Secretaire::find(Auth::user()->id);
        }else if($userRole == 'doctor' || $userRole == 'adminM'){
            $user = Medecin::find(Auth::user()->id);
        }

        return view('users.profile',['nameUser'=>$this->getNameUsers(),'user' => $user]);
    }

     public function editProfile()
    {
        $userRole = Auth::user()->user_roles;
        if($userRole == 'secretaire'){
            $user = Secretaire::find(Auth::user()->id);
        }else if($userRole == 'doctor' || $userRole == 'adminM'){
            $user = Medecin::find(Auth::user()->id);
        }
        return view('users.editProfile',['nameUser'=>$this->getNameUsers(),'user' => $user]);
    }
}
