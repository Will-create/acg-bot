<?php

namespace App\Http\Controllers;

use App\Models\Crime;
use App\Models\Ordre;
use App\Models\Espece;
use App\Models\Restriction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EspeceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $especes=Espece::orderBy('nom','asc')->get();
        $titre = 'Liste de toutes les espèces';
        $titrePage = 'Liste de toutes les espèces';
        $subtitle = 'Espèces';
        $regne = null;
        return view('pages.backoffice.especes.index',compact('especes', 'titre', 'subtitle', 'regne','titrePage'));
    }
    public function regne($regne)
    {
        $especes=Espece::where('regne', $regne)->orderBy('nom','asc')->get();
        switch ($regne) {
            case 'animal':
                $regne= 'animal';
                $subtitle = ' Espèces animales';
                break;
            case 'vegetal':
                $regne= 'végétal';
                $subtitle = ' Espèces végétales';

                break;
            default:
              abort(404);
                break;
        }
        $titre = 'Liste des espèses '. $regne.'s';

        return view('pages.backoffice.especes.index',compact('especes', 'titre', 'subtitle','regne'));
    }
    public function create($regne = null)
    {
        return view('pages.backoffice.especes.createdit', [
            'espece'                      =>  new Espece(),
            'ordres'                      =>  Ordre::all(),
            'titrePage'                   => "Ajouter une espèce",
            'btnAction'                   => "Enregistrer",
            'regne'                       => $regne
        ]);
    }
    public function store(Request $request)
    {
        $data=request()->validate([
            'nom'=> ['required','string','max:255','min:3','unique:especes'],
            'famille'=> ['required','string','max:255','min:3'],
            'regne'=> ['required','string','max:255'],
            'ordre_id'=> ['required','integer'],
            'nom_scientifique'=> ['required','string','max:255','min:3'],
            'photo'=> ['required'],
          ]);
            $espece= new Espece;
          if($request->hasFile('photo')){
            $file = $request->file('photo');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();
            $photoPath=request('photo')->storeAs('images',$name,'public');
            $espece->photo = $photoPath;
        }
          $espece->nom=$data['nom'];
          $espece->famille=$data['famille'];
          $espece->regne=$data['regne'];
          $espece->ordre_id=$data['ordre_id'];
          $espece->nom_scientifique=$data['nom_scientifique'];
          $espece->uuid=Str::uuid();
          $espece->save();
          $request->session()->flash('status', 'Espèce ajoutée avec succès');
          return redirect()->route('especes.show', $espece->uuid);
    }
    public function show($uuid)
    {
        $titrePage = "Détails d'un type de règlement de crime";

        return view('pages.backoffice.especes.show',[
            'espece'   => Espece::where('uuid',$uuid)->first(),
            'crimes' => Crime::where('espece_id',Espece::where('uuid',$uuid)->first()->id )->get(),
            'titrePage'                   => $titrePage,

        ]);
    }
    public function edit($uuid)
    {
            return view('pages.backoffice.especes.createdit', [
                'espece'            =>Espece::where('uuid',$uuid)->first(),
                'ordres'            =>  Ordre::all(),
                'titrePage'         => "Mise a jours de ".Espece::where('uuid',$uuid)->first()->nom,
                'btnAction'         => "Mettre a jour"
            ]);
    }
    public function update(Request $request, $uuid)
    {
        $data=request()->validate([
            'nom'=> ['required','string','max:255','min:3'],
            'famille'=> ['required','string','max:255','min:3'],
            'regne'=> ['required','string','max:255'],
            'ordre_id'=> ['required','integer'],
            'nom_scientifique'=> ['required','string','max:255','min:3'],
          ]);
          $espece=Espece::where('uuid',$uuid)->first();
          if($request->hasFile('photo')){
            $file = $request->file('photo');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();
            $photoPath=request('photo')->storeAs('espece_uploads',$name,'public');
            $espece->photo = $photoPath;
        }
          $espece->nom=$data['nom'];
          $espece->famille=$data['famille'];
          $espece->regne=$data['regne'];
          $espece->ordre_id=$data['ordre_id'];
          $espece->nom_scientifique=$data['nom_scientifique'];
          $espece->uuid=Str::uuid();
           $espece->save();
          $request->session()->flash('status', 'Espèce mise a jours avec succès');
          return redirect()->route('especes.show', $espece->uuid);
    }
    public function destroy(Request $request,$uuid)
    {
        $espece=Espece::where('uuid',$uuid)->first();
        $restriction = new Restriction;
        $restrictions = $restriction->check($espece->id,[
            ['foreignkey'=>'espece_id','modelname'=>'crime'],
        ]);
        if ($restrictions){
        return redirect()->back()->with('danger',$restrictions['message']);
        } else {
            $espece->delete();
            return redirect()->route('especes.index') ->with('status','Espece supprimée avec succès');
        }
    }
}
