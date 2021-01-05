<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        $typeUser = $type;
        return view('users.addUsers',['typeUser'=>$typeUser]);
    }
}
