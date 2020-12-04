<?php

namespace App\Http\Controllers;

use App\Models\Localite;
use App\Models\Pay;
use App\Models\Restriction;
use App\Models\Unite;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LocaliteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $localites=Localite::orderBy('pays_id','asc')->get();
        return view('pages.backoffice.localites.index',compact('localites'));
    }
    public function create()
    {
        return view('pages.backoffice.localites.createdit', [
            'localite' => new Localite(),
            'pays' => Pay::orderBy('nom', 'asc')->get(),
            'titrePage' => "Ajout d'une nouvelle localité",
            'btnAction' => "Ajouter"
        ]);
    }
    public function store(Request $request)
    {
        $data=request()->validate([
            'nom'=> ['required','string','max:255','min:3'],
            'pays_id'=> ['required','integer'],
          ]);
          $localite= new Localite();
          $localite->nom=$data['nom'];
          $localite->pays_id =$data['pays_id'];
          $localite->uuid=Str::uuid();
          $localite->save();
          $request->session()->flash('status', 'La localité '.$localite->nom.' est ajoutée avec succès !');
          return redirect()->route('localites.show',$localite->uuid);
    }
    
    public function show(Localite $localite)
    {
        return view('pages.backoffice.localites.show',[
            'localite'   => $localite,
            'unites'   =>Unite::where('localite_id',$localite->id)->get(),
            
        ]);
    }

    public function filter()
    {  
        $p = 1;
        $pay=Pay::where('id',$p )->first();
        return view('pages.backoffice.localites.filter', [
            'localites'                    =>Localite::where('pays_id',$pay->id)->get(),
            'pays'                         =>Pay::all(),
            'pay'                          =>$pay
        ]);
    }

    public function filtreur($p)
    {  
        $pay=Pay::where('id',$p )->first();
      
        return response()->json([
            'localites'                    =>Localite::where('pays_id',$pay->id)->with('pay')->get(),
            'pays'                         =>Pay::all(),
            'pay'                          =>$pay
        ]);
    }

    public function edit(Localite $localite)
    {
        return view('pages.backoffice.localites.createdit', [
            'localite'      =>$localite,
            'pays'      =>Pay::orderBy('nom', 'asc')->get(),
            'titrePage' => "Mise à jour ".$localite->nom,
            'btnAction' => "Mettre à jour"
        ]);
    }
    
 
    public function update(Request $request, Localite $localite)
    {
        $data=request()->validate([
            'nom'=> ['required','string','max:255','min:3'],
            'pays_id'=> ['required','integer'],
          ]);
          $localite->nom=$data['nom'];
          $localite->pays_id =$data['pays_id'];
          $localite->uuid=Str::uuid();
          $localite->save();
         $request->session()->flash('status', 'La localité '.$localite->nom.' est mise à jours avec succès !');
          return redirect()->route('localites.show', $localite->uuid);
    }
    public function destroy(Request $request, Localite $localite)
    {
        $restriction = new Restriction();
        $restrictions = $restriction->check($localite->id,[
            ['foreignkey'=>'localite_id','modelname'=>'unite'],            ]);
           if ($restrictions){
            return redirect()->back()->with('danger',$restrictions['message']);
           }else{
            $localite->delete();
            return redirect()->route('localites.index')->with('status','Localité supprimée avec succès');
           }
    }
    public function ville_by_country($pay_id) {
        $villes =  Localite::where('pays_id', $pay_id)->get();
         return response()->json($villes);
    }
}
