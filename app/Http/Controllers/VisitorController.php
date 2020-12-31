<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitorController extends Controller
{
    //

    public function index()
    {
        return view('welcome');
    }

    public function aboutUs()
    {
        return view('visitorPages.aboutUS');
    }

    public function blogs()
    {
        return view('visitorPages.blog');
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
        return view('visitorPages.doctors');
    }

    public function services()
    {
        return view('visitorPages.services');
    }
}
