<?php

namespace App\Http\Controllers;

use App\Models\Pay;
use App\Models\Localite;
use App\Models\Restriction;
use Illuminate\Support\Str;
use App\Models\AireProtegee;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AireProtegeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        return view('pages.backoffice.aire_protegees.index', [
            'aires'                        => AireProtegee::with(['pays'])->orderBy('libelle', 'asc')->get(),
            'titrePage' => "Liste de aires protégées",
        ]);
    }
    public function filter()
    {
        $p = 1;
        $pay = Pay::where('id', $p)->first();
        return view('pages.backoffice.aire_protegees.filter', [
            'aires'                        => AireProtegee::where('pays_id', $pay->id)->with(['pays'])->orderBy('libelle', 'asc')->get(),
            'pays'                         => Pay::orderBy('nom', 'asc')->get(),
            'pay'                          => $pay,
            'titrePage' => "Liste de aires protégées par pays"

        ]);
    }

    public function filtreur($p)
    {
        $pay = Pay::where('id', $p)->first();

        return response()->json([
            'aires'                        => AireProtegee::where('pays_id', $pay->id)->with('pays')->orderBy('libelle', 'asc')->get(),
            'pays'                         => Pay::orderBy('nom', 'asc')->get(),
            'pay'                          => $pay,
            'titrePage' => "Liste de aires protégées par pays"
        ]);
    }
    public function create()
    {
        return view('pages.backoffice.aire_protegees.createdit', [
            'aire' => new AireProtegee(),
            'localites' => Localite::with('pay')->orderBy('pays_id', 'asc')->get(),
            'pays' => Pay::orderBy('nom', 'asc')->get(),
            'titrePage' => "Ajout d'une nouvelle aire protegée",
            'btnAction' => "Ajouter"
        ]);
    }
    public function store(Request $request)
    {
        $data = request()->validate([
            'libelle' => ['required', 'string', 'max:255', 'min:3', 'unique:aire_protegees'],
            'tel' => ['required', 'string', 'max:255', 'min:3'],
            'code_wdpa_aire' => ['string', 'max:255', 'min:3'],
            'adresse' => ['required', 'string', 'max:255', 'min:3'],
            'nom_responsable' => ['required', 'string', 'max:255', 'min:3'],
            'prenom_responsable' => ['required', 'string', 'max:255', 'min:3'],
            'map' => ['required', 'string', 'min:8'],
            'logo' => ['nullable'],
            'image_couverture' => ['nullable'],
            'pays_id' => ['required', 'integer'],
        ]);
        $aire = new AireProtegee();
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp . '-' . $file->getClientOriginalName();
            $logoPath = request('logo')->storeAs('logo_uploads', $name, 'public');
            $aire->logo = $logoPath;
        }
        if ($request->hasFile('image_couverture')) {
            $file = $request->file('image_couverture');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp . '-' . $file->getClientOriginalName();
            $photoPath = request('image_couverture')->storeAs('photo_uploads', $name, 'public');
            $aire->image_couverture = $photoPath;
        }
        $aire->libelle = $data['libelle'];
        $aire->tel = $data['tel'];
        $aire->code_wdpa_aire = $data['code_wdpa_aire'];
        $aire->adresse = $data['adresse'];
        $aire->nom_responsable = $data['nom_responsable'];
        $aire->prenom_responsable=$data['prenom_responsable'];
        $aire->map = $data['map'];
        $aire->pays_id = $data['pays_id'];
        $aire->uuid = Str::uuid();
        $aire->save();
        $request->session()->flash('status', 'Aire protégée avec succès!!!');
        return redirect()->route('aire_protegees.show', $aire->uuid);
    }
    public function show($uuid)
    {
        $aire = AireProtegee::where('uuid', $uuid)->with('pays')->first();
        $carte = $aire->map;
        $titrePage ="Details d'une aire protégées : ".$aire->libelle;
        return view('pages.backoffice.aire_protegees.show', compact('aire', 'carte','titrePage'));
    }
    public function edit($uuid)
    {
        return view('pages.backoffice.aire_protegees.createdit', [
            'aire' => AireProtegee::where('uuid', $uuid)->first(),
            'pays' => Pay::orderBy('nom', 'asc')->get(),
            'titrePage' => "Mise a jours d'une aire protegée",
            'btnAction' => "Mettre a jours"
        ]);
    }


    public function update(Request $request, $uuid)
    {

        $aire = AireProtegee::where('uuid', $uuid)->first();
        $data = request()->validate([
            'libelle' => ['required', 'string', 'max:255', 'min:3'],
            'tel' => ['required', 'string', 'max:255', 'min:3'],
            'code_wdpa_aire' => ['string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255', 'min:3'],
            'nom_responsable' => ['required', 'string', 'max:255', 'min:3'],
            'prenom_responsable' => ['required', 'string', 'max:255', 'min:3'],
            'map' => ['required', 'string', 'min:8'],
            'logo' => ['nullable'],
            'image_couverture' => ['nullable'],
            'pays_id' => ['required', 'integer'],
        ]);
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp . '-' . $file->getClientOriginalName();
            $logoPath = request('logo')->storeAs('logo_uploads', $name, 'public');
            $aire->logo = $logoPath;
        }
        if ($request->hasFile('image_couverture')) {
            $file = $request->file('image_couverture');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp . '-' . $file->getClientOriginalName();
            $photoPath = request('image_couverture')->storeAs('photo_uploads', $name, 'public');
            $aire->image_couverture = $photoPath;
        }
        $aire->libelle = $data['libelle'];
        $aire->tel = $data['tel'];
        $aire->code_wdpa_aire = $data['code_wdpa_aire'];
        $aire->adresse = $data['adresse'];
        $aire->nom_responsable = $data['nom_responsable'];
        $aire->prenom_responsable=$data['prenom_responsable'];
        $aire->map = $data['map'];
        $aire->pays_id = $data['pays_id'];
        $aire->uuid = Str::uuid();
        $aire->save();
        $request->session()->flash('status', 'Aire protégée mis a jours avec succès!!!');
        return redirect()->route('aire_protegees.show', $aire->uuid);
    }
    public function destroy(Request $request, $uuid)
    {
        $restriction = new Restriction;
        $aire = AireProtegee::where('uuid', $uuid)->first();
        $restrictions = $restriction->check($aire->id, [
            ['foreignkey' => 'aire_protegee_id', 'modelname' => 'crime'],
        ]);
        if ($restrictions) {
            return redirect()->back()->with('danger', $restrictions['message']);
        } else {
            $aire->delete();
        return redirect()->route('aire_protegees.index')->with('status', 'Aire protégée supprimée avec succès');
        }
    }
}
