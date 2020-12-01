<?php

namespace App\Http\Controllers;


use App\Models\Unite;
use App\Models\TypeCrime;
use App\Models\Restriction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TypeCrimeController extends Controller
{
    public function index()
    {
        $types=TypeCrime::orderBy('nom','asc')->get();
        return view('pages.backoffice.type_crimes.index',compact('types'));
    }

    public function create()
    {
        return view('pages.backoffice.type_crimes.createdit', [
            'type' => new TypeCrime(),
            'titrePage' => "Ajouter un nouveau type de crime",
            'btnAction' => "Ajouter" 
        ]);
    }

    public function store(Request $request)
    {
        $data=request()->validate([
            'nom'=> ['required','string','max:255','min:3','unique:type_crimes'],
            'description'=> ['required','string','max:500','min:3'],
          ]);
          $type= new TypeCrime();
          $type->nom=$data['nom'];
          $type->description=$data['description'];
          $type->uuid=Str::uuid();
          $type->save();
          $request->session()->flash('status', 'Le type de crime '.$type->nom.' ajouté avec succès !');
          return redirect()->route('type_crimes.index');
    }
    public function show($uuid)
    {
        return view('pages.backoffice.type_crimes.show',[
            'type'   => TypeCrime::where('uuid',$uuid)->first(),
            'unites' =>Unite::where('type_unite_id',TypeCrime::where('uuid',$uuid)->first()->id)->get()
        ]);
    }

    public function edit($uuid)
    {
        return view('pages.backoffice.type_crimes.createdit', [
            'type'      => TypeCrime::where('uuid',$uuid)->first(),
            'titrePage' => "Mise à jour ".TypeCrime::where('uuid',$uuid)->first()->nom,
            'btnAction' => "Mettre à jour"
        ]);
    }
    
    public function update(Request $request, $uuid)
    {
        $data=request()->validate([
            'nom'=> ['required','string','max:255','min:3'],
            'description'=> ['required','string','max:500','min:3'],
        ]);
        $type=TypeCrime::where('uuid',$uuid)->first();
        $type->nom=$data['nom'];
        $type->description=$data['description'];
        $type->uuid=Str::uuid();
        $type->save();
        $request->session()->flash('status', 'Type de d\'unité mis a jours avec succès');
        return redirect()->route('type_crimes.show', $type);
    }

    public function destroy(Request $request,$uuid)
    {
        $type=TypeCrime::where('uuid',$uuid)->first();
        $restriction = new Restriction;
        $restrictions = $restriction->check($type->id,[
            ['foreignkey'=>'type_unite_id','modelname'=>'crime'],
        ]);
        if ($restrictions){
        return redirect()->back()->with('danger',$restrictions['message']);
        } else {
            $type->delete();
            return redirect()->route('type_crimes.index')->with('status','Type de crime supprimée avec succès');
        }
   }
}
