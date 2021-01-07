<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Medecin;

class ScrtrDocController extends Controller
{
    
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

        return view('secrtrDoctorPages.profile',['nameUser'=>$this->getNameUsers()]);
    }

     public function editProfile()
    {
        return view('secrtrDoctorPages.editProfile',['nameUser'=>$this->getNameUsers()]);
    }
}
