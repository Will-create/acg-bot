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
            case 'Administrateur Général':
                $utilisateurs  = User::latest()->get();
                return view('pages.backoffice.administrateur.dasboard-admin', compact('utilisateurs'));
            break;
        }
    }
}
