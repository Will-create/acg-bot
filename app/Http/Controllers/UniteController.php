<?php

namespace App\Http\Controllers;

use App\Models\Unite;
use App\Models\Pay;
use App\Models\Ville;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UniteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unites=Unite::all();
     
        return view('pages.backOffice.unites.index',compact('unites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        $pays=Pay::where('id',2)->orderBy('nom', 'asc')->get();
        $villes=Ville::orderBy('pays_id', 'asc')->get();
        $responsables=User::all();


        return view('pages.backOffice.unites.form',compact('villes','pays', 'responsables'));
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
            'designation'=> ['required','string','max:255','min:3'],
            'type'=> ['required','string','max:255','min:3'],
            'tel'=> ['required','string','max:255','min:3'],
            'adresse'=> ['required','string','max:255','min:3'],
            'responsable_id'=>['required','integer'],
            'lat'=> ['required','string','max:255','min:8'],
            'long'=> ['required','string','max:255','min:8'],
            'logo'=> ['required','image',],
            'photo_couverture'=> ['required','image'], 
            'pays_id'=> ['required','integer'],
            'ville_id'=> ['required','integer'],
           
          ]);

         
          $logoPath=request('logo')->store('uploads','public');
          $photoPath=request('photo_couverture')->store('uploads','public');
  
          $unité=Unite::create([
            'designation' => $data['designation'],
            'type'=> $data['type'],
            'tel'=> $data['tel'],
            'adresse'=> $data['adresse'],
            'responsable_id'=> $data['responsable_id'],
            'lat'=> $data['lat'],
            'long'=> $data['long'],
            'pays_id'=> $data['pays_id'],
            'ville_id'=> $data['ville_id'],
            'logo'=>$logoPath,
            'photo_couverture'=>$photoPath,
            'uuid'=>Str::uuid()
          ]);
        
          return redirect()->route('unites.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unite  $unite
     * @return \Illuminate\Http\Response
     */
    public function show(Unite $unite)
    {
        return view('pages.backOffice.unites.show', compact('unite'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unite  $unite
     * @return \Illuminate\Http\Response
     */
    public function edit(Unite $unite)
    {
        return view('pages.backOffice.unites.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unite  $unite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unite $unite)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unite  $unite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Unite $unite)
    {
        $unite->delete();
        $request->flash('message','Unité supprimée avec succès');
        return redirect()->route('unites.index');
    }
}
