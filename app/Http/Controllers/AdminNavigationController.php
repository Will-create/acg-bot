<?php

namespace App\Http\Controllers;

use App\Models\AireProtegee;
use App\Models\Crime;
use App\Models\Role;
use App\Models\Unite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminNavigationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function accueil() {
        switch (Auth::user()->role->designation) {
            case 'Agent d’une Unité':
                // $utilisateurs  = User::where('role_id', Role::where('designation', 'Agent d’une Unité')->first()->id)->where('pay_id', Auth::user()->pay->id)->latest()->get();
                return view('pages.backoffice.administrateur.dasboard-agent-unite');
            break;
            case 'Chef d’Unité':
                $utilisateurs  = User::where('role_id', Role::where('designation', 'Agent d’une Unité'));
                return view('pages.backoffice.administrateur.dasboard-chef-unite', compact('utilisateurs'));
            break;

            case 'Coordonnateur National':
                $role_id = Role::whereIn('designation', ['Chef d’Unité', 'Agent d’une Unité'])->pluck('id');
                $utilisateurs  = User::where('pay_id', Auth::user()->pays->id)->whereIn('role_id', $role_id)->latest()->get();
                return view('pages.backoffice.administrateur.dasboard-coordonnateur-national', compact('utilisateurs'));

            break;
            case 'Coordonnateur Régional':
                $role_id = Role::whereIn('designation', ['Chef d’Unité', 'Agent d’une Unité'])->pluck('id');
                $utilisateurs  = User::where('pay_id', Auth::user()->pays->id)->whereIn('role_id', $role_id)->latest()->get();
                $coordonateurs = User::where('role_id', Role::where('designation', 'Coordonnateur National')->first()->id)->get();
                return view('pages.backoffice.administrateur.dasboard-coodonnateur-regional', compact('utilisateurs', 'coordonateurs'));
            break;
            case 'Administrateur Général':
                $utilisateurs  = User::latest()->get();
                $airesprotegers  = AireProtegee::orderBy('libelle', 'DESC')->get();
                $crimes  = Crime::count();
                $unites  = Unite::count();
                $coordonateurs = User::where('role_id', Role::where('designation', 'Coordonnateur National')->first()->id)->get();
                return view('pages.backoffice.administrateur.dasboard-admin', compact('utilisateurs', 'coordonateurs', 'airesprotegers', 'crimes', 'unites'));
            break;


        }

    }

}
