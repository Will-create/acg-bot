<?php

namespace App\Http\Controllers;

use App\Models\Crime;
use App\Models\crimeTypeReglement;
use App\Models\DecisionJustice;
use App\Models\ModeReglement;
use Illuminate\Http\Request;

class CrimeTypeReglementController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($crime = null)
    {
        $titrePage = "Ajout d'un nouveau type de crime";

        return view('pages.backoffice.regelements.create',
        [
            'crime'   => Crime::where('uuid', $crime)->first(),
            'modeReglements'  => ModeReglement::all(),
            'suites'  => DecisionJustice::all(),
            'titrePage'             => $titrePage,

        ]
    );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\crimeTypeReglement  $crimeTypeReglement
     * @return \Illuminate\Http\Response
     */
    public function show(crimeTypeReglement $crimeTypeReglement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\crimeTypeReglement  $crimeTypeReglement
     * @return \Illuminate\Http\Response
     */
    public function edit($crimeTypeReglement)
    {
        $titrePage = "Mise à jours nouveau type de règlement";
        
        return view('pages.backoffice.regelements.edit', [
            'crimeTypeReglement'        => crimeTypeReglement::where('id', $crimeTypeReglement)->first(),
            'modeReglements'  => ModeReglement::all(),
            'suites'  => DecisionJustice::all(),
            'titrePage'             => $titrePage,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\crimeTypeReglement  $crimeTypeReglement
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, $crimeTypeReglement)
    {
        $reglement  = crimeTypeReglement::where('id', $crimeTypeReglement)->first();

        $request->validate([
                'reglement' => 'required',
                'suite' => 'nullable',
                'auteur' => 'required',
                'amende' => ['nullable', 'numeric', 'min:100', 'max:500000000'],
        ]);

        $reglement->update([
            'mode_id' => $request->reglement,
            'suite_id' => $request->suite,
            'auteur_id' => $request->auteur,
            'amende' => $request->amende,
        ]);
        session()->flash('reglement', 'Règlement ajouté avec succès');
        session()->flash('section', 'reglement');
        return redirect()->route('crimes.show', $reglement->crime->uuid);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\crimeTypeReglement  $crimeTypeReglement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)

    {
        $reglement = crimeTypeReglement::findOrFail($id);
        $reglement->delete();
        session()->flash('reglement', 'Règlement supprimé  avec succès');
        session()->flash('section', 'reglement');
        return redirect()->route('crimes.show', $reglement->crime->uuid);


    }
}
