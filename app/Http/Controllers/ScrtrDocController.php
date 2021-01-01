<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScrtrDocController extends Controller
{
    

    public function dashboard()
    {
        return view('secrtrDoctorPages.dashboard');
    }
}
