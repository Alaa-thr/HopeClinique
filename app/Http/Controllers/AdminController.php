<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Medecin;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Facades\UploadedFile;

class AdminController extends Controller
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
    public function allDoctorsAdmin()
    {
        return view('adminPages.allDoctorsAdmin',['nameUser'=>$this->getNameUsers()]);
    }

    public function allPatientsAdmin()
    {
        return view('adminPages.allPatientsAdmin',['nameUser'=>$this->getNameUsers()]);
    }

    public function allAppointmentsAdmin()
    {
        return view('adminPages.allAppointmentsAdmin',['nameUser'=>$this->getNameUsers()]);
    }

    public function allSecretariesAdmin()
    {
        return view('adminPages.allSecretariesAdmin',['nameUser'=>$this->getNameUsers()]);
    }

    public function allservicesAdmin()
    {
        return view('adminPages.allservicesAdmin',['nameUser'=>$this->getNameUsers()]);
    }

    public function allblogsAdmin()
    {
        return view('adminPages.blogs',['nameUser'=>$this->getNameUsers()]);
    }

    public function detailsBlogAdmin()
    {
        return view('adminPages.detailsBlog',['nameUser'=>$this->getNameUsers()]);
    }

    public function addUser($type)
    {
        //tq clique sur adduser test type if admin ,sec,patient ou doctor for t3abik l page adduser ta3ou
        $typeUser = $type;

        //pour récupérer les villes m bdd
        $villes=\DB::table('villes')->orderBy('id','asc')->get();

        //pour récupérer les maladies chroniques m bdd
        $chroniques=\DB::table('maladieschroniques')->orderBy('id','asc')->get();

        //pour récupérer les allergies m bdd
        $allergies=\DB::table('allergies')->orderBy('id','asc')->get();

        //pour récupérer les specialites m bdd
        $specialites=\DB::table('specialites')->orderBy('id','asc')->get();

        return view('users.addUsers',['typeUser'=>$typeUser,'villes'=>$villes,
        'chroniques'=>$chroniques,'allergies'=>$allergies,'specialites'=>$specialites,'nameUser'=>$this->getNameUsers()]);
    }

    public function updateProfile(ProfileRequest $request)
    {
        $userRole = Auth::user()->user_roles;
        if($userRole == 'secretaire'){
            $user = Secretaire::find(Auth::user()->id);
        }else if($userRole == 'doctor' || $userRole == 'adminM'){
            $userAuth = Auth::user();
            $userAuth->email = $request->email;
            $userAuth->phone = $request->phone;

            $user = Medecin::find(Auth::user()->id);
            $user->nom = $request->nom;
            $user->prenom = $request->prenom;
            $user->gender = $request->gender;
            if($request->hasFile('avatar')){
                $user->avatar = $request->avatar->store('users_Avatar');
            }
            
            $userAuth->save();
            $user->save();
        }
        return back();   
    }
}
