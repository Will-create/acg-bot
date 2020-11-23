<?php

namespace App\Http\Controllers;

use App\Models\Espece;
use App\Models\Ordre;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class EspeceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especes=Espece::orderBy('nom','asc')->get();

        return view('pages.backoffice.especes.index',compact('especes'));
    }


    public function create()
    {
        
        return view('pages.backoffice.especes.form',[
            'ordres' =>Ordre::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   


      
        $data=request()->validate([
            'nom'=> ['required','string','max:255','min:3'],
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
        $espece=Espece::where('uuid',$uuid)->first();

        return view('pages.backoffice.especes.show', compact('espece'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Espece  $unite
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {

        $espece=Espece::where('uuid',$uuid)->first();


        return view('pages.backoffice.especes.edit', [
            'ordres' =>Ordre::all(),
            'espece'=>Espece::where('uuid',$uuid)->first()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Espece  $unite
     * @return \Illuminate\Http\Response
     */
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


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Espece  $unite
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request,$uuid)
    {
        $espece=Espece::where('uuid',$uuid)->first();
        $espece->delete();

        return redirect()->route('especes.index')->with('status','Espece supprimée avec succès');
    }
}
