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
            'fournisseur'                       => ['nullable', 'string'],
            'image'                       => ['nullable'],
            'valide_de'                       => ['nullable', 'date'],
            'valide_a'                         => ['nullable', 'date'],
            'verified_at'                        => ['nullable', 'string'],
            'verified_by'                        => ['nullable', 'integer'],
            'commentaire'                           => ['nullable', 'integer'],
            'api_id'                           => ['required', 'integer'],
            'api_uuid'                       => ['required', 'string', 'min:3'],
        ]);
        $message = new TousLesMessage();
        if (isset($request->image)) {
            $message->sms_key = $data['sms_key'];
            $message->gratuit = true;
        } else {
            $message->gratuit = false;
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp . '-' . $file->getClientOriginalName();
            $imagePath = request('image')->storeAs('image_uploads', $name, 'public');
            $sms->image = $imagePath;
        }
        $message->nom = $data['nom'];
        $message->uuid = Str::uuid();
        $message->menu_id = $data['menu_id'];
        $message->menu_uuid = $data['menu_uuid'];
        $message->fournisseur = $data['fournisseur'];
        $message->methode = $data['methode'];
        $message->description = $data['description'];
        $message->url = $data['url'];
        $message->url_envoie = $data['url_envoie'];
        $message->save();
        $request->session()->flash('status', 'sms créé avec succès!!!');
        return redirect()->route('smss.show', $message->uuid);
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
