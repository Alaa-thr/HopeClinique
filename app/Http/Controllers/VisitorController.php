<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medecin;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use App\Models\Specialite;

class VisitorController extends Controller
{
    //
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

    public function index()
    {
      $blogs = Blog::all();
      $allservices = Specialite::all();
      $listeM = \DB::table('medecins')
                ->join('users','users.id','=','medecins.user_id')
                ->select('medecins.avatar','medecins.id','medecins.nom','medecins.prenom',
                'medecins.specialite','users.phone','users.email')
                ->get();
      return view('welcome',['allservices'=>$allservices,'blogs'=>$blogs,'listeM'=>$listeM]);
    }

    public function aboutUs()
    {
        return view('visitorPages.aboutUS');
    }

    public function blogs()
    {
        $blogs = Blog::all();

        return view('visitorPages.blog',['blogs'=>$blogs]);
    }

    public function bolgDetails()
    {
        return view('visitorPages.blogDetail');
    }

    public function contactUs()
    {
        return view('visitorPages.contactUs');
    }

    public function doctors()
    {
        $listeM = \DB::table('medecins')
              ->join('users','users.id','=','medecins.user_id')
              ->select('medecins.avatar','medecins.id','medecins.nom','medecins.prenom',
              'medecins.specialite','users.phone','users.email')
              ->get();
        return view('visitorPages.doctors',['users'=>$this->getNameUsers(),'listeM'=>$listeM]);
    }

    public function services()
    {
      $allservices = Specialite::all();
      return view('visitorPages.services',['users'=>$this->getNameUsers(),'allservices'=>$allservices]);
    }
}
