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

        return view('pages.backoffice.especes.index',compact('especes'));
    }
    public function create()
    {
        return view('pages.backoffice.especes.createdit', [
            'espece'                      =>  new Espece(),            
            'ordres'                      =>  Ordre::all(),
            'titrePage'                   => "Ajouter une nouvelle espèce",
            'btnAction'                   => "Ajouter"
        ]);
    }
    public function store(Request $request)
    {   
        $data=request()->validate([
            'nom'=> ['required','string','max:255','min:3','unique:especes'],
            'famille'=> ['required','string','max:255','min:3'],
            'type'=> ['required','string','max:255'],
            'ordre_id'=> ['required','integer'],
            'nom_scientifique'=> ['required','string','max:255','min:3'],
            'photo'=> ['image'],
          ]);
            $espece= new Espece;
          if($request->hasFile('photo')){
            $file = $request->file('photo');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();
            $photoPath=request('photo')->storeAs('especes_uploads',$name,'public');
            $espece->photo = $photoPath;
        }
          $espece->nom=$data['nom'];
          $espece->famille=$data['famille'];
          $espece->type=$data['type'];
          $espece->ordre_id=$data['ordre_id'];
          $espece->nom_scientifique=$data['nom_scientifique'];
          $espece->uuid=Str::uuid();
          $espece->save();
          $request->session()->flash('status', 'Espèce ajoutée avec succès');
          return redirect()->route('especes.index');
    }
    public function show($uuid)
    {
        return view('pages.backoffice.especes.show',[
            'espece'   => Espece::where('uuid',$uuid)->first(),
            'crimes' => Crime::where('espece_id',Espece::where('uuid',$uuid)->first()->id )->get()
        ]);
    }
    public function edit($uuid)
    {
            return view('pages.backoffice.especes.createdit', [
                'espece'            =>  Espece::where('uuid',$uuid)->first(),            
                'ordres'            =>  Ordre::all(),
                'titrePage'         => "Mise a jours de ".Espece::where('uuid',$uuid)->first()->nom,
                'btnAction'         => "Mettre a jours"
            ]);
    }
    public function update(Request $request, $uuid)
    {
        $data=request()->validate([
            'nom'=> ['required','string','max:255','min:3'],
            'famille'=> ['required','string','max:255','min:3'],
            'type'=> ['required','string','max:255'],
            'ordre_id'=> ['required','integer'],
            'nom_scientifique'=> ['required','string','max:255','min:3'],
            'photo'=> ['image'],
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
          $espece->type=$data['type'];
          $espece->ordre_id=$data['ordre_id'];
          $espece->nom_scientifique=$data['nom_scientifique'];
          $espece->uuid=Str::uuid();
          $espece->save();
          $request->session()->flash('status', 'Espèce mise a jours avec succès');
          return redirect()->route('especes.index');
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
