<?php

namespace App\Http\Controllers;

use App\Models\CrimeNature;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CrimeNatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $naturesCrimes = CrimeNature::all();
        return view('pages.backOffice.natureCrime.index', compact('naturesCrimes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nature'            => 'required',
            'description'       => 'nullable'
        ]);

        CrimeNature::create([
                'nature'            => $request->nature,
                'description'       => $request->description,
                'uuid'              => Str::uuid(),

        ]);

        $request->session()->flash('status', 'Informations sauvégardées avec succès');
        return redirect()->route('nature_crimes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CrimeNature  $crimeNature
     * @return \Illuminate\Http\Response
     */
    public function show(CrimeNature $crimeNature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CrimeNature  $crimeNature
     * @return \Illuminate\Http\Response
     */
    public function edit(CrimeNature $crimeNature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CrimeNature  $crimeNature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CrimeNature $nature_crime)
    {
        $request->validate([
            'nature'            => 'required',
            'description'       => 'nullable'
        ]);

        $nature_crime->update([
                'nature'            => $request->nature,
                'description'       => $request->description,

        ]);

        $request->session()->flash('status', 'Informations mises à jour avec succès');
        return redirect()->route('nature_crimes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CrimeNature  $crimeNature
     * @return \Illuminate\Http\Response
     */
    public function destroy(CrimeNature $nature_crime, Request $request)
    {
        $nature_crime->delete();
        $request->session()->flash('warning', 'La donnéés a été bien supprimée');
        return redirect()->route('nature_crimes.index');
    }
}
