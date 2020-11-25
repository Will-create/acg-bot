<?php

namespace App\Http\Controllers;


use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TypeCrime;

class TypeCrimeController extends Controller
{
    public function index()
    {
        $types=TypeCrime::orderBy('nom','asc')->get();
        return view('pages.backoffice.type_crimes.index',compact('types'));
    }


    public function create()
    {

        return view('pages.backoffice.type_crimes.form');
    }

    
    public function store(Request $request)
    {
        $data=request()->validate([
            'nom'=> ['required','string','max:255','min:3'],
          ]);
          $type= new TypeCrime;
          $type->nom=$data['nom'];
          $type->uuid=Str::uuid();
          $type->save();
          $request->session()->flash('status', 'Types de Crime ajouté avec succès');
          return redirect()->route('type_crimes.index');
    }


    public function show($uuid)
    {
        $type=TypeCrime::where('uuid',$uuid)->first();

        return view('pages.backoffice.type_crimes.show', compact('type'));
    }

    
    public function edit($uuid)
    {
        $type=TypeCrime::where('uuid',$uuid)->first();
        return view('pages.backoffice.type_crimes.edit',compact('type'));
    }

    
    public function update(Request $request, $uuid)
    {

        $data=request()->validate([
            'nom'=> ['required','string','max:255','min:3'],
          ]);


          $type=TypeCrime::where('uuid',$uuid)->first();
          $type->nom=$data['nom'];
          $type->uuid=Str::uuid();
          $type->save();
          $request->session()->flash('status', 'Type de crime mis a jours avec succès');
          return redirect()->route('type_crimes.index');
    }


    

    public function destroy(Request $request,$uuid)
    {
        $type=TypeCrime::where('uuid',$uuid)->first();
        $type->delete();

        return redirect()->route('type_crimes.index')->with('status','Type de Crime supprimée avec succès');
    }
}
