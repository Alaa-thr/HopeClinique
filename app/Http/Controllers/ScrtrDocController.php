<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Medecin;

class ScrtrDocController extends Controller
{
    

    public function dashboard()
    {

    	$nameUser = Medecin::find(Auth::user()->id)->nom.' '.Medecin::find(Auth::user()->id)->prenom;
    	if(Auth::user()->user_roles == 'adminM'){
            $typeUser = 'adminM';
        }else if(Auth::user()->user_roles == 'doctor'){
        	$typeUser = 'doctor';
        }
        return view('secrtrDoctorPages.dashboard',['typeUser'=>$typeUser,'nameUser'=>$nameUser]);
    }
}
