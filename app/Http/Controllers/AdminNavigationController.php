<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminNavigationController extends Controller
{  public function __construct()
    {
        $this->middleware('auth');
    }

    public function accueil() {
        return view('pages.backOffice.administrateur.dasboard');
    }
    
}
