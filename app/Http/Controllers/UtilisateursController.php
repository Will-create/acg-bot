<?php

namespace App\Http\Controllers;

use App\Models\Pay;
use App\Models\Role;
use App\Models\Unite;
use App\Models\User;
use App\Models\Localite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UtilisateursController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role->designation == 'Chef d’Unité') {
            $utilisateurs  = User::where('role_id', Role::where('designation', 'Agent d’une Unité')->first()->id)->where('pay_id', Auth::user()->pay->id)->latest()->get();
        }
        elseif(Auth::user()->role->designation == 'Coordonnateur National'){
            $role_id = Role::whereIn('designation', ['Chef d’Unité', 'Agent d’une Unité'])->pluck('id');
            $utilisateurs  = User::where('pay_id', Auth::user()->pay->id)->whereIn('role_id', $role_id)->latest()->get();
        }
        else {
            $utilisateurs  = User::latest()->get();
        }

        return view('pages.backoffice.administrateur.utilisateurs.index', compact('utilisateurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unites = Unite::all();
        $localites = Localite::all();
        $pays = Pay::all();
        if (Auth::user()->role->designation == 'Administrateur Général') {
            $roles = Role::whereIn('designation', ['Coordonnateur Régional', 'Coordonnateur National'])->get();
        }
        elseif(Auth::user()->role->designation == 'Coordonnateur Régional'){
            $roles = Role::where('designation', 'Coordonnateur National')->first();
        }
        elseif(Auth::user()->role->designation == 'Coordonnateur National'){
            $roles = Role::where('designation', 'Chef d’Unité')->first();
            $pays = Pay::where('nom', Auth::user()->pay->nom)->first();
        }
        elseif(Auth::user()->role->designation == 'Chef d’Unité'){
            $roles = Role::where('designation', 'Agent d’une Unité')->first();
            $pays = Pay::where('nom', Auth::user()->pay->nom)->first();
        }

        return view('pages.backoffice.administrateur.utilisateurs.create', compact('roles', 'unites', 'localites', 'pays'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =   $request->validate([
            'nom'                       => ['required', 'string', 'max:255'],
            'prenom'                    => ['required', 'string', 'max:255'],
            'tel'                       => ['required', 'digits_between:8,13'],
            'email'                     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role_id'                   => ['required'],
            'pay_id'                    => ['required'],
            'localite_id'               => ['required'],
            'unite_id'                  => ['nullable'],
            'titre'                     => ['nullable', 'string', 'max:100'],
            'profile_photo_path'        => ['nullable'],
        ]);
        $path = null;
        if ($request->profile_photo_path) {
            $path = $request->profile_photo_path->store('profile_photo_path');
        }


        User::create([
            'uuid'                  => Str::uuid(),
            'nom'                       => $data['nom'],
            'prenom'                    => $data['prenom'],
            'tel'                       => $data['tel'],
            'email'                     => $data['email'],
            'role_id'                   => $data['role_id'],
            'pay_id'                    => $data['pay_id'],
            'localite_id'               => $data['localite_id'],
            'unite_id'                  => $request->unite_id,
            'titre'                     => $request->titre,
            'password'                  => Hash::make('00000000'),
            'profile_photo_path'        => $path
        ]);

        $request->session()->flash('status', 'Utilisateur créé avec succès');

        return redirect()->route('utilisateurs.index');
    }

    public function show(User $utilisateur)
    {
        return view('pages.backoffice.administrateur.utilisateurs.show', compact('utilisateur'));
    }

    public function edit(User $utilisateur)
    {
        $roles = Role::whereIn('designation', ['Coordonnateur Régional', 'Coordonnateur National'])->get();
        $unites = Unite::all();
        $localites = Localite::all();
        $pays = Pay::all();
        return view('pages.backoffice.administrateur.utilisateurs.edit', compact('roles', 'unites', 'localites', 'pays', 'utilisateur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $utilisateur)
    {
        $data =   $request->validate([
            'nom'                       => ['required', 'string', 'max:255'],
            'prenom'                    => ['required', 'string', 'max:255'],
            'tel'                       => 'required|digits_between:8,13|unique:users,tel,'.$utilisateur->id,
            'email'                     => 'required|email|max:255|unique:users,email,'.$utilisateur->id,
            'role_id'                   => ['required'],
            'unite_id'                  => ['nullable'],
            'titre'                     => ['required'],
            'profile_photo_path'        => ['nullable'],
        ]);
        $path = null;
        if ($request->profile_photo_path) {
            $path = $request->profile_photo_path->store('profile_photo_path');
        }
        else {
         $path = $utilisateur->profile_photo_path;
        }

        $utilisateur->update([
            'uuid'                  => Str::uuid(),
            'nom'                       => $data['nom'],
            'prenom'                    => $data['prenom'],
            'tel'                       => $data['tel'],
            'email'                     => $data['email'],
            'role_id'                   => $data['role_id'],
            // 'unite_id'                  => $data['unite_id'],
            'titre'                     => $data['titre'],
            'password'                  => Hash::make('00000000'),
            'profile_photo_path'        => $path
        ]);
        $request->session()->flash('status', 'Les informations ont été mises jour avec succès');
        return redirect()->route('utilisateurs.show', $utilisateur->uuid);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
    public function gerer(User $utilisateur, Request $request)
    {
       if ($utilisateur->actif == true) {
        $utilisateur->actif = false;
        $utilisateur->save();
        $request->session()->flash('warning', 'Le compte de l\'utilisateur a été désactivé');
        return redirect()->route('utilisateurs.show', $utilisateur->uuid);
       } else {
        $utilisateur->actif = true;
        $utilisateur->save();
        $request->session()->flash('status', 'Le compte de l\'utilisateur a été activé');
        return redirect()->route('utilisateurs.show', $utilisateur->uuid);
       }
    }
}
