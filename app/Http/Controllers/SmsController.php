<?php

namespace App\Http\Controllers;

use App\Models\Api;
use App\Models\Sms;
use App\Models\Menu;
use App\Models\Restriction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SmsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $sms = Sms::all()->orderBy('created_at', 'desc')->get();
        $titrePage = "Liste de tous les sms";
        $mot = 'contenu_entree';
        $mots = strlen('le nombre de caractère', $mot);
        return view('pages.backoffice.apis.index', compact('sms', 'titrePage'), $mots);
    }
    public function create($apiuuid)
    {
        return view('pages.backoffice.sms.createdit', [
            'sms' => new Sms(),
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
        $sms = new Sms();
        if (isset($request->image)) {
            $sms->sms_key = $data['sms_key'];
            $sms->gratuit = true;
        } else {
            $sms->gratuit = false;
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp . '-' . $file->getClientOriginalName();
            $imagePath = request('image')->storeAs('image_uploads', $name, 'public');
            $sms->image = $imagePath;
        }
        $sms->nom = $data['nom'];
        $sms->uuid = Str::uuid();
        $sms->menu_id = $data['menu_id'];
        $sms->menu_uuid = $data['menu_uuid'];
        $sms->fournisseur = $data['fournisseur'];
        $sms->methode = $data['methode'];
        $sms->description = $data['description'];
        $sms->url = $data['url'];
        $sms->url_envoie = $data['url_envoie'];
        $sms->save();
        $request->session()->flash('status', 'sms créé avec succès!!!');
        return redirect()->route('smss.show', $sms->uuid);
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


    public function update(Request $request, Api $api)
    {
        $data = request()->validate([
            'contenu_sortie'                           =>  ['nullable', 'string', 'min:3'],
            'valide_de'                       => ['nullable', 'date'],
            'valide_a'                         => ['nullable', 'date'],
            'commentaire'                           => ['nullable', 'integer'],
        ]);
        $api->contenu_sortie = $data['contenu_sortie'];
        $api->valide_de = $data['valide_de'];
        $api->valide_a = $data['valide_de'];
        $api->valide = $data['valide'];
        $api->envoye = $data['envoye'];
        $api->menu_uuid = $data['menu_uuid'];
        $api->fournisseur = $data['fournisseur'];
        $api->methode = $data['methode'];
        $api->description = $data['description'];
        $api->url = $data['url'];
        $api->url_envoie = $data['url_envoie'];
        $api->save();
        $request->session()->flash('status', 'Informations de l\'api mises à jours avec succès!!!');
        return redirect()->route('apis.show', $api->uuid);
    }
    public function destroy(Request $request, Api $api)
    {
        $restriction = new Restriction;
        $restrictions = $restriction->check($api->id,[
            ['foreignkey'=>'api_id','modelname'=>'sms'],            ]);
           if ($restrictions){
            return redirect()->back()->with('danger',$restrictions['message']);
           }else{
            //supprimer maintenant
            $api->delete();
            return redirect()->route('apis.index')->with('status', 'Api supprimée avec succès');
        }
    }

}
