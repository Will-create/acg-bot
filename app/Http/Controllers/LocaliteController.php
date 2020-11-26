<?php

namespace App\Http\Controllers;

use App\Models\Localite;
use App\Models\Unite;
use App\Models\Pay;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class LocaliteController extends Controller
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
        $localites=Localite::orderBy('pays_id','asc')->get();

        return view('pages.backoffice.localites.index',compact('localites'));
    }


    public function create()
    {
        $pays=Pay::orderBy('nom', 'asc')->get();

        return view('pages.backoffice.localites.form',compact('pays'));
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
            'pays_id'=> ['required','integer'],


          ]);


          $localite= new Localite;





          $localite->nom=$data['nom'];

          $localite->pays_id =$data['pays_id'];

          $localite->uuid=Str::uuid();
          $localite->save();
          $request->session()->flash('status', 'localitée ajoutée avec succès');
          return redirect()->route('localites.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\localite  $localite
     * @return \Illuminate\Http\Response
     */
    public function show(Localite $localite)
    {
        return view('pages.backoffice.localites.show', compact('localite'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unite  $unite
     * @return \Illuminate\Http\Response
     */
    public function edit(Localite $localite)
    {
        $pays=Pay::orderBy('nom', 'asc')->get();


        return view('pages.backoffice.localites.edit',compact('localite','pays'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unite  $unite
     * @return \Illuminate\Http\Response
     */
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

         $request->session()->flash('status','localité  modifiée avec succès!');
          return redirect()->route('localites.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unite  $unite
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request, Localite $localite)
    {
        $localite->delete();

        return redirect()->route('localites.index')->with('status','localite supprimée avec succès');
    }

    public function ville_by_country($pay_id) {

        $villes =  Localite::where('pays_id', $pay_id)->get();
         return response()->json($villes);

    }

}
