<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{


    public function allDoctorsAdmin()
    {
        return view('adminPages.allDoctorsAdmin');
    }

    public function allPatientsAdmin()
    {
        return view('adminPages.allPatientsAdmin');
    }

    public function allAppointmentsAdmin()
    {
        return view('adminPages.allAppointmentsAdmin');
    }

    public function allSecretariesAdmin()
    {
        return view('adminPages.allSecretariesAdmin');
    }

    public function allservicesAdmin()
    {
        return view('adminPages.allservicesAdmin');
    }

    public function addUser($type)
    {
        //tq clique sur adduser test type if admin ,sec,patient ou doctor for t3abik l page adduser ta3ou
        $typeUser = $type;
        /*if(auth::user()->user_roles == 'adminM'){
            $isAdmin = true;
        }*/
        $isAdmin = false;
        //pour récupérer les villes m bdd
        $villes=\DB::table('villes')->orderBy('id','asc')->get();

        //pour récupérer les maladies chroniques m bdd
        $chroniques=\DB::table('maladieschroniques')->orderBy('id','asc')->get();

        //pour récupérer les allergies m bdd
        $allergies=\DB::table('allergies')->orderBy('id','asc')->get();

        //pour récupérer les specialites m bdd
        $specialites=\DB::table('specialites')->orderBy('id','asc')->get();

        return view('users.addUsers',['typeUser'=>$typeUser,'villes'=>$villes,
        'chroniques'=>$chroniques,'allergies'=>$allergies,'specialites'=>$specialites,'isAdmin'=>$isAdmin]);
    }
}
