<?php

namespace App\Http\Controllers;

use App\Models\Unite;
use App\Models\Pay;
use App\Models\Localite;
use App\Models\User;
use App\Models\TypeUnite;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
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

        return view('pages.backoffice.type_unites.form');
    }

    
    public function store(Request $request)
    {
        $data=request()->validate([
            'nom'=> ['required','string','max:255','min:3'],
            'description'=> ['required','string','max:255','min:3'],
          ]);
          $type= new TypeUnite;
          $type->nom=$data['nom'];
          $type->description=$data['description'];
          $type->uuid=Str::uuid();
          $type->save();
          $request->session()->flash('status', 'Types de d\'unité ajouté avec succès');
          return redirect()->route('type_unites.index');
    }


    public function show($uuid)
    {
        
        

        return view('pages.backoffice.type_unites.show',[
            'type'   =>$type=TypeUnite::where('uuid',$uuid)->first(),
            'unites' =>Unite::where('type_unite_id',$type->id)->get()
        ]);
    }

    
    public function edit($uuid)
    {
        $type=TypeUnite::where('uuid',$uuid)->first();
        return view('pages.backoffice.type_unites.edit',compact('type'));
    }

    
    public function update(Request $request, $uuid)
    {

        $data=request()->validate([
            'nom'=> ['required','string','max:255','min:3'],
            'description'=> ['required','string','max:255','min:3'],
          ]);


          $type=TypeUnite::where('uuid',$uuid)->first();
          $type->nom=$data['nom'];
          $type->description=$data['description'];
          $type->uuid=Str::uuid();
          $type->save();
          $request->session()->flash('status', 'Type de d\'unité mis a jours avec succès');
          return redirect()->route('type_unites.index');
    }


    

    public function destroy(Request $request,$uuid)
    {
        $type=TypeUnite::where('uuid',$uuid)->first();
        $type->delete();

        return redirect()->route('type_unites.index')->with('status','Type d\'unité supprimée avec succès');
    }
}
