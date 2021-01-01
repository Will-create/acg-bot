<?php

namespace App\Http\Controllers;

use App\Models\Arme;
use App\Models\Crime;
use App\Models\Restriction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ArmeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
       
        return view('pages.backoffice.armes.index', [
            'armes'                        => Arme::with(['crime'])->orderBy('libelle', 'asc')->get(),
        ]);
    }
   

    
    public function create()
    {
        return view('pages.backoffice.armes.createdit', [
            'arme' => new Arme(),
            'crimes' => Crime::with('armes')->get(),
            'titrePage' => "Ajout d'une nouvelle arme de crime",
            'btnAction' => "Ajouter"
        ]);
    }
    public function store(Request $request)
    {
        $data = request()->validate([
            'libelle' => ['required', 'string', 'max:255', 'min:3', 'unique:aire_protegees'],
            'reference' => ['required', 'string', 'max:255', 'min:3'],
            'remarques' => ['required', 'string', 'max:255', 'min:3'],
            'crime_id' => ['required','integer'],
        ]);
        $arme = new Arme();
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp . '-' . $file->getClientOriginalName();
            $photoPath = request('photo')->storeAs('photo_uploads', $name, 'public');
            $arme->photo = $photoPath;
        }
        
        $arme->libelle = $data['libelle'];
        $arme->reference = $data['reference'];
        $arme->remarques = $data['remarques'];
        $arme->crime_id = $data['crime_id'];
        $arme->uuid = Str::uuid();
        $arme->save();
        $request->session()->flash('status', 'Arme ajoutée avec succès!!!');
        return redirect()->route('armes.show', $arme->uuid);
    }
    public function show($uuid)
    {
        $arme = Arme::where('uuid', $uuid)->with('crime')->first();
        $autres = Arme::where('crime_id', $arme->crime->id)->with('crime')->get();
       
        return view('pages.backoffice.armes.show', compact('arme','autres'));
    }
    public function edit($uuid)
    {
       
            return view('pages.backoffice.armes.createdit', [
            'arme' => Arme::where('uuid', $uuid)->first(),
            'crimes' => Crime::with('armes')->get(),
            'titrePage' => "Mise a jour d'une nouvelle arme de crime",
            'btnAction' => "Mettre a jour"
        ]);
    }


    public function update(Request $request, $uuid)
    {    

        $arme = Arme::where('uuid', $uuid)->first();
        $data = request()->validate([
            'libelle' => ['required', 'string', 'max:255', 'min:3'],
            'tel' => ['required', 'string', 'max:255', 'min:3'],
            'code_wdpa_aire' => ['string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255', 'min:3'],
            'map' => ['required', 'string', 'min:8'],
            'photo' => ['image'],
            'image_couverture' => ['image'],
            'pays_id' => ['required', 'integer'],
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp . '-' . $file->getClientOriginalName();
            $photoPath = request('photo')->storeAs('photo_uploads', $name, 'public');
            $arme->photo = $photoPath;
        }
        if ($request->hasFile('image_couverture')) {
            $file = $request->file('image_couverture');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp . '-' . $file->getClientOriginalName();
            $photoPath = request('image_couverture')->storeAs('photo_uploads', $name, 'public');
            $arme->image_couverture = $photoPath;
        }
        $arme->libelle = $data['libelle'];
        $arme->tel = $data['tel'];
        $arme->code_wdpa_aire = $data['code_wdpa_aire'];
        $arme->adresse = $data['adresse'];
        $arme->map = $data['map'];
        $arme->pays_id = $data['pays_id'];
        $arme->uuid = Str::uuid();
        $arme->save();
        $request->session()->flash('status', 'Aire protégée mis a jours avec succès!!!');
        return redirect()->route('armes.show', $arme->uuid);
    }
    public function destroy(Request $request, $uuid)
    {   
        $restriction = new Restriction;
        $arme = Arme::where('uuid', $uuid)->first();
        $restrictions = $restriction->check($arme->id, [
            ['foreignkey' => 'aire_protegee_id', 'modelname' => 'crime'],
        ]);
        if ($restrictions) {
            return redirect()->back()->with('danger', $restrictions['message']);
        } else {
            $arme->delete();
        return redirect()->route('armes.index')->with('status', 'Aire protégée supprimée avec succès');
        }
    }
}

