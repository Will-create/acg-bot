<?php

namespace App\Http\Controllers;

use App\Models\Pay;
use App\Models\Role;
use App\Models\Unite;
use App\Models\User;
use App\Models\Ville;
use Illuminate\Http\Request;
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
        $utilisateurs  = User::latest()->get();
        return view('pages.backOffice.administrateur.utilisateurs.index', compact('utilisateurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::whereIn('designation', ['Coordonnateur Régional', 'Coordonnateur National'])->get();
        $unites = Unite::all();
        $villes = Ville::all();
        $pays = Pay::all();
        return view('pages.backOffice.administrateur.utilisateurs.create', compact('roles', 'unites', 'villes', 'pays'));
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
            'unite_id'                  => ['nullable'],
            'titre'                     => ['required'],
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
            'unite_id'                  => $data['unite_id'],
            'titre'                     => $data['titre'],
            'password'                  => Hash::make('00000000'),
            'profile_photo_path'        => $path
        ]);

        $request->session()->flash('status', 'Utilisateur ajouté avec succès');

        return redirect()->route('utilisateurs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $utilisateur)
    {
        return view('pages.backOffice.administrateur.utilisateurs.show', compact('utilisateur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $utilisateur)
    {
        $roles = Role::whereIn('designation', ['Coordonnateur Régional', 'Coordonnateur National'])->get();
        $unites = Unite::all();
        $villes = Ville::all();
        $pays = Pay::all();
        return view('pages.backOffice.administrateur.utilisateurs.edit', compact('roles', 'unites', 'villes', 'pays', 'utilisateur'));
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
