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
}
