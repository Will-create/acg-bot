<?php

namespace App\Http\Controllers;

use App\Models\crimeConfiscation;
use App\Models\Crime;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CrimeConfiscationController extends Controller
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


        return view('pages.backoffice.confiscations.index',[
            'confiscations'                     => crimeConfiscation::with('crime')->orderBy('designation', 'asc')->get(),
            'titrePage' => "Liste de tous les produits confisqués"
        ]);
    }


    public function create($crime = null)
    {
        return view('pages.backoffice.confiscations.form',[
            'crime'                     => $crime,
            'titrePage' => "Ajout d'un nouveau produit confisqué"
            // 'crimes'                     => Crime::with('paysApprehension','service_investigateur')->orderBy('pays_apprehension', 'asc')->get()
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
            'designation'                    => ['required','string','max:255','min:3'],
            'description'                    => ['nullable','string','min:3'],
            'crime'                          => ['required'],
            'nombre'                         => ['nullable','integer'],
            'poids'                          => ['nullable','integer'],
          ]);
          $crime = Crime::where('uuid', $request->crime)->first();
          $confiscation= new crimeConfiscation;
          $confiscation->uuid=Str::uuid();
          $confiscation->designation=$data['designation'];
          $confiscation->crime_id =$crime->id;
          $confiscation->nombre =$data['nombre'];
          $confiscation->description =$data['description'];
          $confiscation->poids =$data['poids'];
          $confiscation->save();
          $request->session()->flash('confiscation', 'Confiscation ajoutée avec succès');
          $request->session()->flash('section', 'confiscation');
          return redirect()->route('crimes.show', $crime->uuid);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ville  $ville
     * @return \Illuminate\Http\Response
     */
    public function show(crimeConfiscation $confiscation)
    {   
        $titrePage = "Détails d'un produit confisqué";
        return view('pages.backoffice.confiscations.show', compact('confiscation','titrePage'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unite  $unite
     * @return \Illuminate\Http\Response
     */
    public function edit(crimeConfiscation $confiscation)
    {
        return view('pages.backoffice.confiscations.edit',[
            'crimes'                     => Crime::with('paysApprehension','service_investigateur')->orderBy('pays_apprehension', 'asc')->get(),
            'confiscation'               => $confiscation,
            'titrePage' => "Mise à  jours d'un produits confisqué : ".$confiscation->designation
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unite  $unite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, crimeConfiscation $confiscation)
    {
        $data=request()->validate([
            'designation'                    => ['required','string','max:255','min:3'],
            'description'                    => ['nullable','string','min:3'],
            'nombre'                         => ['nullable','integer'],
            'poids'                          => ['nullable','integer'],
            'condition'                      => ['required'],
          ]);
          $confiscation->designation=$request['designation'];
          $confiscation->nombre =$request['nombre'];
          $confiscation->description =$request['description'];
          $confiscation->poids =$request['poids'];
          $confiscation->condition =$request['condition'];
          $confiscation->save();
          $request->session()->flash('confiscation', 'Confiscation mise à jour avec succès');
          $request->session()->flash('section', 'confiscation');
          return redirect()->route('crimes.show', $confiscation->crime->uuid);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unite  $unite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, crimeConfiscation $confiscation)
    {
        $confiscation->delete();
        return redirect()->route('confiscations.index')->with('status','Confiscation supprimée avec succès');
    }
}