<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminNavigationController extends Controller
{  public function __construct()
    {
        $this->middleware('auth');
    }

    public function accueil() {
        if (Auth::user()->role->designation == 'Chef d’Unité') {
            $utilisateurs  = User::where('role_id', Role::where('designation', 'Agent d’une Unité')->first()->id)->where('pay_id', Auth::user()->pay->id)->latest()->get();
        }
        elseif(Auth::user()->role->designation == 'Coordonnateur National'){
            $role_id = Role::whereIn('designation', ['Chef d’Unité', 'Agent d’une Unité'])->pluck('id');
            $utilisateurs  = User::where('pay_id', Auth::user()->pay->id)->whereIn('role_id', $role_id)->latest()->get();
        }
        else {
            $utilisateurs  = User::latest()->get();
            $coordonateurs = User::where('role_id', Role::where('designation', 'Coordonnateur National')->first()->id)->get();
            return view('pages.backOffice.administrateur.dasboard-admin', compact('utilisateurs', 'coordonateurs'));
        }
    }

}
