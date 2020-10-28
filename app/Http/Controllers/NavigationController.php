<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function accueil() {
        return view('pages.backOffice.index');
    }


}
