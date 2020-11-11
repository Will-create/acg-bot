<?php

namespace App\Http\Controllers;

use App\Models\Ville;
use App\Models\Unite;
use App\Models\Pay;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class VilleController extends Controller
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
        $villes=Ville::orderBy('pays_id','asc')->get();

        return view('pages.backOffice.villes.index',compact('villes'));
    }


    public function create()
    {
        $pays=Pay::orderBy('nom', 'asc')->get();

        return view('pages.backOffice.villes.form',compact('pays'));
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


          $ville= new Ville;





          $ville->nom=$data['nom'];

          $ville->pays_id =$data['pays_id'];

          $ville->uuid=Str::uuid();
          $ville->save();
          $request->session()->flash('status', 'Ville ajoutée avec succès');
          return redirect()->route('villes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ville  $ville
     * @return \Illuminate\Http\Response
     */
    public function show(Ville $ville)
    {
        return view('pages.backOffice.villes.show', compact('ville'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unite  $unite
     * @return \Illuminate\Http\Response
     */
    public function edit(Ville $ville)
    {
        $pays=Pay::orderBy('nom', 'asc')->get();


        return view('pages.backOffice.villes.edit',compact('ville','pays'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unite  $unite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ville $ville)
    {

        $data=request()->validate([
            'nom'=> ['required','string','max:255','min:3'],
            'pays_id'=> ['required','integer'],


          ]);
          $ville->nom=$data['nom'];

          $ville->pays_id =$data['pays_id'];

          $ville->uuid=Str::uuid();
          $ville->save();

         $request->session()->flash('status','Ville  modifiée avec succès!');
          return redirect()->route('villes.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unite  $unite
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Request $request, Ville $ville)
    {
        $unite->delete();

        return redirect()->route('villes.index')->with('status','Ville supprimée avec succès');
    }

}
