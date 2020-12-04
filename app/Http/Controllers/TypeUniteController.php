<?php

namespace App\Http\Controllers;

use App\Models\Unite;
use App\Models\Restriction;
use App\Models\TypeUnite;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class TypeUniteController extends Controller
{
    public function index()
    {
        $types=TypeUnite::orderBy('nom','asc')->get();
        return view('pages.backoffice.type_unites.index',compact('types'));
    }

    public function create()
    {
        return view('pages.backoffice.type_unites.createdit', [
            'type' => new TypeUnite(),
            'titrePage' => "Ajout d'un nouveau type d'unité",
            'btnAction' => "Ajouter"
        ]);
    }
    
    public function store(Request $request)
    {
        $data=request()->validate([
            'nom'=> ['required','string','max:255','min:3','unique:type_unites'],
            'description'=> ['required','string','max:500','min:3'],
          ]);
          $type= new TypeUnite();
          $type->nom=$data['nom'];
          $type->description=$data['description'];
          $type->uuid=Str::uuid();
          $type->save();
          $request->session()->flash('status', 'Le type d\'unité "'.$type->nom.'" ajouté avec succès !');
          return redirect()->route('type_unites.show',$type->uuid);
    }
    public function show($uuid)
    {
        return view('pages.backoffice.type_unites.show',[
            'type'   => TypeUnite::where('uuid',$uuid)->first(),
            'unites' =>Unite::where('type_unite_id',TypeUnite::where('uuid',$uuid)->first()->id)->get()
        ]);
    }

    public function edit($uuid)
    {
        return view('pages.backoffice.type_unites.createdit', [
            'type'      => TypeUnite::where('uuid',$uuid)->first(),
            'titrePage' => "Mise à jour ".TypeUnite::where('uuid',$uuid)->first()->nom,
            'btnAction' => "Mettre à jour"
        ]);
    }
    
    public function update(Request $request, $uuid)
    {
        $data=request()->validate([
            'nom'=> ['required','string','max:255','min:3'],
            'description'=> ['required','string','max:500','min:3'],
        ]);
        $type=TypeUnite::where('uuid',$uuid)->first();
        $type->nom=$data['nom'];
        $type->description=$data['description'];
        $type->uuid=Str::uuid();
        $type->save();
        $request->session()->flash('status', 'Type d\'unité mis à jours avec succès');
        return redirect()->route('type_unites.show', $type->uuid);
    }

    public function destroy(Request $request,$uuid)
    {
        $type=TypeUnite::where('uuid',$uuid)->first();
        $restriction = new Restriction;
        $restrictions = $restriction->check($type->id,[
            ['foreignkey'=>'type_unite_id','modelname'=>'unite'],
        ]);
        if ($restrictions){
        return redirect()->back()->with('danger',$restrictions['message']);
        } else {
            $type->delete();
            return redirect()->route('type_unites.index')->with('status','Type d\'unité supprimée avec succès');
        }
   }
}