<?php

namespace App\Http\Controllers;

use App\Models\Pay;
use App\Models\Role;
use App\Models\User;
use App\Models\Unite;
use App\Models\Localite;
use App\Models\Restriction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\CreateUserNotification;

class UtilisateursController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
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
        $utilisateur = new User();
        $titrePage = "Ajout d'un agent";
        $roles = Role::all();
        return view('pages.backoffice.administrateur.utilisateurs.create', compact('roles', 'utilisateur', 'titrePage'));
    }

    public function store(Request $request)
    {
        $data =   $request->validate([
            'nom'                       => ['required', 'string', 'max:255'],
            'prenom'                    => ['required', 'string', 'max:255'],
            'tel'                       => ['required', 'string', 'min:8', 'max:20'],
            'email'                     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role_id'                   => ['required', 'integer'],
            'titre'                     => ['nullable', 'string', 'max:100'],
            'profile_photo_path'        => ['nullable', 'mimes:jpeg,jpg,png,gif', 'required', 'max:10000'],
        ]);
        $user = new User();
        $path = null;
        if ($request->profile_photo_path) {
            $path = $request->profile_photo_path->store('profile_photo_path');
        }
        if ($request->hasFile('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp . '-' . $file->getClientOriginalName();
            $photoPath = request('profile_photo_path')->storeAs('profile_photo_path', $name, 'public');
            $user->profile_photo_path = $photoPath;
        }
        $n = 8;
        $result = bin2hex(random_bytes($n));
            $user->uuid                   = Str::uuid();
            $user->nom                       = $request['nom'];
            $user->prenom                    = $request['prenom'];
            $user->tel                       = $request['tel'];
            $user->email                     = $request['email'];
            $user->role_id                   = $request['role_id'];
            $user->titre                     = $request->titre;
            $user->password                  = Hash::make($result);
            // $user->profile_photo_path        = $path;
            $user->save();
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

        $utilisateur = User::where('uuid', $uuid)->first();
        return view('pages.backoffice.administrateur.utilisateurs.show', compact('utilisateur', 'titrePage'));
    }
    public function edit(User $utilisateur)
    {
        $titrePage = "Modification des informations d'un utilisateur";
        $roles = Role::all();
        return view('pages.backoffice.administrateur.utilisateurs.edit', compact('roles',  'utilisateur', 'titrePage'));
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

        if ($request->hasFile('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp . '-' . $file->getClientOriginalName();
            $photoPath = request('profile_photo_path')->storeAs('profile_photo_path', $name, 'public');
            $utilisateur->profile_photo_path = $photoPath;
        }
        if ($previousUrl ==  '/admin/user/profil') {
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
                'profile_photo_path'        => $path
            ]);
        } else {
            $data =   $request->validate([
                'nom'                       => ['required', 'string', 'max:255'],
                'prenom'                    => ['required', 'string', 'max:255'],
                'tel'                       => 'required|string|min:8|max:20|unique:users,tel,' . $utilisateur->id,
                'email'                     => 'required|email|max:255|unique:users,email,' . $utilisateur->id,
                'role_id'                   => ['required'],
                'profile_photo_path'        => ['nullable', 'mimes:jpeg,jpg,png,gif', 'max:10000'],
            ]);
            // $utilisateur->update([
            //     'nom'                       => $request['nom'],
            //     'prenom'                    => $request['prenom'],
            //     'tel'                       => $request['tel'],
            //     'email'                     => $request['email'],
            //     'role_id'                   => $request['role_id'],
            //     'unite_id'                  => $request['unite_id'],
            //     'titre'                     => $request['titre'],
            //     'profile_photo_path'        => $path
            // ]);
            $utilisateur->nom                   = $request->nom;
            $utilisateur->prenom                = $request->prenom;
            $utilisateur->tel                   = $request->tel;
            $utilisateur->email                 = $request->email;
            $utilisateur->role_id               = $request->role_id;
            $utilisateur->titre                 = $request->titre;
            $utilisateur->profile_photo_path    = $request->path;
            $utilisateur->save();
        }
        if ($previousUrl ==  '/admin/user/profile') {
            $request->session()->flash('status', 'Votre profil a été mis à jour');
            return redirect()->back();
        }
        $request->session()->flash('status', 'Les informations ont été mises jour avec succès');
        return redirect()->route('utilisateurs.show', $utilisateur->uuid);
    }


    public function destroy(User $utilisateur, Request $request)
    {
        $restriction = new Restriction;
        $restrictions = $restriction->check($utilisateur->id, [
            ['foreignkey' => 'verified_by', 'modelname' => 'sms'],
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
        return view('pages.backoffice.administrateur.utilisateurs.edit-password', [
            'titrePage' => "Modification des identifiants d'un utilisateur"
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
