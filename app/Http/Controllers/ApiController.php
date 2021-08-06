<?php

namespace App\Http\Controllers;

use App\Models\Api;
use App\Models\Sms;
use App\Models\Menu;
use App\Models\Commentaire;
use App\Models\Restriction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{

    public function index()
    {
        $apis = Api::orderBy('nom', 'asc')->get();
        $titrePage = "Liste de toutes les apis";


                switch (Auth::user()->role->designation) {
                    case 'Administrateur Général':
                        return view('pages.backoffice.apis.dash', compact('apis', 'titrePage'));
                    break;

                    default:
                        return view('pages.backoffice.apis.dash', compact('apis', 'titrePage'));
                        break;
                }
    }
  /*  public function sms()
    {
        $sms = Sms::orderBy('id', 'asc')->get();
        return response()->json($sms);
    }*/
    public function create()
    {
        return view('pages.backoffice.apis.createdit', [
            'api' => new Api(),
            'menus' => Menu::where('type_menu_id', 1)->orderBy('nom', 'asc')->get(),
            'titrePage' => "Ajout d'une nouvelle Api",
            'btnAction' => "Ajouter"
        ]);
    }
    public function store(Request $request)
    {
        $data = request()->validate([
            'nom'                               => ['required', 'string', 'max:255', 'min:3'],
            'menu_id'                           => ['required', 'integer'],
            'fournisseur'                       => ['nullable', 'string'],
            'menu_uuid'                         => ['nullable', 'string'],
            'url'                               => ['required', 'string'],
            'api_key'                           => ['nullable', 'string'],
            'description'                       => ['required', 'string', 'min:3'],
        ]);
        $api = new Api();
        if (isset($request->api_key)) {
            $api->api_key = $data['api_key'];
            $api->gratuit = true;
        } else {
            $api->gratuit = false;
        }
        $api->nom = $data['nom'];
        $api->uuid = Str::uuid();
        $api->menu_id = $data['menu_id'];
        $api->fournisseur = $data['fournisseur'];
        $api->description = $data['description'];
        $api->url = $data['url'];
        $api->save();
        $request->session()->flash('status', 'api créé avec succès!!!');
        return redirect()->route('apis.show', $api->uuid);
    }
    public function show($uuid)
    {
        $api = Api::where('uuid', $uuid)->with('menu')->first();

        $titrePage = "Détails d'une api";
        return view('pages.backoffice.apis.show', compact('api', 'titrePage'));
    }
    public function edit(Api $api)
    {
        return view('pages.backoffice.apis.createdit', [
            'api' => $api,
            'menus' => Menu::where('type_menu_id', null)->orderBy('nom', 'asc')->get(),
            'titrePage' => "Mise à jours d'une Api",
            'btnAction' => "Mettre à jour"
        ]);
    }


    public function update(Request $request, Api $api)
    {
        $data = request()->validate([
            'nom'                               => ['required', 'string', 'max:255', 'min:3'],
            'menu_id'                           => ['required', 'integer'],
            'fournisseur'                       => ['nullable', 'string'],
            'url'                               => ['required', 'string'],
            'api_key'                           => ['nullable', 'string'],
            'description'                       => ['required', 'string', 'min:3'],
        ]);
        if (isset($request->api_key)) {
            $api->api_key = $data['api_key'];
            $api->gratuit = true;
        } else {
            $api->gratuit = false;
        }
        $api->nom = $data['nom'];
        $api->uuid = Str::uuid();
        $api->menu_id = $data['menu_id'];
        $api->fournisseur = $data['fournisseur'];
        $api->description = $data['description'];
        $api->url = $data['url'];
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
