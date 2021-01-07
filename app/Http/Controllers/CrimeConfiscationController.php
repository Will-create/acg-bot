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
            'confiscations'                     => crimeConfiscation::with('crime')->orderBy('designation', 'asc')->get()
        ]);
    }


    public function create($crime = null)
    {

        return view('pages.backoffice.confiscations.form',[
            'crime'                     => $crime
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
            'description'                    => ['required','string','min:3'],
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
          $request->session()->flash('status', 'Confiscation ajoutée avec succès');
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
        return view('pages.backoffice.confiscations.show', compact('confiscation'));
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
            'confiscation'               => $confiscation
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
            'description'                    => ['required','string','min:3'],
            'crime_id'                       => ['required','integer'],
            'nombre'                         => ['required','integer'],
            'poids'                          => ['required','integer'],



          ]);



          $confiscation->designation=$data['designation'];
          $confiscation->crime_id =$data['crime_id'];
          $confiscation->nombre =$data['nombre'];
          $confiscation->description =$data['description'];
          $confiscation->poids =$data['poids'];
          $confiscation->save();
         $request->session()->flash('status','Confiscation  modifiée avec succès!');
          return redirect()->route('confiscations.index');
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
