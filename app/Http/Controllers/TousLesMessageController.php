<?php

namespace App\Http\Controllers;

use App\Models\Api;
use App\Models\TousLesMessage;
use App\Models\Menu;
use App\Models\Restriction;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class TousLesMessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    { 
        $sms = TousLesMessage::all()->orderBy('created_at', 'desc')->get();
        $titrePage = "Liste de tous les messages";
        $mot = 'contenu_entree';
        $mots = strlen('le nombre de caractère', $mot);
        return view('pages.backoffice.apis.index', compact('sms', 'titrePage'), $mots);
    }
    public function create($apiuuid)
    {
        return view('pages.backoffice.sms.createdit', [
            'sms' => new TousLesMessage(),
            'api' => Api::where('uuid', $apiuuid)->first(),
            'titrePage' => "Ajout d'une nouvelle Api",
            'btnAction' => "Ajouter"
        ]);
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'contenu_entree'                        => ['nullable', 'string', 'min:3'],
            'contenu_sortie'                           =>  ['nullable', 'string', 'min:3'],
            'valide_de'                       => ['nullable', 'date'],
            'valide_a'                         => ['nullable', 'date'],
            'verified_at'                        => ['nullable', 'string'],
            'verified_by'                        => ['nullable', 'integer'],
        ]);
        $message = new TousLesMessage();
        $message->contenu_entree = $data['contenu_entree'];
        $message->uuid = Str::uuid();
        $message->contenu_sortie = $data['contenu_sortie'];
        $message->valide_de = $data['valide_de'];
        $message->valide_a = $data['valide_a'];
        $message->verified_at = $data['verified_at'];
        $message->verified_by = $data['verified_by'];
        $message->save();
        return response()->json(['success' => true]);
    }

    public function show($uuid)
    {
        $api = Api::where('uuid', $uuid)->with('menu', 'sms')->first();
        $titrePage = "Détails d'une api";
        return view('pages.backoffice.apis.show', compact('api', 'titrePage'));
    }
    public function edit(Api $api)
    {
        return view('pages.backoffice.apis.createdit', [
            'api' => $api,
            'menus' => Menu::where('type_menu_id', null)->orderBy('nom', 'asc')->get(),
            'titrePage' => "Mise à jours d'une Api",
            'btnAction' => "Ajouter"
        ]);
    }

    

}
