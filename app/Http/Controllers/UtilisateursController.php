<?php

namespace App\Http\Controllers;

use App\Models\Pay;
use App\Models\Restriction;
use App\Models\Role;
use App\Models\Unite;
use App\Models\User;
use App\Models\Localite;
use App\Notifications\CreateUserNotification;
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
        $titrePage = "Liste de tous les utilisateurs";

        switch (Auth::user()->role->designation) {
            case 'Chef d’Unité':
                $utilisateurs  = User::where('role_id', Role::where('designation', 'Agent d’une Unité')->first()->id)->where('pay_id', Auth::user()->pays->id)->latest()->get();
                break;
            case 'Coordonnateur National':
                $role_id = Role::whereIn('designation', ['Chef d’Unité', 'Agent d’une Unité'])->pluck('id');
                $utilisateurs  = User::where('pay_id', Auth::user()->pays->id)->whereIn('role_id', $role_id)->latest()->get();
                break;
            case 'Coordonnateur Régional':
                $role_id = Role::whereIn('designation', ['Chef d’Unité', 'Agent d’une Unité', 'Coordonnateur National'])->pluck('id');
                $utilisateurs  = User::where('pay_id', Auth::user()->pays->id)->whereIn('role_id', $role_id)->latest()->get();
                // $utilisateurs  = User::latest()->get();
                break;
            case 'Administrateur Général':
                $utilisateurs  = User::latest()->get();
                break;
            default:

                break;
        }

        return view('pages.backoffice.administrateur.utilisateurs.index', compact('utilisateurs', 'titrePage'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $unites = Unite::all();
        $localites = Localite::all();
        $pays = Pay::all();
        $utilisateur = new User();

        switch (Auth::user()->role->designation) {
            case 'Administrateur Général':
                $roles = Role::whereIn('designation', ['Coordonnateur Régional', 'Coordonnateur National'])->get();
                break;
            case 'Coordonnateur Régional':
                $roles = Role::where('designation', 'Coordonnateur National')->first();
                break;
            case 'Coordonnateur National':
                $roles = Role::where('designation', 'Chef d’Unité')->first();
                $unites = Unite::where('pays_id',  Auth::user()->pays->id)->get();
                $unites = Unite::where('pays_id', Auth::user()->pay->id)->orderBy('designation', 'asc')->count();
                if ($unites < 1) {
                    $request->session()->flash('warning', " Accès refusé, <br> Veuiilez d'abord ajouter une unité à votre pays");
                    return redirect()->route('unites.create');
                }
                // dd(Auth::user()->pays->id);
                break;
            case 'Chef d’Unité':
                $roles = Role::where('designation', 'Agent d’une Unité')->first();
                $pays = Pay::where('nom', Auth::user()->pays->nom)->first();
                // $unites = Unite::where('pays_id', $pays->id)->get();
                break;

            default:
                abort(404);
                break;
        }
        $titrePage = "Ajout d'un agent";

        return view('pages.backoffice.administrateur.utilisateurs.create', compact('roles', 'unites', 'localites', 'pays', 'utilisateur', 'titrePage'));
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
            'tel'                       => ['required', 'string', 'min:8', 'max:20'],
            'email'                     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role_id'                   => ['required', 'integer'],
            'pay_id'                    => ['required', 'integer'],
            'localite_id'               => ['required', 'integer'],
            'unite_id'                  => ['nullable'],
            'titre'                     => ['nullable', 'string', 'max:100'],
            'profile_photo_path'        => ['nullable', 'mimes:jpeg,jpg,png,gif', 'required', 'max:10000'],
        ]);

        $path = null;
        if ($request->profile_photo_path) {
            $path = $request->profile_photo_path->store('profile_photo_path');
        }
        $n = 8;
        $result = bin2hex(random_bytes($n));
        $user =   User::create([
            'uuid'                  => Str::uuid(),
            'nom'                       => $request['nom'],
            'prenom'                    => $request['prenom'],
            'tel'                       => $request['tel'],
            'email'                     => $request['email'],
            'role_id'                   => $request['role_id'],
            'pay_id'                    => $request['pay_id'],
            'localite_id'               => $request['localite_id'],
            'unite_id'                  => $request->unite_id,
            'titre'                     => $request->titre,
            'password'                  => Hash::make($result),
            'profile_photo_path'        => $path
        ]);
        try {
            $user->notify(new CreateUserNotification($user, $result));
            $request->session()->flash('status', 'Utilisateur créé avec succès, un mail lui sera envoyé !');
        } catch (\Throwable $th) {
            $request->session()->flash('status', 'Utilisateur créé avec succès,  nous n\'nous avons pu envoyer envoyer le mail');
        }

        return redirect()->route('utilisateurs.show', $user->uuid);
    }
    public function show($uuid)
    {
        $titrePage = "Détail d'un utilisateur";

        $utilisateur = User::where('uuid', $uuid)->with('unite', 'localite', 'pays')->first();
        return view('pages.backoffice.administrateur.utilisateurs.show', compact('utilisateur', 'titrePage'));
    }
    public function edit(User $utilisateur)
    {
        $titrePage = "Modification des informations d'un utilisateur";
        switch (Auth::user()->role->designation) {
            case 'Administrateur Général':
                $roles = Role::whereIn('designation', ['Coordonnateur Régional', 'Coordonnateur National'])->get();
                break;
            case 'Coordonnateur Régional':
                $roles = Role::where('designation', $utilisateur->role->designation)->first();

                break;
            case 'Coordonnateur National':
                $roles = Role::where('designation', 'Chef d’Unité')->first();
                $unites = Unite::where('pays_id',  Auth::user()->pays->id)->get();
                $unites = Unite::where('pays_id', Auth::user()->pay->id)->orderBy('designation', 'asc')->count();
                break;
            case 'Chef d’Unité':
                $roles = Role::where('designation', 'Agent d’une Unité')->first();
                $pays = Pay::where('nom', Auth::user()->pays->nom)->first();
                // $unites = Unite::where('pays_id', $pays->id)->get();
                break;

            default:
                abort(404);
                break;
        }

        $unites = Unite::all();
        $localites = Localite::all();
        $pays = Pay::all();
        return view('pages.backoffice.administrateur.utilisateurs.edit', compact('roles', 'unites', 'localites', 'pays', 'utilisateur', 'titrePage'));
    }
    public function update(Request $request, User $utilisateur)
    {
        $previousUrl = str_replace(url('/'), '', url()->previous());
        $path = null;
        if ($request->profile_photo_path) {
            $path = $request->profile_photo_path->store('profile_photo_path');
        } else {
            $path = $utilisateur->profile_photo_path;
        }
        if ($previousUrl ==  '/user/profil') {
            $data =   $request->validate([
                'nom'                       => ['required', 'string', 'max:255'],
                'prenom'                    => ['required', 'string', 'max:255'],
                'tel'                       => 'required|string|min:8|max:20|unique:users,tel,' . $utilisateur->id,
                'email'                     => 'required|email|max:255|unique:users,email,' . $utilisateur->id,
                'profile_photo_path'        => 'nullable',
                'unite_id'                   => 'nullable',
            ]);
            $utilisateur->update([
                'nom'                       => $request['nom'],
                'prenom'                    => $request['prenom'],
                'tel'                       => $request['tel'],
                'email'                     => $request['email'],
                'unite_id'                  => $request['unite_id'],
                'profile_photo_path'        => $path
            ]);
        } else {
            $data =   $request->validate([
                'nom'                       => ['required', 'string', 'max:255'],
                'prenom'                    => ['required', 'string', 'max:255'],
                'tel'                       => 'required|string|min:8|max:20|unique:users,tel,' . $utilisateur->id,
                'email'                     => 'required|email|max:255|unique:users,email,' . $utilisateur->id,
                'role_id'                   => ['required'],
                'unite_id'                  => ['nullable'],
                'pay_id'                    => ['required'],
                'profile_photo_path'        => ['nullable', 'mimes:jpeg,jpg,png,gif', 'max:10000'],
            ]);
            $utilisateur->update([
                'nom'                       => $request['nom'],
                'prenom'                    => $request['prenom'],
                'tel'                       => $request['tel'],
                'email'                     => $request['email'],
                'role_id'                   => $request['role_id'],
                'unite_id'                  => $request['unite_id'],
                'titre'                     => $request['titre'],
                'profile_photo_path'        => $path
            ]);
        }
        if ($previousUrl ==  '/user/profile') {
            $request->session()->flash('status', 'Votre profil a été mis à jour');
            return redirect()->back();
        }
        $request->session()->flash('status', 'Les informations ont été mises jour avec succès');
        return redirect()->route('utilisateurs.show', $utilisateur->uuid);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $utilisateur, Request $request)
    {
        $restriction = new Restriction;
        $restrictions = $restriction->check($utilisateur->id, [
            ['foreignkey' => 'responsable_id', 'modelname' => 'unite'],
        ]);
        if ($restrictions) {
            return redirect()->back()->with('danger', $restrictions['message']);
        } else {
            $utilisateur->delete();
            $request->session()->flash('warning', 'Utilisateur supprimé avec succes');
            return redirect()->route('utilisateurs.index');
           }
    }
    public function gerer(User $utilisateur, Request $request)
    {
        if ($utilisateur->actif == true) {
            $utilisateur->actif = false;
            $utilisateur->save();
            $request->session()->flash('warning', 'Le compte de l\'utilisateur a été désactivé');
            return redirect()->back();

            return redirect()->route('utilisateurs.show', $utilisateur->uuid);
        } else {
            $utilisateur->actif = true;
            $utilisateur->save();
            $request->session()->flash('status', 'Le compte de l\'utilisateur a été activé');
            return redirect()->back();
            return redirect()->route('utilisateurs.show', $utilisateur->uuid);
        }
    }
    public function profil()
    {
        $titrePage = "Informations d'un utilisateur";

        return view('pages.backoffice.administrateur.utilisateurs.profil', [
            'user' => Auth::user(),
            'titrePage' => $titrePage
        ]);
    }
    public function edit_password()
    {
        $titrePage = "Modificationdes identifiants d'un utilisateur";
        return view('pages.backoffice.administrateur.utilisateurs.edit-password', [
            'titrePage' => $titrePage
        ]);
    }
    public function change_password(Request $request)
    {
        $user = Auth::User();
        $request->validate([
            "current_password"                       => 'required',
            "new_password"                           => 'required|confirmed',
        ]);
        if (Hash::check($request->get('current_password'), $user->password)) {
            $user->password = Hash::make($request->get('new_password'));
            $user->save();
            session()->flash('status', '<b>Votre mot de passe a été mis à jour avec succès !</b>');
            return redirect()->route('accueil');
        } else {
            session()->flash('warning', '<b>L\'actuel mot de passe saisi est invalide !</b>');
            return redirect()->back();
        }
        return redirect()->back();
    }
}