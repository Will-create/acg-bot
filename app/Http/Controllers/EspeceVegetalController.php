<?php

namespace App\Http\Controllers;

use App\Models\EspeceVegetal;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
class EspeceVegetalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especes=EspeceVegetal::orderBy('nom','asc')->get();
     
        return view('pages.backOffice.espece_vegetales.index',compact('especes'));
    }
    

    public function create()
    {
        
        return view('pages.backOffice.espece_vegetales.form');
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
            'nom_scientifique'=> ['required','string','max:255','min:3'],
            'photo'=> ['required','image'],


            
           
          ]);


          $espece= new EspeceVegetal;
       
          if($request->hasFile('photo')){
            
            $file = $request->file('photo');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString()); 
            $name = $timestamp. '-' .$file->getClientOriginalName();
            $photoPath=request('photo')->storeAs('espece_animale_uploads',$name,'public');
            $espece->photo = $photoPath;
         
        }

          $espece->nom=$data['nom'];
         
          $espece->famille=$data['famille'];
          $espece->nom_scientifique=$data['nom_scientifique'];
          
          $espece->uuid=Str::uuid();
          $espece->save();
          $request->session()->flash('status', 'Espèce Animale ajouté avec succès');
          return redirect()->route('espece_vegetales.index');
    }

   
    public function show($uuid)
    {  
        $espece=EspeceVegetal::where('uuid',$uuid)->first();
       
        return view('pages.backOffice.espece_vegetales.show', compact('espece'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EspeceVegetal  $unite
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $espece=EspeceVegetal::where('uuid',$uuid)->first();
       

        return view('pages.backOffice.espece_vegetales.edit',compact('espece'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EspeceVegetal  $unite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        
        $data=request()->validate([
            'nom'=> ['required','string','max:255','min:3'],
            'famille'=> ['required','string','max:255','min:3'],
            'nom_scientifique'=> ['string','max:255','min:3'],
            'photo'=> ['image'],
          ]);


          $espece=EspeceVegetal::where('uuid',$uuid)->first();
       
          if($request->hasFile('photo')){
            
            $file = $request->file('photo');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString()); 
            $name = $timestamp. '-' .$file->getClientOriginalName();
            $photoPath=request('photo')->storeAs('espece_animale_uploads',$name,'public');
            $espece->photo = $photoPath;
         
        }

          $espece->nom=$data['nom'];
         
          $espece->famille=$data['famille'];
          $espece->nom_scientifique=$data['nom_scientifique'];
          
          $espece->uuid=Str::uuid();
          $espece->save();
          $request->session()->flash('status', 'Espèce Animale mise a jours avec succès');
          return redirect()->route('espece_vegetales.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EspeceVegetal  $unite
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request,$uuid)
    {
        $espece=EspeceVegetal::where('uuid',$uuid)->first();
        $espece->delete();
        
        return redirect()->route('espece_vegetales.index')->with('status','EspeceVegetal supprimée avec succès');
    }
}
